<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    use HasFactory;

    
    protected $guarded = [];

    protected $table = 'curriculam';

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
