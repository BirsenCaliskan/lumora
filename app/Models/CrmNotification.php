<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CrmNotification extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'crm_notifications';
    protected $fillable = [
        'companies_id',
        'sgk_companies_id',
        'title',
        'message',
        'image'
    ];

    public function crm_notification_service(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(CrmNotificationService::class, 'crm_notifications_id', 'id');
    }
}
