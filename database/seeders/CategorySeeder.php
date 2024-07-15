<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BlogCategory;
use App\Models\CourseCategory;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //blog category seeder create uncategorized category
        $category = new BlogCategory();
        $category->title = 'Uncategorized';
        $category->slug = 'uncategorized';
        $category->description = 'This is uncategorized category';
        $category->status = 1;
        $category->save();

        //course category seeder create uncategorized category
        $category = new CourseCategory();
        $category->title = 'Uncategorized';
        $category->slug = 'uncategorized';
        $category->description = 'This is uncategorized category';
        $category->status = 1;
        $category->save();

    }
}
