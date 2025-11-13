<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SupervisionParticipationStatus extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'supervision_participation_statuses';
    protected $guarded = [];
}
