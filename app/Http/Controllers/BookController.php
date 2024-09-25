<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Services\BookService;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Resources\BookResource;
use App\Http\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class BookController extends Controller
{
    // This trait provides standardized methods for API responses.
    use ApiResponseTrait;

    // Dependency injection for BookService to handle business logic.
    protected BookService $bookService;

    /**
     * Constructor to inject the BookService into the controller.
     * 
     * @param BookService $bookService The service class responsible for handling business logic.
     */
    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    /**
     * Display a listing of books with pagination.
     * 
     * @return JsonResponse Paginated list of books in JSON format.
     */
    public function index(): JsonResponse
    {
        $books = Book::paginate(5);
        return $this->responseApi(
            BookResource::collection($books),
            'Book Store Successfully',
            200
        );
    }

    /**
     * Store a newly created book in the database.
     * 
     * @param StoreBookRequest $request Validated request object containing book details.
     * @return JsonResponse Response with created book data and success message.
     */
    public function store(StoreBookRequest $request): JsonResponse
    {
        $book = $this->bookService->store($request);
        return $this->responseApi(
            new BookResource($book),
            'Book Store Successfully',
            201
        );
    }

    /**
     * Display a single book's details.
     * 
     * @param Book $book The book instance to display.
     * @return JsonResponse Response with single book data and success message.
     */
    public function show(Book $book): JsonResponse
    {
        return $this->responseApi(
            new BookResource($book),
            'Single Book data Show',
            200
        );
    }

    /**
     * Update an existing book in the database.
     * 
     * @param UpdateBookRequest $request Validated request object with updated book details.
     * @param Book $book The book instance to update.
     * @return JsonResponse Response with updated book data and success message.
     */
    public function update(UpdateBookRequest $request, Book $book): JsonResponse
    {
        $data = $this->bookService->update($book, $request);
        return $this->responseApi(
            new BookResource($data),
            'Book Update Successfully',
            200
        );
    }

    /**
     * Remove a book from the database.
     * 
     * @param Book $book The book instance to delete.
     * @return JsonResponse Response with success message after deletion.
     */
    public function destroy(Book $book): JsonResponse
    {
        $this->bookService->delete($book);
        return $this->responseApi(
            true,
            'Book Delete Successfully',
            200
        );
    }
}
