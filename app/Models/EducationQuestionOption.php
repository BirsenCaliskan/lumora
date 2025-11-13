<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EducationQuestionOption extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'education_question_answers';

    protected $fillable = [
        'educations_id',
        'education_questions_id',
        'answer',
        'correct'
    ];
}
