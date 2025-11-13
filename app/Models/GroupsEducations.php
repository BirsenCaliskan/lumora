<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GroupsEducations extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'groups_educations';
    protected $fillable = [
        'id',
        'groups_id',
        'educations_id',
        'status'
    ];

    public function groups(){
        return $this->hasOne(Groups::class,'id','groups_id');
    }

    public function education(){
        return $this->hasOne(Education::class,'id','educations_id');
    }
}
