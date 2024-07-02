@extends('layouts.admin')

@section('title', 'Books')

@section('main')
<div class="container" style="height: 100vh">
    <div class="row">
        <div class="col-md-12">
            <h1 class="my-4">Books</h1>
            <a href="{{ route('book.create') }}" class="btn btn-primary mb-4">Add Book</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->book_name }}</td>
                        <td>{{ $book->description }}</td>
                        <td>{{ $book->price }}</td>
                        <td>
                            <a href="{{ route('book.show', $book->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('book.edit', $book->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('book.destroy', $book->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
