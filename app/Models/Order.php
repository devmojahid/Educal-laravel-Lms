<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    // relationship with user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // relationship with course

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // relationship with order item

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
