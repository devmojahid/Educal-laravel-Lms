<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseCategory extends Model
{
    use HasFactory;

    protected $table = 'course_categories';

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

    public function course()
    {
        return $this->hasMany(Course::class, 'category_id', 'id');
    }

    public function user()
    {
        return $this->belongsToMany(User::class, 'course_category_users', 'course_category_id', 'user_id');
    }

    public function course_category_user()
    {
        return $this->hasMany(CourseCategoryUser::class, 'course_category_id', 'id');
    }

    
}
