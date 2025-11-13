<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserExam extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'user_exams';
    protected $fillable = [
        'users_id',
        'outsource_sales_id',
        'educations_id',
        'is_completed'
    ];

    public function exam_results(){
        return $this->hasOne(UserExamResult::class,'user_exams_id','id');
    }

    public function exam_result_last(){
        return $this->hasOne(UserExamResult::class,'user_exams_id','id')->latestOfMany();
    }
}
