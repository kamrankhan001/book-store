@extends('layouts.admin')

@section('title', 'Book')

@section('main')
<div class="container" style="height: 100vh">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1 class="my-4">Book</h1>
            <table class="table table-bordered">
                <tr>
                    <th>Book Name</th>
                    <td>{{ $book->book_name }}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{{ $book->description }}</td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td>{{ $book->price }}</td>
                </tr>
                <tr>
                    <th>Cover Picture</th>
                    <td>
                        @if($book->cover_path)
                            <img src="{{ asset('uploads/covers/' . $book->cover_path) }}" alt="Cover Picture" class="img-thumbnail" style="max-width: 200px;">
                        @else
                            <span>No cover picture available</span>
                        @endif
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
