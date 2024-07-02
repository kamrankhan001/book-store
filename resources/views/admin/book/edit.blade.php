@extends('layouts.admin')

@section('title', 'Edit Book')

@section('main')
<div class="container" style="height: 100vh">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1 class="my-4">Edit Book</h1>
            <form action="{{ route('book.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="book_name" class="form-label">Book Name</label>
                    <input type="text" class="form-control" id="book_name" name="book_name" placeholder="Book Name" required value="{{ $book->book_name }}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $book->description }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" id="price" name="price" placeholder="Price" required value="{{ $book->price }}">
                </div>
                <div class="mb-3">
                    <label for="cover_picture" class="form-label">Cover Picture</label>
                    @if($book->cover_picture)
                        <img src="{{ asset('uploads/covers/' . $book->cover_picture) }}" alt="Cover Picture" class="img-thumbnail mb-2" style="max-width: 200px;">
                    @endif
                    <input type="file" class="form-control" id="cover_picture" name="cover_picture">
                </div>
                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
