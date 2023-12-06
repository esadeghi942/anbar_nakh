<?php

namespace App\Models\String;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderPoint extends Model
{
    use HasFactory;

    protected $table='string_order_points';

    protected $guarded=['id'];

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
}
