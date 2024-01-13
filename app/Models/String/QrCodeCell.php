<?php

namespace App\Models\String;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrCodeCell extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'string_qr_code_cell';

    public function string_cell()
    {
        return $this->belongsTo(Cell::class,'string_cell_id');
    }

    public function string_qr_code()
    {
        return $this->belongsTo(QrCode::class,'string_qr_code_id');
    }


}
