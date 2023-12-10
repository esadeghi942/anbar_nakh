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
        return $this->belongsTo(Material::class);
    }

    public function string_grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function string_layer()
    {
        return $this->belongsTo(Layer::class);
    }

    public function string_items()
    {
        return $this->hasMany(Item::class);
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


}
