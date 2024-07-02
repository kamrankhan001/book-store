@extends('layouts.admin')

@section('title','Dashboard')

@section('main')
    <div class="p-5" style="height: 100vh">
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="card card-hover">
                    <div class="box bg-cyan text-center">
                        <h1 class="font-light text-white">
                            <i class="mdi mdi-view-dashboard"></i>
                        </h1>
                        <h6 class="text-white">Dashboard</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="card card-hover">
                    <div class="box bg-success text-center">
                        <h1 class="font-light text-white">
                            <i class="fas fa-address-book"></i>
                        </h1>
                        <h6 class="text-white">Books</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
