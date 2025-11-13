<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserMessage extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'user_messages';

    protected $fillable = [
        'users_id',
        'answer_users_id',
        'subject',
        'message',
        'answer'
    ];

    public function user(){
        return $this->hasOne(User::class,'id','users_id');
    }

    public function answer_user(){
        return $this->hasOne(Admin::class,'id','answer_users_id');
    }
}
