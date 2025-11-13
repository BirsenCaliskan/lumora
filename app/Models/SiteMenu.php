<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SiteMenu extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'site_menus';
    protected $fillable = [
        'status',
        'order',
        'educations_id',
        'name',
        'slug'
    ];

    public function education(){
        return $this->hasOne(Education::class,'id','educations_id');
    }

    public function parent(){
        return $this->hasOne(SiteMenu::class,'id','parent_id');
    }

    public function children(){
        return $this->hasMany(SiteMenu::class,'parent_id','id');
    }

}
