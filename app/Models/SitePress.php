<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SitePress extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'site_presses';
    protected $fillable = [
        'status',
        'order',
        'title',
        'slug',
        'description_one',
        'description_two',
        'preview',
        'image',
        'press_image',
    ];
}
