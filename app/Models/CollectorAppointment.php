<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CollectorAppointment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'collector_appointments';
    protected $guarded = [];
    protected $dates = ['assignment_date'];
}
