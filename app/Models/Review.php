<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $guarded = [];

    //get user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //get course
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
