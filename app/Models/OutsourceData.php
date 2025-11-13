<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OutsourceData extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'outsource_datas';
    protected $guarded = [];

    public function education(){
        return $this->hasOne(Education::class,'id','educations_id');
    }
    public function country(){
        return $this->hasOne(Country::class,'id','countries_id');
    }
    public function outsource_data_owner(){
        return $this->hasOne(OutsourceDataOwner::class,'id','outsource_data_owners_id');
    }
    public function outsource_data_reference(){
        return $this->hasOne(OutsourceDataReference::class,'id','outsource_data_references_id');
    }
}
