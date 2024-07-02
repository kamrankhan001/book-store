@extends('layouts.admin')

@section('title', 'User')

@section('main')
<div class="container" style="height: 100vh">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1 class="my-4">User</h1>
            <table>
                <tr>
                    <th>Name</th>
                    <td>{{$user->name}}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{$user->email}}</td>
                </tr>
                <tr>
                    <th>Type</th>
                    <td>{{$user->type}}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
