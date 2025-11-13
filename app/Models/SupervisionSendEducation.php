<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SupervisionSendEducation extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'supervision_send_educations';
    protected $guarded = [];

    public function education(){
        return $this->hasOne(Education::class,'id','educations_id');
    }
}
