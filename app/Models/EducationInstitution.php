<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EducationInstitution extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'education_institutions';

    protected $fillable = [
      'name'
    ];
}
