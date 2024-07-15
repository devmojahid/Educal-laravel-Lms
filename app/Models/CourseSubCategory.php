<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSubCategory extends Model
{
    use HasFactory;

    protected $table = 'course_sub_categories';

    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'svg',
        'icon',
        'status',
        'course_category_id',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    public function course_category()
    {
        return $this->belongsTo(CourseCategory::class);
    }
}