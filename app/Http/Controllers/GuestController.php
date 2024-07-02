<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class GuestController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('leading', compact('books'));
    }

    public function show(string $id)
    {
        $book = Book::findOrFail($id);
        return view('book-view', compact('book'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $books = Book::where('book_name', 'LIKE', "%{$query}%")
                    ->orWhere('description', 'LIKE', "%{$query}%")
                    ->get();

        return view('search-results', compact('books', 'query'));
    }

}
