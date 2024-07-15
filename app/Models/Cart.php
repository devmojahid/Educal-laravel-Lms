<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function item()
    {
        return $this->morphTo();
    }

    public function getCountAttribute()
    {
        return Cart::where('user_id', auth()->user()->id)->count();
    }
}