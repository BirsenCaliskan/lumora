<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserVideoTime extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'user_video_times';
    protected $fillable = [
        'users_id',
        'educations_id',
        'education_videos_id',
        'duration',
        'full_duration',
        'seen_percent',
        'is_completed'
    ];
}
