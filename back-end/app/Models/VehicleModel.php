<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleModel extends Model
{
    use HasFactory;

    protected $fillable = ['label', 'vehicle_brand_id'];

    public function versions()
    {
        return $this->hasMany(VehicleVersion::class);
    }

    public function brand()
    {
        $this->belongsTo(VehicleBrand::class);
    }
}
