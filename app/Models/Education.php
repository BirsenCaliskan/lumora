<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use function Symfony\Component\Translation\t;

class Education extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'educations';

    protected $guarded;

    public function category(){
        return $this->hasOne(EducationCategory::class,'id','education_categories_id');
    }

    public function documents(){
        return $this->hasMany(EducationDocument::class,'educations_id','id')->orderBy('order', 'ASC');
    }

    public function instructors(){
        return $this->hasMany(EducationInstructor::class,'educations_id','id');
    }

    public function instructor(){
        return $this->hasOne(EducationInstructor::class,'educations_id','id');
    }

    public function detail_images(){
        return $this->hasMany(EducationDetailImage::class, 'educations_id', 'id')->orderBy('order', 'ASC');
    }

    public function detail_contents(){
        return $this->hasMany(EducationDetailContent::class,'educations_id','id');
    }

    public function details(){
        return $this->hasMany(EducationDetail::class,'educations_id','id');
    }

    public function videos(){
        return $this->hasMany(EducationVideo::class,'educations_id','id');
    }
    public function contract(){
        return $this->hasOne(UserContract::class,'educations_id','educations_id');
    }
    public function contracts(){
        return $this->hasMany(UserContract::class,'educations_id','id');
    }

    public function payment(){
        return $this->hasMany(Payment::class,'educations_id','id');
    }

    public function discount_percentage(){
        return $this->hasOne(EducationDiscountPercentage::class,'educations_id','id');
    }
    public function exams(){
        return $this->hasMany(EducationQuestion::class,'educations_id','id');
    }

    public function user_exams(){
        return $this->hasMany(UserExam::class,'educations_id','id');
    }
    public function detail_list(){
        return $this->hasMany(EducationDetailList::class,'education_id','id');
    }

    public function sale_first($educations_id,$users_id)
    {
        try {
            return OutsourceSale::where('users_id',$users_id)->where('educations_id', $educations_id)->first();
        }catch (\Exception $exception){
            report($exception);
            return false;
        }
    }

    public function site_menu() : HasOne{
        return $this->hasOne(SiteMenu::class,'educations_id','id');
    }
    public function outsource_sales() : HasMany{
        return $this->hasMany(OutsourceSale::class,'educations_id','id');
    }

}
