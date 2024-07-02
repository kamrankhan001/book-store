@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('books.search') }}" method="GET" class="mb-5">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <input type="text" name="query" id="query" class="form-control"
                            placeholder="Search for a book...">
                    </div>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
        </form>
    </div>
    <div class="row">
        @foreach ($books as $book)
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card">
                    <img src="{{ asset('uploads/covers/' . $book->cover_path) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $book->book_name }}</h5>
                        <p class="card-text">{{ $book->description }}</p>
                        <a href="{{ route('show', ['id' => $book->id]) }}">Read More</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    </div>
@endsection
