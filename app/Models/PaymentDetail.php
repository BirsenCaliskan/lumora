<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentDetail extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'payment_details';
    protected $guarded = [];

    public function payment(){
        return $this->hasOne(Payment::class,'id','payments_id');
    }
    public function payment_type(){
        return $this->hasOne(PaymentType::class,'id','payment_types_id');
    }
    public function payment_log(){
        return $this->hasOne(PaymentLog::class,'payment_details_id','id');
    }
}
