<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SiteEducationDescription extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function education(){
        return $this->hasOne(Education::class,'id','educations_id');
    }
}
