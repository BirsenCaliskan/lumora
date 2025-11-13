<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SmsUser extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'sms_users';
    protected $fillable = [
        'sgk_companies_id',
        'username',
        'password',
        'sdate',
        'vperiod',
        'sender'
    ];
}
