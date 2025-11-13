<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EducationDetailImage extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'education_detail_images';
    protected $fillable = [
        'educations_id',
        'title',
        'status',
        'image',
        'order'
    ];

    public function education(){
        return $this->hasOne(Education::class,'id','educations_id');
    }
}
