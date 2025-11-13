<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LiveSendEducation extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'live_send_educations';
    protected $fillable = [
        'live_educations_id',
        'educations_id'
    ];

    public function live_education(){
        return $this->hasOne(LiveEducation::class,'id','live_educations_id');
    }
    public function education(){
        return $this->hasOne(Education::class,'id','educations_id');
    }
}
