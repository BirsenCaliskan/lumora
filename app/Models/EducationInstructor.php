<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EducationInstructor extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'education_instructors';

    protected $fillable = [
        'educations_id',
        'instructors_id'
    ];

    public function instructor(){
        return $this->hasOne(Instructor::class,'id','instructors_id');
    }
    public function education(){
        return $this->hasOne(Education::class,'id','educations_id');
    }

}
