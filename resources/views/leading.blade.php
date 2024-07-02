@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($books as $book)
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="card">
                        <img src="{{ asset('uploads/covers/' . $book->cover_path) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$book->book_name}}</h5>
                            <p class="card-text">{{$book->description}}</p>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
