<?php

namespace App\Models\String;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrCode extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'string_qr_codes';

    public function string_group_qr_code()
    {
        return $this->belongsTo(GroupQrCode::class, 'string_group_qr_code_id');
    }

    public function getStrStatusAttribute()
    {
        $status = $this->status;
        $str = '';
        switch ($status) {
            case 1:
                $str = 'ثبت اولیه';
                break;
            case 2:
                $str = 'ثبت وزن';
                break;
            case 3:
                $str = 'ورود به انبار';
                break;
            case 4:
                $str = 'خروج از انبار';
                break;
        }
        return $str;

    }
}
