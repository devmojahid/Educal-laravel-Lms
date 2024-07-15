<?php

namespace App\Services;

use App\Models\BookCategory;
use Illuminate\Support\Str;

class BookCategoryService
{
    function store(array $data)
    {
        $book_category = new BookCategory();

        $this->saveCategory($book_category, $data);
    }

    function update(array $data, BookCategory $bookCategory)
    {
        $this->saveCategory($bookCategory, $data, true);
    }

    function saveCategory(BookCategory $bookCategory, array $data, $is_update = false)
    {
        $bookCategory->title = sanitizeInput($data['title']);
        $bookCategory->slug = createSlug($data['title'], BookCategory::class, $is_update ? $bookCategory->id : null, $is_update ? $bookCategory->slug : null);
        $bookCategory->description = sanitizeInput($data['description']);
        $bookCategory->status = $data['status'];
        if (!empty($data['svg'])) {
            if ($is_update && !empty($bookCategory->svg) && file_exists(public_path($bookCategory->svg))) {
                unlink(public_path($bookCategory->svg));
            }
            $bookCategory->svg = $this->fileHandler($data['svg'], '/uploads/book_category/');
        }
        $bookCategory->meta_title = $data['meta_title'];
        $bookCategory->meta_description = sanitizeInput($data['meta_description']);
        $bookCategory->save();
    }

    function fileHandler($file, $path, $old_file = null)
    {
        $file_name = $path . time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path($path), $file_name);
        return $file_name;
    }
}
