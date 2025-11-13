<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeamGroup extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded;

    public function admin(){
        return $this->hasOne(Admin::class,'id', 'manager_id');
    }
    public function admins(){
        return $this->hasMany(Admin::class,'groups_id', 'id');
    }
}
