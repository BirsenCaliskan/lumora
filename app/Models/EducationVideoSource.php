<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use function Symfony\Component\Translation\t;

class EducationVideoSource extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'education_video_sources';
    protected $fillable = [
        'education_videos_id',
        'title',
        'content',
        'source_content'
    ];

}
