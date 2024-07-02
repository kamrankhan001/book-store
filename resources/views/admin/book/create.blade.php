@extends('layouts.admin')

@section('title', 'Add Book')

@section('main')
<div class="container" style="height: 100vh">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1 class="my-4">Add New Book</h1>
            <form action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="book_name" class="form-label">Book Name</label>
                    <input type="text" class="form-control" id="book_name" name="book_name" placeholder="Book Name" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" id="price" name="price" placeholder="Price" required>
                </div>
                <div class="mb-3">
                    <label for="cover_picture" class="form-label">Cover Picture</label>
                    <input type="file" class="form-control" id="cover_picture" name="cover_picture" required>
                </div>
                <button type="submit" class="btn btn-success">Add</button>
            </form>
        </div>
    </div>
</div>
@endsection
