<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationDiscountPercentage extends Model
{
    use HasFactory;

    protected $table = 'education_discount_percentages';
    protected $guarded = [];
}
