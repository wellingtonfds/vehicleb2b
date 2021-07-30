<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleType extends Model
{
    use HasFactory;

    const ORIGEN_FIPE = 'fipe';
    const ORIGEN_MANUAL = 'manual';

    protected $fillable = ['label', 'cod_fipe', 'origen'];

    public function brands()
    {
        return $this->hasMany(VehicleBrand::class);
    }
}
