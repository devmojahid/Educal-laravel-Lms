<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'svg',
        'icon',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'status',
        'user_id',
    ];
    public function books()
    {
        // return $this->hasMany(Book::class);

        return $this->belongsToMany(Book::class, 'book_category', 'category_id', 'book_id');
    }
}
