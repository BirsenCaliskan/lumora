<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EducationQuestion extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'education_questions';
    protected $fillable = [
        'educations_id',
        'status',
        'order',
        'question'
    ];

    public function options(){
        return $this->hasMany(EducationQuestionOption::class,'education_questions_id','id');
    }

    public function education(){
        return $this->hasOne(Education::class,'id','educations_id');
    }

    public function question(){
        return $this->hasOne(EducationQuestion::class,'id','education_questions_id');
    }

}
