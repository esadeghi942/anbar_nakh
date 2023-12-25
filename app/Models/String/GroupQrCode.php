<?php

namespace App\Models\String;

use App\Models\Seller;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupQrCode extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'string_group_qr_codes';

    public function string_group()
    {
        return $this->belongsTo(StringGroup::class, 'string_group_id');
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class,'seller_id');
    }

    public function string_qr_codes()
    {
        return $this->hasMany(QrCode::class, 'string_group_qr_code_id');
    }

    public function create_qr_codes($index)
    {
        $number=sprintf("%04d",$index);
        $date = jdate()->format('Ymdhis');
        $single_group = $this->string_group;
        $material = $single_group->string_material->en_name;
        $grade = $single_group->string_grade->value;
        $color = $single_group->string_color->en_name;
        $layer = $single_group->string_layer->value;
        $qrcode = '#' . $date . '@' . $number .'@' .$this->id.'#';
        return $qrcode;
    }

}
