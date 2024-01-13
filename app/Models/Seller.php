<?php

namespace App\Models;

use App\Models\String\GroupQrCode;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    public function string_group_qr_codes()
    {
        return $this->hasMany(GroupQrCode::class,'seller_id');
    }

}
