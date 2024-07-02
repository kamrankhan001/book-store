<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    // Other existing methods...

    /**
     * Add a book to the user's favorites.
     */
    public function addFavorite(Book $book)
    {
        $user = Auth::user();
        $user->favoriteBooks()->attach($book->id);

        return redirect()->back()->with('success', 'Book added to favorites.');
    }

    /**
     * Remove a book from the user's favorites.
     */
    public function removeFavorite(Book $book)
    {
        $user = Auth::user();
        $user->favoriteBooks()->detach($book->id);

        return redirect()->back()->with('success', 'Book removed from favorites.');
    }
}

