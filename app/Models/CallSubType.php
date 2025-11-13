<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CallSubType extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'call_records';
    protected $guarded = [];

    public function call_type(){
        return $this->hasOne(CallType::class,'id','call_types_id');
    }
    public function call_sub_type(){
        return $this->hasOne(CallSubType::class,'id','call_sub_types_id');
    }
}
