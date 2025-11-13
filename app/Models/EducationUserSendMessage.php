<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EducationUserSendMessage extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'education_user_send_messages';
    protected $guarded = [];
}
