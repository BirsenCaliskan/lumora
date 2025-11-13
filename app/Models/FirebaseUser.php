<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FirebaseUser extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'firebase_users';
    protected $fillable = [
        'users_id',
        'token',
        'ip_address',
        'user_agent',
        'version',
        'build'
    ];

    public function user(){
        return $this->hasOne(User::class,'id','users_id');
    }

    public function app_notification(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(AppNotification::class, 'users_id', 'users_id');
    }
}
