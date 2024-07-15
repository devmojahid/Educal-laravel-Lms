<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogSubCategory extends Model
{
    use HasFactory;

    protected $table = 'blog_sub_categories';

    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'svg',
        'icon',
        'status',
        'blog_category_id',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    public function blog_category()
    {
        return $this->belongsTo(BlogCategory::class);
    }


}