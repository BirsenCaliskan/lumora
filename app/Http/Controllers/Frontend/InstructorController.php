<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Instructor;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    public function index(Request $request){
        $instructors = Instructor::select('name','title','image','url')
            ->where('status','1')
            ->orderBy('name','ASC')
            ->paginate(15);
        $instructors->getCollection()->transform(function ($instructor) {

            $instructor->picture = strstr($instructor->image, '/')
                ? $instructor->image
                : 'instructor_images/' . $instructor->image;

            unset($instructor->image);
            return $instructor;
        });
        return $instructors;
    }
    public function detail(Request $request){
        $url = $request->link;
        $instructor = Instructor::select('id','name','title','image','seo_title','seo_description')
            ->with('resume:instructors_id,title,resume')
            ->where('url',$url)
            ->first();
        $instructor->picture = strstr($instructor->image, '/')
            ? $instructor->image
            : 'instructor_images/' . $instructor->image;
        return $instructor;
    }
}
