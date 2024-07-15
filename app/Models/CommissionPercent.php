<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommissionPercent extends Model
{
    use HasFactory;

    protected $fillable = [
        'percent',
    ];
}
