<?php

namespace App\Models\String;

use App\Models\Seller;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enter extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'string_enters';

    public function seller()
    {
        return $this->belongsTo(Seller::class, 'seller_id');
    }

    public function string_cell()
    {
        return $this->belongsTo(Cell::class);
    }

    public function string_group()
    {
        return $this->belongsTo(StringGroup::class);
    }

    public function string_anbar()
    {
        return $this->belongsTo(Anbar::class);
    }


    public function getStrTypeAttribute()
    {
        $type = $this->type;
        $res = '';
        switch ($type) {
            case 'pallet':
                $res = 'پالت آک';
                break;
            case 'pocket':
                $res = 'گونی آک';
                break;
            case 'used':
                $res = 'مصرف شده';
                break;
        }
        return $res;
    }

    public static function create_qr_codes($data)
    {
        $date = jdate()->format('Ymdhis');
        $material = Material::find($data['string_material_id'])->en_name;
        $cell = Cell::find($data['string_cell_id'])->code;
        $anbar = Anbar::find($data['string_anbar_id'])->code;
        $grade = Grade::find($data['string_grade_id'])->value;
        $color = Color::find($data['string_color_id'])->en_name;
        $qrcode = '#' . $date . '@' . $anbar . '@' . $cell . '@' . $material . '@' . $color . '@' . $grade . '#';
        return $qrcode;
    }


}
