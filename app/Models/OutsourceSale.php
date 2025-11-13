<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OutsourceSale extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'outsource_sales';
    protected $fillable = [
        'payments_id',
        'outsource_datas_id',
        'educations_id',
        'users_id',
        'salesman_admins_id',
        'sale_date',
        'final_price',
        'is_confirmed',
        'confirmed_date',
        'is_canceled',
        'canceled_date',
        'canceled_description',
        'is_show'
    ];

    public function payment(){
        return $this->hasOne(Payment::class,'id','payments_id');
    }
    public function payments(){
        return $this->hasMany(Payment::class,'id','payments_id');
    }

    public function user(){
        return $this->hasOne(User::class,'id','users_id');
    }

    public function education(){
        return $this->hasOne(Education::class,'id','educations_id');
    }
    public function salesman(){
        return $this->hasOne(Admin::class,'id','salesman_admins_id');
    }

}
