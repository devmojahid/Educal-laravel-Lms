<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseCategoryUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_category_id',
        'user_id',
    ];

    public function course_category()
    {
        return $this->belongsTo(CourseCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
