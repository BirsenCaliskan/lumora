<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EducationDetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'education_details';
    protected $fillable = [
        'educations_id',
        'name',
        'icon',
        'status'
    ];

    public function education(){
        return $this->hasOne(Education::class,'id','educations_id');
    }
}
