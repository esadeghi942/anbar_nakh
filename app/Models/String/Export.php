<?php

namespace App\Models\String;

use App\Models\Device;
use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Export extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected  $table='string_exports';


    public function device()
    {
        return $this->belongsTo(Device::class);
    }

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    public function string_qr_code()
    {
        return $this->belongsTo(QrCode::class,'string_group_qr_code_id');
    }

    public function string_group()
    {
        return $this->belongsTo(StringGroup::class);
    }
}
