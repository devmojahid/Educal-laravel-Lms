<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizeQuestionOption extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function question()
    {
        return $this->belongsTo(QuizeQuestion::class);
    }

    public function answer()
    {
        return $this->hasOne(QuizeAnswer::class);
    }
}
