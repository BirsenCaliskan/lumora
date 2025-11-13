<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InstructorResume extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'instructor_resumes';
    protected $fillable = [
        'instructors_id',
        'title',
        'resume'
    ];
}
