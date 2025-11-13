<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EducationFiles extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'education_files';
    protected $fillable = [
        'groups_id',
        'name',
        'subject',
        'code',
        'description',
        'file',
        'status'
    ];
    public function groups(){
        return $this->hasOne(Groups::class,'id','groups_id');
    }
}
