<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsructorApply extends Model
{
    use HasFactory;

    protected $fillable = [
        'button_text',
        'bg_image',
    ];
}