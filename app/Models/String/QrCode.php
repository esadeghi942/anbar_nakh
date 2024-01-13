<?php

namespace App\Models\String;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrCode extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'string_qr_codes';

    public function string_group_qr_code()
    {
        return $this->belongsTo(GroupQrCode::class, 'string_group_qr_code_id');
    }

    public function string_cells()
    {
        return $this->belongsToMany(Cell::class, 'string_qr_code_cell', 'string_qr_code_id', 'string_cell_id')->withTimestamps();
    }

    public function getStringCellsCodeAttribute()
    {
        //$cells = explode(',', $this->string_cells);
        $cells=$this->string_cells()->get()->pluck('id')->toArray();
        $cells=array_unique($cells);
        $codes = [];
        foreach ($cells as $cell) {
            $codes[] = Cell::find($cell)->code;
        }
        return implode(',', $codes);
    }

}
