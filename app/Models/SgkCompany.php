<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SgkCompany extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'sgk_companies';
    protected $fillable = [
        'companies_id',
        'name',
        'address',
        'phone',
        'logo',
        'sms_company',
        'status'
    ];
}
