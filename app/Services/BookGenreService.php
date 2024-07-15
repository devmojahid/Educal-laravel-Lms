<?php

namespace App\Services;

use App\Models\BookGenre;
use Illuminate\Support\Str;

class BookGenreService
{
    function store(array $data)
    {
        $bookGenre = new BookGenre();

        $this->saveCategory($bookGenre, $data);
    }

    function update(array $data, BookGenre $bookGenre)
    {
        $this->saveCategory($bookGenre, $data, true);
    }

    function saveCategory(BookGenre $bookGenre, array $data, $is_update = false)
    {
        $bookGenre->title = sanitizeInput($data['title']);
        $bookGenre->slug = createSlug($data['title'], bookGenre::class, $is_update ? $bookGenre->id : null, $is_update ? $bookGenre->slug : null);
        $bookGenre->description = sanitizeInput($data['description']);
        $bookGenre->status = $data['status'];
        if (!empty($data['image'])) {
            if ($is_update && !empty($bookGenre->image) && file_exists(public_path($bookGenre->image))) {
                unlink(public_path($bookGenre->image));
            }
            $bookGenre->image = $this->fileHandler($data['image'], '/uploads/book_genre/');
        }
        $bookGenre->meta_title = $data['meta_title'];
        $bookGenre->meta_description = sanitizeInput($data['meta_description']);
        $bookGenre->save();
    }

    function fileHandler($file, $path, $old_file = null)
    {
        $file_name = $path . time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path($path), $file_name);
        return $file_name;
    }
}
