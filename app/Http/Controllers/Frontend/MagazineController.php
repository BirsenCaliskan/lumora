<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\SiteMagazine;
use Illuminate\Http\Request;

class MagazineController extends Controller
{
    public function index(){
        $data = SiteMagazine::select('title as name','link as url','image')
            ->where('status','1')
            ->paginate(15);

        $data->getCollection()->transform(function ($query){
            $query->picture = strstr($query->image,'/') ? $query->image : 'magazine_images/'.$query->image;
            return $query;
        });

        return $data;
    }
}
