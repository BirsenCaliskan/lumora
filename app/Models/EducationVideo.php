<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EducationVideo extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'education_videos';
    protected $fillable = [
        'status',
        'order',
        'educations_id',
        'title',
        'video_image',
        'video_small_image',
        'video_time',
        'description',
        'mobil_video_sourcce'
    ];

    public function education(){
        return $this->hasOne(Education::class,'id','educations_id');
    }

    public function video_sources(){
        return $this->hasMany(EducationVideoSource::class,'education_videos_id','id')->orderBy('content','DESC');
    }
    public function orders(){
        return $this->hasMany(EducationVideo::class,'educations_id','educations_id')->orderBy('order');
    }
    public function video_source(){
        return $this->hasOne(EducationVideoSource::class,'education_videos_id','id');
    }

    public function user_video_time(){
        return $this->hasOne(UserVideoTime::class, 'education_videos_id', 'id');
    }
    public function user_video_time2(){
        return $this->hasMany(UserVideoTime::class, 'education_videos_id', 'id');
    }


}
