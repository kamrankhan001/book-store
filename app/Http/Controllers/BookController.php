<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
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
    public function removeFavorite($bookId)
    {
        $user = Auth::user();
        $user->favoriteBooks()->detach($bookId);

        return redirect()->back()->with('success', 'Book removed from favorites.');
    }
}

