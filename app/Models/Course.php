<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(CourseCategory::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(CourseSubCategory::class, 'course_sub_category_id');
    }

    public function topics()
    {
        return $this->hasMany(Topic::class);
    }

    public function curriculum()
    {
        return $this->hasOne(Curriculum::class);
    }

    public function lessons()
    {
        return $this->hasManyThrough(Lesson::class, Topic::class);
    }

    public function language()
    {
        return $this->belongsTo(CourseLanguage::class, 'language_id');
    }


    //get all quizzes
    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }

    //get all active quizzes
    public function activeQuizzes()
    {
        return $this->hasMany(Quiz::class)->where('quiz_status', 'active');
    }

    //get all resources
    public function resources()
    {
        return $this->hasMany(Resource::class);
    }

    //get all assignments

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    //get all active assignments
    public function activeAssignments()
    {
        return $this->hasMany(Assignment::class)->where('status', 'active');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // lessons count for a course
    public function lessonsCount()
    {
        return $this->lessons()->count();
    }

    public function cart()
    {
        return $this->morphOne(Cart::class, 'item');
    }

    //get all reviews where status approved
    public function reviews()
    {
        return $this->hasMany(Review::class)->where('status', 'approved');
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

    // review count for a course where reviews status approved

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
