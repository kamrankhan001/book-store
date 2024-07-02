@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if ($books->isEmpty())
                <p>No books found matching your search criteria.</p>
            @else
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
            @endif
        </div>
    </div>
@endsection


{{-- @if ($books->isEmpty())
<p>No books found matching your search criteria.</p>
@else
<ul class="list-group">
    @foreach ($books as $book)
        <li class="list-group-item">
            <h5>{{ $book->book_name }}</h5>
            <p>{{ $book->description }}</p>
        </li>
    @endforeach
</ul>
@endif --}}
