<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SendLiveEducationUser extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'send_live_education_users';

    protected $fillable = [
        'live_educations_id',
        'users_id',
        'sms_status'
    ];
}
