<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;

    protected $fillable = ['label', 'cod_fipe', 'car_brand_id'];

    public function carBrand()
    {
        return $this->belongsTo(CarBrand::class);
    }

    public function carModelVersions()
    {
        return $this->hasMany(CarModelVersion::class);
    }
}
