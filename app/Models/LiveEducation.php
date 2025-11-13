<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LiveEducation extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'live_educations';
    protected $fillable = [
        'title',
        'description',
        'instructor_name',
        'image',
        'link',
        'start_date',
        'start_time',
        'sms_status',
        'status',
        'meet_id',
        'meet_password',
        'video_source'
    ];

    public function live_send_educations(){
        return $this->hasMany(LiveSendEducation::class,'live_educations_id','id');
    }

    public function live_send_user(){
        return $this->hasMany(SendLiveEducationUser::class,'live_educations_id','id');
    }
}
