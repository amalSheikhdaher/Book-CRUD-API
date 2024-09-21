<?php

namespace App\Services;

use App\Models\Book;
use Illuminate\Support\Facades\Log;
use Exception;

class BookService
{
    /**
     * Store a newly created book in the database.
     * 
     * @param \App\Http\Requests\StoreBookRequest $request The validated request containing book data.
     * @return \App\Models\Book
     */
    public function store($data): Book
    {
        try {
            return Book::create([
                'title'        => $data->title,
                'author'       => $data->author,
                'published_at' => $data->published_at,
                'is_active'    => $data->is_active
            ]);
        } catch (Exception $e) {
            Log::error($e);
            throw new Exception('Failed to created book: ' . $e->getMessage());
        }
    }

    /**
     * Update an existing book in the database.
     * 
     * @param \App\Models\Book $book The book instance to be updated.
     * @param \App\Http\Requests\UpdateBookRequest $request The validated request containing updated book data.
     * @return \App\Models\Book
     */
    public function update(Book $book, $data): Book
    {
        try {
            $book->update([
                'title'        => $data['title'] ?? $book->title,
                'author'       => $data['author'] ?? $book->author,
                'published_at' => $data['published_at'] ?? $book->published_at,
                'is_active'    => $data['is_active'] ?? $book->is_active,
            ]);
            return $book;
        } catch (Exception $e) {
            Log::error($e);
            throw new Exception('Failed to updated book: ' . $e->getMessage());
        }
    }

    /**
     * Delete a book from the database.
     * 
     * @param \App\Models\Book $book The book instance to be deleted.
     * @return \App\Models\Book
     */
    public function delete(Book $book): void
    {
        try {
            $book->delete();
        } catch (Exception $e) {
            Log::error($e);
            throw new Exception('Failed to deleted book: ' . $e->getMessage());
        }
    }
}
