<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModelVersion extends Model
{
    use HasFactory;

    protected $fillable = ['label', 'car_model_id'];


    public function carModel()
    {
        return $this->belongsTo(CarModel::class);
    }
}
