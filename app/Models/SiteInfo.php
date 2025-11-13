<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SiteInfo extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'site_infos';
    protected $fillable = [
        'title',
        'phone',
        'mobile',
        'email',
        'address',
        'facebook',
        'instagram',
        'linkedin',
        'youtube',
        'x',
        'map',
        'tiktok'
    ];
}
