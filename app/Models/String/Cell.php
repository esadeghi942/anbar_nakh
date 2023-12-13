<?php

namespace App\Models\String;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cell extends Model
{
    use HasFactory;

    protected $guarded=['id'];
    protected  $table='string_cells';

    public function string_enters()
    {
        return $this->hasMany(Enter::class,'string_cell_id');
    }

    public function string_exports()
    {
        return $this->hasMany(Export::class,'string_cell_id');
    }

    public function string_anbar()
    {
        return $this->belongsTo(Anbar::class,'string_anbar_id');
    }

    public function string_group()
    {
        return $this->belongsTo(StringGroup::class,'string_group_id');
    }
}
