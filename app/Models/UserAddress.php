<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserAddress extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'user_addresses';
    protected $fillable = [
        'users_id',
        'countries_id',
        'cities_id',
        'districts_id',
        'content'
    ];

    public function country(){
        return $this->hasOne(Country::class,'id', 'countries_id');
    }
    public function city(){
        return $this->hasOne(City::class,'id', 'cities_id');
    }
    public function district(){
        return $this->hasOne(District::class,'id', 'districts_id');
    }

}
