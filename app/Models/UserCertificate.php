<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use function Symfony\Component\Translation\t;

class UserCertificate extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'user_certificates';
    protected $fillable = [
        'users_id',
        'outsource_sales_id',
        'user_exam_results_id',
        'certificate_no',
        'certificate_date',
        'is_printed',
        'is_sended',
        'file',
        'type',
        'is_excel_print'
    ];

    public function outsource_sale(){
        return $this->hasOne(OutsourceSale::class,'id','outsource_sales_id');
    }
}
