<?php

namespace App\Services;

use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BookService
{

    function store(array $data)
    {
        $book = new Book();
        $book = $this->saveCategory($book, $data);
        return $book;
    }

    function update(array $data, Book $book)
    {
        $this->saveCategory($book, $data, true);
    }

    function saveCategory(Book $book, array $data, $is_update = false): Book
    {
        DB::transaction(function () use ($book, $data, $is_update) {

            $book->title = sanitizeInput($data['title']);
            $book->slug = createSlug($data['title'], book::class, $is_update ? $book->id : null, $is_update ? $book->slug : null);
            $book->description = sanitizeInput($data['description']);
            $book->short_description = sanitizeInput($data['short_description']);
            $book->price = isset($data['price']) && is_numeric($data['price']) ? $data['price'] : 0;;
            $book->discount_price = isset($data['discount_price']) && is_numeric($data['discount_price']) ? $data['discount_price'] : 0;
            $book->stock = isset($data['stock']) && is_numeric($data['stock']) ? (int)$data['stock'] : 0;
            $book->book_pages = isset($data['book_pages']) && is_numeric($data['book_pages']) ? (int)$data['book_pages'] : 0;
            $book->product_type = $data['product_type'] ?? null;
            $book->language = $data['language'];
            $book->author_id = Auth::user()->id;
            $book->status = $data['status'];

            $specifications = [];
            if (!empty($data['specifications'])) {
                foreach ($data['specifications'] as $specification) {
                    if (!empty($specification['key']) && !empty($specification['value'])) {
                        $specifications[] = [
                            'key' => $specification['key'],
                            'value' => $specification['value']
                        ];
                    }
                }
            }

            $book->specifications = json_encode($specifications);

            if (!empty($data['image'])) {
                if ($is_update && !empty($book->image) && $book->image != '/uploads/cms/book/book-placeholder.png' && file_exists(public_path($book->image))) {
                    unlink(public_path($book->image));
                }
                $book->image = $this->fileHandler($data['image'], '/uploads/book/');
            }

            if (!empty($data['book_file'])) {
                if ($is_update && !empty($book->book_file) && $book->book_file != '/uploads/book/book-placeholder.png' && file_exists(public_path($book->book_file))) {
                    unlink(public_path($book->book_file));
                }
                $book->book_file = $this->fileHandler($data['book_file'], '/uploads/book/');
            }
            $book->meta_title = $data['meta_title'];
            $book->meta_description = sanitizeInput($data['meta_description']);
            $book->meta_keywords = $data['meta_keywords'] ?? null;
            $book->save();


            $book->categories()->sync($data['category_id'] ?? []);
            $book->genres()->sync($data['genre_id'] ?? []);
        });

        return $book;
    }

    function fileHandler($file, $path, $old_file = null)
    {
        $file_name = $path . time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path($path), $file_name);
        return $file_name;
    }
}
