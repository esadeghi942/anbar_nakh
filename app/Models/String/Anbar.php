<?php

namespace App\Models\String;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anbar extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    protected $table='string_anbars';

    public function string_items()
    {
        return $this->hasMany(Item::class);
    }

}
