<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AppNotification extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'app_notifications';
    protected $fillable = [
        'users_id',
        'image',
        'icon',
        'title',
        'body',
        'data',
        'view'
    ];


    protected $casts = [
        'data' => 'object'
    ];
    public function user(){
        return $this->hasOne(User::class,'id','users_id');
    }

    public function firebase_user(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(FirebaseUser::class, 'users_id', 'users_id');
    }
}
