<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EducationDocument extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'education_documents';

    protected $fillable = [
        'order',
        'status',
        'educations_id',
        'title',
        'file',
        'description'
    ];

    public function education(){
        return $this->hasOne(Education::class,'id','educations_id');
    }
}
