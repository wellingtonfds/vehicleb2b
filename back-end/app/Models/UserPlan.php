<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPlan extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'plan_id', 'validate', 'paid', 'code_payment', 'discount'];

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
