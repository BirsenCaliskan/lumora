<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserContract extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'user_contracts';
    protected $fillable = [
        'users_id',
        'contracts_id',
        'educations_id',
        'outsource_sales_id',
        'certificate_price',
        'file_name',
        'sms_code',
        'is_confirmed'
    ];

    public function education(){
        return $this->hasOne(Education::class,'id','educations_id');
    }

}
