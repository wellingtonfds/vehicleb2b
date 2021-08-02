<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleType extends Model
{
    use HasFactory;

    protected $fillable = ['label', 'cod_fipe'];

    public function brands()
    {
        return $this->hasMany(VehicleBrand::class);
    }
}
