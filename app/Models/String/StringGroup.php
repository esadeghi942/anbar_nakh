<?php

namespace App\Models\String;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StringGroup extends Model
{
    use HasFactory;

    protected $table = 'string_groups';

    protected $guarded = ['id'];

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

    public function string_layer()
    {
        return $this->belongsTo(Layer::class);
    }

    public function string_enters()
    {
        return $this->hasMany(Enter::class);
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
        return $this->hasMany(GroupQrCode::class,'string_group_id');
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


}
