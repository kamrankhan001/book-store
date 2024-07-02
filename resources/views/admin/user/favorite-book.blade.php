@extends('layouts.admin')

@section('title', 'Users and Their Favorite Books')

@section('main')
<div class="container" style="height: 100vh">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <h1 class="my-4">Users and Their Favorite Books</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>User Email</th>
                        <th>Favorite Books</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if($user->favoriteBooks->isEmpty())
                                    <p>No favorite books.</p>
                                @else
                                    <ul>
                                        @foreach($user->favoriteBooks as $book)
                                            <li>{{ $book->book_name }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
