<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CrmNotificationService extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'crm_notification_services';
    protected $fillable = [
        'crm_notifications_id',
        'users_id',
        'read',
        'link',
        'code'
    ];

    public function crm_notification(){
        return $this->hasOne(CrmNotification::class,'id','crm_notifications_id');
    }
}
