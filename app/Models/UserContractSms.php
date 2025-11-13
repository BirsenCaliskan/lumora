<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserContractSms extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'user_contract_smses';
    protected $fillable = [
        'users_id',
        'educations_id',
        'outsource_sales_id',
        'phone',
        'sms_code'
    ];
}
