<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SupervisionEducation extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'supervision_educations';
    protected $guarded = [];

    public function supervision_send_educations(){
        return $this->hasMany(SupervisionSendEducation::class,'supervision_educations_id','id');
    }

    public function supervision_send_education(){
        return $this->hasMany(SupervisionSendEducation::class,'supervision_educations_id','id');
    }

    public function participation_status(){
        return $this->hasOne(SupervisionParticipationStatus::class,'supervision_id','id');
    }
}
