<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\ApiController;
use App\Http\Controllers\Frontend\InstructorController;
use App\Http\Controllers\Frontend\EducationController;
use App\Http\Controllers\Frontend\NewsController;
use App\Http\Controllers\Frontend\MagazineController;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/categoryList',[ApiController::class,'categoryList']);
Route::get('/categories',[ApiController::class,'categories']);

Route::get('/searchEducation',[ApiController::class,'searchEducation']);
Route::get('/popularEducations',[ApiController::class,'popularEducations']);
Route::get('/jobEducations',[ApiController::class,'jobEducations']);
Route::get('/newEducations',[ApiController::class,'newEducations']);
Route::get('/getEducations',[ApiController::class,'getEducations']);


Route::post('/addData',[ApiController::class,'newData']);

Route::get('/getComments',[ApiController::class,'getComments']);

Route::get('/instructors',[InstructorController::class,'index']);
Route::get('/instructorDetail',[InstructorController::class,'detail']);

Route::get('/educations',[EducationController::class,'index']);
Route::get('/educationDetail',[EducationController::class,'detail']);

Route::post('/contact',[ApiController::class,'contact']);

Route::get('/newsPress',[NewsController::class,'index']);

Route::get('/magazines',[MagazineController::class,'index']);

Route::get('/page',[ApiController::class,'page']);
Route::get('/pages',[ApiController::class,'pages']);

Route::get('/blogs',[ApiController::class,'blogs']);

Route::get('/seo_link',[ApiController::class,'seo_link']);
