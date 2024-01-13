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
        return $this->belongsTo(Seller::class, 'seller_id');
    }

    public function string_qr_codes()
    {
        return $this->hasMany(QrCode::class, 'string_group_qr_code_id');
    }

    public function getCountWithoutWeightAttribute()
    {
        return $this->string_qr_codes()->where('weight', '=', null)->count();
    }

    public function string_exports()
    {
        return $this->hasMany(Export::class, 'string_group_qr_code_id');
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
            case 'converted':
                $res = 'تبدیل شده';
                break;

            case 'label':
                $res = 'لیبل';
                break;
        }
        return $res;
    }


    public function create_qr_codes($index)
    {
        $number = sprintf("%04d", $index);
        $date = jdate()->format('Ymdhis');
        //$single_group = $this->string_group;
        $qrcode = '#' . $date . '@' . $number . '@' . $this->id . '#';
        return $qrcode;
    }

    public function getStringCellsCodeAttribute()
    {
        //$cells = explode(',', $this->string_cells);
        $cells = [];
        $qr_codes = $this->string_qr_codes()->get();

        foreach ($qr_codes as $qr_code)
            array_push($cells, ...$qr_code->string_cells()->get()->pluck('id')->toArray());
        $cells=array_unique($cells);
        $codes = [];
        foreach ($cells as $cell) {
            $codes[] = Cell::find($cell)->code;
        }
        return implode(',', $codes);
    }

}
