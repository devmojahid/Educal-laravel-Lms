<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory, SoftDeletes;

    protected $bookPlaceholdersPath = '/uploads/cms/book/book-placeholder.png';

    protected $fillable = [
        'title',
        'slug',
        'description',
        'short_description',
        'image',
        'book_file',
        'price',
        'discount_price',
        'stock',
        'sold',
        'book_pages',
        'status',
        'product_type',
        'specifications',
        'language',
        'edition',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'author_id',
        'deleted_by',
    ];

    // order items
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(BookCategory::class, 'book_category', 'book_id', 'category_id');
    }

    public function genres()
    {
        return $this->belongsToMany(BookGenre::class, 'book_genre', 'book_id', 'genre_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function cart()
    {
        return $this->morphOne(Cart::class, 'item');
    }

    public function reviews()
    {
        return $this->hasMany(BookReview::class)->where('status', 'approved');
    }

    // review count for a course
    public function reviewsCount()
    {
        return $this->reviews()->where('status', 'approved')->count();
    }

    public function reviewsAvg()
    {
        $averageRating = $this->reviews()->where('status', 'approved')->avg('rating');

        // Check if $averageRating is not null before formatting it
        if ($averageRating !== null) {
            return number_format($averageRating, 1);
        } else {
            // Handle the case where there are no approved reviews or the average rating is null
            return 0; // or any other appropriate value or action
        }
    }

    // 5 star rating count for a course
    public function reviewsFiveStarCount()
    {
        return $this->reviews()->where('status', 'approved')->where('rating', 5)->count();
    }


    // 5 star ratting percentage for a course where reviews status approved
    public function reviewsFiveStarPercentage()
    {
        $total = $this->reviews()->where('status', 'approved')->count();
        if ($total > 0) {
            return number_format(($this->reviewsFiveStarCount() / $total) * 100, 0);
        } else {
            return 0;
        }
    }

    // 4 star rating count for a course
    public function reviewsFourStarCount()
    {
        return $this->reviews()->where('status', 'approved')->where('rating', 4)->count();
    }

    // 4 star rating percentage for a course where reviews status approved
    public function reviewsFourStarPercentage()
    {
        $total = $this->reviews()->where('status', 'approved')->count();
        if ($total > 0) {
            return number_format(($this->reviewsFourStarCount() / $total) * 100, 0);
        } else {
            return 0;
        }
    }

    // 3 star rating count for a course
    public function reviewsThreeStarCount()
    {
        return $this->reviews()->where('status', 'approved')->where('rating', 3)->count();
    }

    // 3 star rating percentage for a course where reviews status approved
    public function reviewsThreeStarPercentage()
    {
        $total = $this->reviews()->where('status', 'approved')->count();
        if ($total > 0) {
            return number_format(($this->reviewsThreeStarCount() / $total) * 100, 0);
        } else {
            return 0;
        }
    }

    // 2 star rating percentage for a course

    public function reviewsTwoStarCount()
    {
        return $this->reviews()->where('status', 'approved')->where('rating', 2)->count();
    }

    // 2 star rating percentage for a course where reviews status approved
    public function reviewsTwoStarPercentage()
    {
        $total = $this->reviews()->where('status', 'approved')->count();
        if ($total > 0) {
            return number_format(($this->reviewsTwoStarCount() / $total) * 100, 0);
        } else {
            return 0;
        }
    }

    // 1 star rating percentage for a course

    public function reviewsOneStarCount()
    {
        return $this->reviews()->where('status', 'approved')->where('rating', 1)->count();
    }

    // 1 star rating percentage for a course where reviews status approved
    public function reviewsOneStarPercentage()
    {
        $total = $this->reviews()->where('status', 'approved')->count();
        if ($total > 0) {
            return number_format(($this->reviewsOneStarCount() / $total) * 100, 0);
        } else {
            return 0;
        }
    }
}