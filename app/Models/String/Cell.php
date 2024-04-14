<?php

namespace App\Models\String;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cell extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'string_cells';

    public function string_qr_codes()
    {
        return $this->belongsToMany(QrCode::class, 'string_qr_code_cell', 'string_cell_id', 'string_qr_code_id')->withTimestamps();
    }

    public function string_exports()
    {
        return $this->hasMany(Export::class, 'string_cell_id');
    }

    public function string_anbar()
    {
        return $this->belongsTo(Anbar::class, 'string_anbar_id');
    }

    public function string_group()
    {
        return $this->belongsTo(StringGroup::class, 'string_group_id');
    }

    public function getLatAttribute()
    {
        return $this->string_qr_codes()->first()->string_group_qr_code->lat;
    }

}
