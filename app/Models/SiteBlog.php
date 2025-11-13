<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class SiteBlog extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    protected $appends = [
      'seo_title',
      'seo_description',
    ];
    public function getSeoTitleAttribute(){
        return $this->seo ? $this->seo->title : '';
    }
    public function getSeoDescriptionAttribute(){
        return $this->seo ? $this->seo->description : '';
    }

    public function seo() : HasOne {
        return $this->hasOne(SiteBlogDescription::class,'id','blogs_id')->where('status','1');
    }
}
