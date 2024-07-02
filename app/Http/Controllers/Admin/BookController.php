<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('admin.book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.book.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'book_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'cover_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle the file upload
        if ($request->hasFile('cover_picture')) {
            $file = $request->file('cover_picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/covers'), $filename);
        }

        Book::create([
            'book_name' => $request->book_name,
            'description' => $request->description,
            'price' => $request->price,
            'cover_path' => $filename,
        ]);

        return redirect()->route('book.index')->with('success', 'Book added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::findOrFail($id);
        return view('admin.book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
        return view('admin.book.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book = Book::findOrFail($id);

        $request->validate([
            'book_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'cover_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'book_name' => $request->book_name,
            'description' => $request->description,
            'price' => $request->price,
        ];

        // Handle the file upload
        if ($request->hasFile('cover_picture')) {
            $file = $request->file('cover_picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/covers'), $filename);

            // Delete the old cover picture if it exists
            if ($book->cover_picture) {
                $oldFilePath = public_path('uploads/covers/' . $book->cover_picture);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }

            $data['cover_path'] = $filename;
        }

        $book->update($data);

        return redirect()->route('book.index')->with('success', 'Book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('book.index')->with('success', 'Book deleted successfully.');
    }
}
