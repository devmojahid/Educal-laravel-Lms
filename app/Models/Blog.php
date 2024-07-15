<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'svg',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'status',
        'user_id',
        'category_id',
        'subcategory_id',
        'tag_id',
    ];

    public function category()
    {
        return $this->belongsTo(BlogCategory::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(BlogSubCategory::class);
    }

    public function tag()
    {
        return $this->belongsTo(BlogTag::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->where('parent_id', null);
    }

    public function replies()
    {
        return $this->hasMany(Comment::class)->where('parent_id', '!=', null);
    }
}
