<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Instructor extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'instructors';
    protected $fillable = [
        'name',
        'title',
        'image',
        'status'
    ];

    public function resume(){
        return $this->hasOne(InstructorResume::class,'instructors_id', 'id');
    }
}
