<?php

namespace App\Models\Roll;

use App\Models\Company;
use App\Models\String\Device;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factor extends Model
{
    use HasFactory;

    protected $table='roll_factors';

    protected $guarded=['id'];

    public function orders()
    {
        return $this->hasMany(Order::class,'roll_factor_id');
    }

    public function device()
    {
        return $this->belongsTo(Device::class,'carpet_device_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class,'company_id');
    }
}
