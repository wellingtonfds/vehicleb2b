<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleBrand extends Model
{
    use HasFactory;

    protected $fillable = ['label', 'cod_fipe', 'vehicle_type_id'];

    public function models()
    {
        return $this->hasMany(VehicleModel::class);
    }

    public function type()
    {
        $this->belongsTo(VehicleType::class);
    }
}
