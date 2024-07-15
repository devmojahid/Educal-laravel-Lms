<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;

     protected $table = "blog_categories";

    protected $fillable = [
        "title",
        "slug",
        "description",
        "image",
        "svg",
        "status",
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];
    
}
