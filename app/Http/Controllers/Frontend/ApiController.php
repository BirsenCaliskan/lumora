<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\ContactForm;
use App\Models\Education;
use App\Models\OutsourceData;
use App\Models\OutsourceDataOwner;
use App\Models\OutsourceDataReference;
use App\Models\OutsourceSale;
use App\Models\Page;
use App\Models\SgkCompany;
use App\Models\SiteBlog;
use App\Models\SiteMagazine;
use App\Models\SiteMenu;
use App\Models\SitePress;
use App\Models\UserComment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function categoryList(){
         $categories = SiteMenu::select('id','name','slug','parent_id')
             ->where('parent_id','')
             ->orWhere('parent_id',null)
            ->orderBy('order','ASC')
            ->get();
         if(!$categories->isEmpty())$categories = self::buildTree($categories);
         return $categories;
    }
    public function categories(Request $request){
        return SiteMenu::select('id', 'name', 'slug', 'parent_id')
            ->where('parent_id', '')
            ->orWhere('parent_id', null)
            ->orderBy('order', 'ASC')
            ->get()
            ->map(function ($query) {
                $query->url = $query->slug;
                unset($query->slug);
                return $query;
            });
    }
    public function searchEducation(Request $request){
        $name = $request->name;
        $educations = [];
        if($name){
            $educations = Education::select('id','name','slug','top_list_image','list_price','discounted_price')
                ->where('name','like','%'.$name.'%')
                ->where('status','1')
                ->get()->map(function ($query){
                    $query->url = $query->slug;
                    $query->rate = $query->discounted_price ? ($query->discounted_price / $query->list_price) * 100 : 0;
                    $query->picture = strstr($query->top_list_image, '/') ? $query->top_list_image : 'top_list_images/'.$query->top_list_image;
                    unset($query->top_list_image,$query->slug);
                    return $query;
                });
        }
        return $educations;
    }
    public function buildTree($items, $parentId = null){
        return $items->filter(function ($item) use ($parentId){
            return $item->parent_id == $parentId;
        })->map(function ($item) use ($items){
            $item->children = $this->buildTree($items,$item->id);
            return $item;
        });
    }

    public function popularEducations(Request $request){
        $limit = $request->limit ?? 10;
        $sort_order = 1;
        return OutsourceData::select('educations_id',DB::raw('count(id) as total'))
            ->with(['education:id,name,slug,top_list_image,list_price,discounted_price'])
            ->whereHas('education',function ($query){
                $query->where('status','1');
            })
            ->groupBy('educations_id')
            ->orderBy('total','DESC')
            ->limit($limit)
            ->get()->map(function ($query) use (&$sort_order){
                $query->sort_order = $sort_order++;
                $query->name = $query->education->name;
                $query->list_price = $query->education->list_price;
                $query->discounted_price = $query->education->discounted_price;
                $query->rate = $query->discounted_price ? ($query->discounted_price / $query->list_price) * 100 : 0;
                $query->education_name = $query->education->name;
                $query->url = $query->education->slug;
                $query->id = $query->education->id;
                $query->picture = strstr($query->education->top_list_image, '/') ? $query->education->top_list_image : 'top_list_images/'.$query->education->top_list_image;
                unset($query->education,$query->total);
                return $query;
            });
    }
    public function jobEducations(Request $request){
        $limit = $request->limit ?? 10;
        $sort_order = 1;
        return Education::select('id','name','slug','top_list_image','list_price','discounted_price')
            ->with('site_menu')
            ->whereHas('site_menu',function ($query){
                $query->where('parent_id',113);
            })
            ->where('status','1')
            ->inRandomOrder()
            ->limit($limit)
            ->get()->map(function ($query) use (&$sort_order){
                $query->rate = $query->discounted_price ? ($query->discounted_price / $query->list_price) * 100 : 0;
                $query->sort_order = $sort_order++;
                $query->url = $query->slug;
                $query->picture = strstr($query->top_list_image, '/') ? $query->top_list_image : 'top_list_images/'.$query->top_list_image;
                unset($query->site_menu,$query->top_list_image);
                return $query;
            });
    }
    public function newEducations(Request $request){
        $limit = $request->limit ?? 10;
        return Education::select('id','name','slug','top_list_image','list_price','discounted_price')
            ->where('status','1')
            ->limit($limit)
            ->inRandomOrder()
            ->get()->map(function ($query){
                $query->rate = $query->discounted_price ? ($query->discounted_price / $query->list_price) * 100 : 0;
                $query->url = $query->slug;
                $query->picture = strstr($query->top_list_image, '/') ? $query->top_list_image : 'top_list_images/'.$query->top_list_image;
                unset($query->site_menu,$query->top_list_image);
                return $query;
            });
    }
    public function getEducations(){
        return Education::select('id','name')->where('status','1')->orderBy('name','ASC')->get();
    }

    public function newData(Request $request){
        $json = [
            'icon' => 'error',
            'title' => 'Opps!',
            'message' => 'Bağlantı hatası oluştu. Ekibimiz en kısa sürede çözecektir.',
        ];
        try {
            session(['email' => '']);
            DB::beginTransaction();
            if ($request->filled('campaing_code') and mb_strtoupper($request->get('campaing_code')) == 'KEN0624'){
                $outsource_data_owner = OutsourceDataOwner::where('name','Ken Academy MP')->where('status','1')->first();
                if (!$outsource_data_owner){
                    $outsource_data_owner = OutsourceDataOwner::create([
                        'name' => 'Ken Academy MP',
                        'status' => '1'
                    ]);
                }
                $outsource_data_ref = OutsourceDataReference::where('name','MP Web Site')->where('status','1')->first();
                if (!$outsource_data_ref){
                    $outsource_data_ref = OutsourceDataReference::create([
                        'name' => 'MP Web Site',
                        'status' => '1'
                    ]);
                }
            }else{
                $outsource_data_owner = OutsourceDataOwner::where('name','Ken Academy Web Site (Sıcak)')->where('status','1')->first();
                if (!$outsource_data_owner){
                    $outsource_data_owner = OutsourceDataOwner::create([
                        'name' => 'Ken Academy Web Site (Sıcak)',
                        'status' => '1'
                    ]);
                }
                $outsource_data_ref = OutsourceDataReference::where('name','Web Site')->where('status','1')->first();
                if (!$outsource_data_ref){
                    $outsource_data_ref = OutsourceDataReference::create([
                        'name' => 'Web Site',
                        'status' => '1'
                    ]);
                }
            }

            $phone = str_replace(' ', '', $request->phone);
            $phone = str_replace('-', '', $phone);
            $phone = str_replace('+', '', $phone);
            $phone = str_replace(':', '', $phone);
            $phone = str_replace('(', '', $phone);
            $phone = str_replace(')', '', $phone);
            $phone = str_replace('p', '', $phone);

            if ($phone[0] === "9" && $phone[1] === "0") {
                $phone = substr($phone, 2);
            }
            if ($phone[0] === "0") {
                $phone = substr($phone, 1);
            }

            if(strlen($phone) < 10)
            {
                $json['message'] = 'Telefon Numaranız En Az 10 Karakter Olmalıdır ve Başında 0 Olmamalıdır.';
                return $json;

            }
            $lastRecord = OutsourceData::where('phone', $phone)
                ->orderBy('created_at', 'desc')
                ->first();
            if ($lastRecord && $lastRecord->created_at > Carbon::now()->subHour()) {
                $json['icon'] = 'success';
                $json['title'] = 'Kaydınız Alınmıştır!';
                $json['message'] = '1 Saat içinde hali hazırda bir başvurunuz bulunmaktadır .Eğitim Danışmanlarımız Sizler ile iletişime geçecektir.';
                return $json;
            }
            $company = Company::first();
            $sgk_company = SgkCompany::first();
            // foreach ($request->educations as $education){
            $outsource_datas = OutsourceData::where('educations_id', $request->educations_id)->where('phone', $phone)->first();
            if (!$outsource_datas){
                $new_hot_data = OutsourceData::create([
                    'companies_id' => $company->id,
                    'sgk_companies_id' => $sgk_company->id,
                    'outsource_data_owners_id' => $outsource_data_owner->id,
                    'educations_id' => $request->educations_id,
                    'user_jobs_id' => 1,
                    'countries_id' => 3,
                    'cities_id' => 83,
                    'districts_id' => 2,
                    'outsource_data_references_id' => $outsource_data_ref->id,
                    'ip_address' => null,
                    'distributed_date' => null,
                    'gender' => array_flip(config('variables.gender'))['BİLİNMİYOR'],
                    'name' => $request->name,
                    'phone' => $phone,
                    'email' => $request->email ?? null,
                    'tc' => null,
                    'address' => null,
                    'description' => null,
                    'sale_type' => '0',
                    'is_processed' => '0',
                    'processed_date' => null,
                    'sale_date' => null,
                    'back_count' => 0,
                    'is_hot_data'=>'1'
                ]);
                outsource_today_data_group();
            }
            else{
                $outsource_datas->outsource_data_owners_id = 6;
                $outsource_datas->is_hot_data = '1';
                $outsource_datas->is_transfer = '0';
                $outsource_datas->sale_type = '0';
                $outsource_datas->is_processed = '0';
                $outsource_datas->processed_date = null;
                $outsource_datas->name = $outsource_datas->name. ' (Sıcak Tekrar Başvuru)';
                $outsource_datas->updated_at = Carbon::now();
                $outsource_datas->save();
            }
            DB::commit();
            session(['email' => $request->email]);
            $json['icon'] = 'success';
            $json['title'] = 'Kaydınız Alınmıştır!';
            $json['message'] = 'Başvurunuz alınmıştır. En kısa sürede tarafınıza dönüş yapılacaktır.';
            return $json;
        }catch (\Exception $ex){
            report($ex);
            DB::rollBack();
            $json['message'] = 'Bağlantı hatası oluştu. Ekibimiz en kısa sürede çözecektir.'.$ex->getMessage();
            return $json;
        }
    }

    public function getComments(Request $request){
        $limit = $request->limit ?? 10;
        return UserComment::select('id','users_id','comment')
            ->with(['user:id,name,avatar'])
            ->whereHas('user')
            ->where('status','1')
            ->limit($limit)
            ->inRandomOrder()
            ->get()->map(function ($query){
                $query->name = $query->user->name;
                $query->picture = $query->user->avatar ? 'user_avatar_images/'.$query->user->avatar : 'avatar/avatar.png';
                unset($query->user);
                return $query;
            });
    }
    public function contact(Request  $request){
        $form = $request->form;
        $json = [
            'icon' => 'error',
            'title' => 'Opps!',
            'message' => 'Mesajınız gönderilemedi. Tekrar deneyiniz.'
        ];
        try {
            if (strlen($form['phone']) < 10) {
                $json['message'] = 'Telefon Numaranız En Az 10 Karakter Olmalıdır ve Başında 0 Olmamalıdır.';
                return $json;
            }
            $lastSession = session('lastContact');
            if($lastSession){
                $minute = ceil(Carbon::parse(Carbon::now())->diffInMinutes($lastSession));
                if($minute > 0){
                    $json['message'] = 'Yeniden mesaj atabilmeniz için '. $minute .' dakika geçmesi gerekmektedir';
                    return $json;
                }
            }

            session()->put('lastContact',Carbon::now()->addMinutes(5));
            $contact = new ContactForm();
            $contact->name = $form['name'];
            $contact->email = $form['email'];
            $contact->phone = $form['phone'];
            $contact->subject = $form['subject'];
            $contact->message = $form['message'];
            $contact->status = 0;
            $contact->save();

            $json = [
                'icon' => 'success',
                'title' => 'Başarılı!',
                'message' => 'Mesajınız bize ulaştı. En kısa zamanda sizlere dönüş sağlayacağız.'
            ];
            return $json;
        }catch (\Exception $ex){
            report($ex);
            DB::rollBack();
            $json['message'] = 'Bağlantı hatası oluştu. Ekibimiz en kısa sürede çözecektir.'.$ex->getMessage();
            return $json;
        }
    }
    public function page(Request $request){
        $url = $request->link;
        $data = Page::select('name','detail')->where('url',$url)
            ->where('status',1)
            ->first();
        if($data) $data->picture = strstr($data->image, '/') ? $data->image : 'blog_images/' . $data->image;

        if(!$data) {
            $data = SiteBlog::select('title as name','description as detail','image')->where('slug', $url)
                ->first();
            if($data && $data->image) {
                $data->picture = strstr($data->image, '/') ? $data->image : 'blog_images/' . $data->image;
            }
        }
        if(!$data) {
            $data = SitePress::select('id', 'title as name', 'preview', 'slug', 'image',DB::raw("CONCAT(description_one,' ',description_two) as detail"))
                ->where('status', '1')
                ->where('slug', $url)
                ->first();
            if($data && $data->image) {
                $data->picture = strstr($data->image, '/') ? $data->image : 'press_images/' . $data->image;
            }
        }

        return $data;
    }
    public function pages(Request $request){
        $yer = $request->yer;
        $select = $yer == 0 ? ['id','name', 'url'] : ['id','name', 'url','detail'];
        $data = Page::select($select)->where('yer', $yer)
            ->where('status', 1);

        $pages = $request->page ? $data->paginate(15) : $data->get();
        return $pages;
    }
    public function blogs(Request $request){
        $data = SiteBlog::select('title as name','image','slug as url')
            ->paginate(15);

        $data->getCollection()->transform(function ($query){
           $query->picture = strstr($query->image,'/') ? $query->image : 'blog_images/'.$query->image;
           return $query;
        });
        return $data;
    }
    public function seo_link(Request $request)
    {
        $url = $request->get('link');
        $component = 'error-component';

        $data = self::page($request);
        if($data){
           $component = 'page-component';
        }else{
            $data = Education::where('slug',$url)->first();
            if ($data){
                $component = 'product-component';
            }else{
                $data = SiteMenu::where('slug', $url)->first();
                if ($data){
                    $component = 'category-component';
                }
            }
        }

        return $component;

    }
}
