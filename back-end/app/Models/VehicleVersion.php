<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleVersion extends Model
{
    use HasFactory;
    protected $fillable = ['label', 'vehicle_model_id', 'cod_fipe'];

    public function model()
    {
        $this->belongsTo(VehicleModel::class);
    }
}
