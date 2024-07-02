@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>{{ __('You are logged in!') }}</p>

                    <h3>Your Information</h3>
                    <ul>
                        <li>Name: {{ $user->name }}</li>
                        <li>Email: {{ $user->email }}</li>
                    </ul>
                    <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>

                    <h3 class="mt-4">Favorite Books</h3>
                    @if($favoriteBooks->isEmpty())
                        <p>You have not added any books to your favorites yet.</p>
                    @else
                        <ul>
                            @foreach($favoriteBooks as $book)
                                <li>{{ $book->book_name }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
