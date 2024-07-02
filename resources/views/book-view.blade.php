@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card">
                    <img src="{{ asset('uploads/covers/' . $book->cover_path) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$book->book_name}}</h5>
                        <p class="card-text">{{$book->description}}</p>
                        <p class="card-text">{{$book->price}}</p>
                        <form action="{{route('books.addFavorite', ['book'=>$book->id])}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-primary">
                                Add to favourite
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
