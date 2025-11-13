<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserDocument extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'user_documents';
    protected $fillable = [
        'users_id',
        'type',
        'file',
        'status',
        'description',
        'protest'
    ];

    public function user(){
        return $this->hasOne(User::class,'id','users_id');
    }

}
