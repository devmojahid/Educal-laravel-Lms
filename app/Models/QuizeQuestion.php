<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizeQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'options',
        'answer',
        'quiz_id',
    ];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function options()
    {
        return $this->hasMany(QuizeQuestionOption::class);
    }
}
