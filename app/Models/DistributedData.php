<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DistributedData extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'distributed_datas';
    protected $guarded = [];


    public function outsource_data(){
        return $this->hasOne(OutsourceData::class,'id','outsource_datas_id');
    }
    public function salesman(){
        return $this->hasOne(Admin::class,'id','admins_id');
    }
    public function call_records(){
        return $this->hasMany(CallRecord::class,'distributed_datas_id','id');
    }
}
