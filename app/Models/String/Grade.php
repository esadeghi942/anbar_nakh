<?php

namespace App\Models\String;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = ['value'];

    protected  $table='string_grades';

    public function string_groups()
    {
        return $this->hasMany(StringGroup::class,'string_grade_id');
    }

}
