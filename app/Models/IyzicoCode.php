<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IyzicoCode extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'iyzico_codes';
    protected $guarded = [];

    public function payment_detail(){
        return $this->hasOne(PaymentDetail::class,'id','payment_details_id');
    }
    public function payment_log(){
        return $this->hasOne(PaymentLog::class,'id','payment_logs_id');
    }
}
