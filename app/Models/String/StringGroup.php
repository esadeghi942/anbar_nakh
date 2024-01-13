<?php

namespace App\Models\String;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StringGroup extends Model
{
    use HasFactory;

    protected $table = 'string_groups';

    protected $guarded = ['id'];

    public static function find_or_create($color, $material, $grade, $layer)
    {
        $string_group = StringGroup::where('string_color_id', $color)->where('string_material_id', $material)->where('string_grade_id', $grade)->where('string_layer_id', $layer)->first();
        if (!$string_group) {
            $data1 = [
                'string_color_id' => $color,
                'string_material_id' => $material,
                'string_grade_id' => $grade,
                'string_layer_id' => $layer,
                'order_pointer' => 0
            ];
            $string_group = StringGroup::create($data1);
        }
        return $string_group;
    }

    public function string_color()
    {
        return $this->belongsTo(Color::class);
    }

    public function string_material()
    {
        return $this->belongsTo(Material::class, 'string_material_id');
    }

    public function string_grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function group_qr_codes()
    {
        return $this->hasMany(GroupQrCode::class);
    }

    public function string_layer()
    {
        return $this->belongsTo(Layer::class);
    }


    public function string_exports()
    {
        return $this->hasMany(Export::class);
    }

    public function string_cells()
    {
        return $this->hasMany(Cell::class, 'string_group_id');
    }

    public function string_group_qr_codes()
    {
        return $this->hasMany(GroupQrCode::class, 'string_group_id');
    }

    public function getStrTypeAttribute()
    {
        $type = $this->active;
        $res = '';
        switch ($type) {
            case 1:
                $res = 'فعال';
                break;
            case 2:
                $res = 'راکد';
                break;
        }
        return $res;
    }

    public function getTitleAttribute()
    {
        $elem = $this;
        return $elem->string_color->name . ' نمره ' . $elem->string_grade->value . ' ' . $elem->string_material->name . ' ' . $elem->string_layer->value . ' لا';
    }

    public function getTotalWeightAttribute()
    {
        $group_qr_codes = $this->group_qr_codes()->get();
        $total = 0;
        foreach ($group_qr_codes as $group_qr_code) {
            $total += $group_qr_code->string_qr_codes()->sum('weight');
        }
        return $total;
    }

    public function getStringCellsCodeAttribute()
    {
        $cells = $this->string_cells()->get();
        $codes = [];
        foreach ($cells as $cell)
            $codes[] = $cell->code;

        return implode(',', $codes);
    }


}
