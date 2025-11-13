<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\SitePress;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request){
        $news = SitePress::select('id', 'title as name', 'preview', 'slug', 'press_image')
            ->where('status', '1')
            ->paginate(15);

        $news->getCollection()->transform(function ($query) {
            $query->picture = strstr($query->press_image, '/')
                ? $query->press_image
                : 'press_images/' . $query->press_image;
            $query->url = $query->slug;
            unset($query->slug, $query->press_image);
            return $query;
        });

        return $news;
    }
}
