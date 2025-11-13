<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'payments';
    protected $fillable = [
        'users_id',
        'educations_id',
        'price',
        'discounted_price',
        'certificate_price',
        'exam_price',
        'sale_price',
        'status',
        'payment_types_id',
        'discount_percentage'
    ];

    public function education(){
        return $this->hasOne(Education::class,'id','educations_id');
    }

    public function user(){
        return $this->hasOne(User::class,'id','users_id');
    }
    public function payment_details(){
        return $this->hasMany(PaymentDetail::class,'payments_id','id');
    }

    public function outsource_sale(){
        return $this->hasOne(OutsourceSale::class,'payments_id','id');
    }


}
