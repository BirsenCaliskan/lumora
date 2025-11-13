<?php

use App\Models\SiteInfo;
use App\Models\SiteHomeDescription;
use Illuminate\Support\Facades\Route;

Route::get('/{any?}', function () {
    $settings = SiteInfo::first();
    $seo = SiteHomeDescription::first();

    return view('front', [
        'settings' => $settings,
        'seo_title' => $seo->title,
        'seo_description' => $seo->description,
    ]);
})->where('any', '.*')->name('more.home');
