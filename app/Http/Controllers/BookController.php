<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Contracts\View\View;

class BookController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Book::class);
    }
    public function index(): View
    {
        $books = Book::all();

        return view('books.index', compact('books'));
    }
}
