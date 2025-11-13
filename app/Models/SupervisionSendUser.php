<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SupervisionSendUser extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'supervision_send_users';
    protected $guarded = [];
}
