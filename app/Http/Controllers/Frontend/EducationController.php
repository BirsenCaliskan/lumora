<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\SiteMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EducationController extends Controller
{
    public function index(Request $request)
    {
        $category_url = $request->category_url;
        $search = $request->search;
        $price = $request->price;
        $minPrice = $price['min'] ?? null;
        $maxPrice = $price['max'] ?? null;
        $priceFilter = !is_null($minPrice) || !is_null($maxPrice);

        if($priceFilter){
            $minPrice = $minPrice ?? 0;
            $maxPrice = $maxPrice ?? 999999999;
        }
        $isAllEducation = ($category_url === 'tum-egitimler');

        $menuId = 0;
        if ($category_url && !$isAllEducation) {
            $menuItem = SiteMenu::where('slug', $category_url)->first(['id', 'parent_id']);
            if ($menuItem) {
                $menuId = $menuItem->id;
            }
        }

        $menus = SiteMenu::select('id', 'name','slug as url')->withCount(['children as total' => function ($query) {
            $query->where('status', '1')
                ->whereHas('education', function ($q) {
                    $q->where('status', '1');
                });
        }])->where(function ($q) {
            $q->where('parent_id', 0)
                ->orWhereNull('parent_id');
        })->where('status', '1')
            ->orderBy('name', 'ASC')
            ->get();

        $totalSum = $menus->sum('total');
        $menus->prepend([
            'id' => 0,
            'name' => 'Tüm Eğitimler',
            'total' => $totalSum,
            'url' => 'tum-egitimler',
        ]);

        $educations = Education::select('id', 'name', 'slug', 'top_list_image', 'list_price', 'discounted_price')
            ->with([
                'site_menu' => function ($q) {
                    $q->select('id', 'name', 'parent_id')
                        ->where('status', '1');
                },
                'instructors.instructor' => function ($q) {
                    $q->select('id', 'name')
                        ->where('status', '1');
                },
            ])
            ->withCount(['outsource_sales as sales_count'])
            ->when(!empty($search), function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->when($priceFilter,function ($query) use ($minPrice,$maxPrice){
                $query->where(function ($q) use ($minPrice, $maxPrice) {
                    $q->where('discounted_price', '>', 0)
                        ->whereBetween('discounted_price', [$minPrice, $maxPrice]);
                })->orWhere(function ($q) use ($minPrice, $maxPrice) {
                    $q->where(function ($subQ) {
                        $subQ->whereNull('discounted_price')->orWhere('discounted_price', 0);
                    })->whereBetween('list_price', [$minPrice, $maxPrice]);
                });
            })
            ->when(!$isAllEducation && empty($search) && $menuId, function ($query) use ($menuId) {
                $query->whereHas('site_menu', function ($q) use ($menuId) {
                    $q->where('id', $menuId)
                        ->orWhere('parent_id', $menuId);
                });
            })->whereHas('site_menu', function ($q) {
                $q->where('status', '1');
            })
            ->orderByDesc('sales_count')
            ->where('status', '1')
            ->paginate(15);

        $educations->getCollection()->transform(function ($education) {
            $education->rate = $education->discounted_price ? ($education->list_price / $education->discounted_price) * 100 : 0;
            if ($education->instructors && $education->instructors->count()) {
                $education->instructor_names = $education->instructors->map(function ($instructorRelation) {
                    return optional($instructorRelation->instructor)->name;
                })->filter()->values();
            }
            $education->picture = strstr($education->top_list_image, '/')
                ? $education->top_list_image
                : 'top_list_images/' . $education->top_list_image;

            $education->url = $education->slug;
            unset($education->instructor, $education->top_list_image, $education->slug);
            return $education;
        });

        return ['menus' => $menus, 'educations' => $educations];
    }

    public function detail(Request $request)
    {
        $url = $request->url;
        if ($url == 'santiye-sefligi-egitimi') {
            $url = 'insaat-ve-santiye-yoneticiliği-egitimi';
        }
        $education = Education::select('id', 'name', 'slug', 'slider_image', 'teaser', 'description', 'short_description', 'seo_title', 'seo_description')
            ->with([
                'instructors.instructor' => function ($q) {
                    $q->select('id', 'name', 'image')
                        ->where('status', '1');
                },
                'instructors.instructor.resume' => function ($q) {
                    $q->select('instructors_id', 'resume');
                },
                'details' => function ($q) {
                    $q->select('educations_id', 'name', 'icon')
                        ->where('status', '1');
                },
                'detail_contents' => function ($q) {
                    $q->select('educations_id', 'content')
                        ->where('status', '1');
                },
                'detail_list' => function ($q) {
                    $q->select('education_id', 'id', 'name', 'detail');
                }
            ])
            ->where('slug', $url)
            ->where('status', '1')
            ->first();
        $education->picture = strstr($education->slider_image, '/') ? $education->slider_image : 'slider_images/' . $education->slider_image;

        if ($education->instructors && $education->instructors->count()) {
            $education->instructor_names = $education->instructors->map(function ($instructorRelation) {
                return optional($instructorRelation->instructor)->name;
            })->filter()->values();
            $education->instructors = $education->instructors->map(function ($instructorRelation) {
                $instructor = $instructorRelation->instructor;

                return [
                    'name' => optional($instructor)->name,
                    'picture' => $instructor
                        ? (strstr($instructor->image, '/')
                            ? $instructor->image
                            : 'instructor_images/' . $instructor->image)
                        : null,
                    'resume' => optional($instructor->resume)->resume ?? '',
                ];
            })->filter()->values();
        }
        $education->setRelation('instructors', $education->instructors);
        //unset($education->instructors);
        return response()->json($education->toArray());
    }
}
