<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'companies_id',
        'sgk_companies_id',
        'type',
        'name',
        'identity_number',
        'email',
        'password',
        'phone',
        'avatar',
        'gender',
        'birthday',
        'title',
        'education_status',
        'user_jobs_id',
        'email_verification_code',
        'is_salesman',
        'status',
        'dogrucv_user_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function user_job(){
        return $this->hasOne(UserJob::class,'id','user_jobs_id');
    }

    public function address(){
        return $this->hasOne(UserAddress::class,'users_id','id');
    }

    public function crmNotificationCount(){
        $notification_services = CrmNotificationService::with(['crm_notification'])
            ->where('users_id', $this->id)
            ->where('read', '0')
            ->get()->count();
        return $notification_services;
    }

    public function crmNotification(){
        $notification_services = CrmNotificationService::with(['crm_notification'])
            ->where('users_id', $this->id)
            ->where('read', '0')
            ->limit(5)
            ->orderBy('created_at','DESC')
            ->get()->map(function ($q){
                return [
                    'id' => $q->id,
                    'title' => $q->crm_notification->title ?? '',
                    'message' =>$q->crm_notification->message ?? '',
                    'link' => $q->link,
                    'date' => Carbon::parse($q->crm_notification->created_at)->format('d.m.Y H:i')
                ];
            });
        return $notification_services;
    }

    public function isBordro()
    {
        $outsource_sale = OutsourceSale::where('educations_id',21)
            ->where('users_id',$this->id)
            ->where('is_canceled','0')
            ->where('is_lawyer','0')->first();
        $luca_user = LucaUser::where('users_id',$this->id)
            ->where('status',1)
            ->first();
        if ($outsource_sale and $luca_user)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function isMuhasebe()
    {
        $outsource_sale = OutsourceSale::where('educations_id',72)
            ->where('users_id',$this->id)
            ->where('is_canceled','0')
            ->where('is_lawyer','0')->first();
        $luca_user = LucaUser::where('users_id',$this->id)
            ->where('status',1)
            ->first();
        if ($outsource_sale and $luca_user)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function isEtkiliCvEducation()
    {

        $outsource_sale = OutsourceSale::where('educations_id',11)
            ->where('users_id',$this->id)
            ->where('is_canceled','0')
            ->where('is_lawyer','0')->first();
        $luca_user = LucaUser::where('users_id',$this->id)
            ->where('status',1)
            ->first();
        if ($outsource_sale and $luca_user)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function isMemorandum()
    {
        $memorandum = GroupsEducations::all()->pluck('educations_id')->toArray();
        $outsource_sale = OutsourceSale::whereIn('educations_id',$memorandum)
            ->where('users_id',$this->id)
            ->where('is_canceled','0')
            ->where('is_lawyer','0')->first();
        if ($outsource_sale)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function isIkmetrik()
    {
        $outsource_sale = IkmetrikDemo::where('users_id',$this->id)->where('status','1')->where('finish_date', '>=', Carbon::today()->format('Y-m-d'))->first();
        if ($outsource_sale)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function isArgeEducation()
    {
        $outsource_sale = OutsourceSale::whereIn('educations_id',[28,30,33,34,25])
            ->where('users_id',$this->id)
            ->where('is_canceled','0')
            ->where('is_lawyer','0')->first();

        if ($outsource_sale)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function payrollUyeNo()
    {
        $payroll = LucaUser::where('users_id',$this->id)->where('status',1)->first();
        if ($payroll)

        {
            return $payroll->uye_no;
        }
        else{
            return 0;
        }
    }


}
