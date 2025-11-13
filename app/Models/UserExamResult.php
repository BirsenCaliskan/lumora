<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserExamResult extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'user_exam_results';
    protected $fillable = [
        'user_exams_id',
        'start_datetime',
        'finish_datetime',
        'exam_answers',
        'status',
        'exam_score'
    ];
}
