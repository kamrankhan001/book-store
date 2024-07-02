@extends('layouts.admin')

@section('title', 'Users')

@section('main')
<div class="container" style="height: 100vh">
    <div class="row">
        <div class="col-md-12">
            <h1 class="my-4">Users</h1>
            <a href="{{ route('user.create') }}" class="btn btn-primary mb-4">Create User</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->type }}</td>
                        <td>
                            <a href="{{ route('user.show', $user->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline-block;">
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
