<?php

namespace App\Models\Carpet;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factor extends Model
{
    use HasFactory;

    protected $table='carpet_factors';

    protected $guarded=['id'];

    public function orders()
    {
        return $this->hasMany(Order::class,'carpet_factor_id');
    }

    public function device()
    {
        return $this->belongsTo(Device::class,'carpet_device_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class,'carpet_company_id');
    }
}
