<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SiteMagazine extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'site_magazines';
    protected $fillable = [
        'status',
        'order',
        'title',
        'link',
        'image',
    ];
}
