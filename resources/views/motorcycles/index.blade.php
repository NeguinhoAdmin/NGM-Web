@extends('layouts.app-master')

@section('content')
<div class="container">
    @auth
    <h1>{{ $count }} Motorcycle(s)</h1>
    <div class="container text-center">
        <div class="row align-items-start">
            <div class="col">
                <div class="container-fluid">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a class="btn btn-outline-primary" href="{{ URL::to('motorcycles/') }}">All</a>
                    </div>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a class="btn btn-outline-primary" href="{{ URL::to('is_for_rent/') }}">For Rent</a>
                    </div>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a class="btn btn-outline-primary" href="{{ URL::to('is_rented/') }}">Rented</a>
                    </div>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a class="btn btn-outline-primary" href="{{ URL::to('is_for_sale/') }}">For Sale</a>
                    </div>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a class="btn btn-outline-primary" href="{{ URL::to('unallocated/') }}">Unallocated</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="container-fluid">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a class="btn btn-primary" href="{{ URL::to('/motorcycles/create') }}">Add Motorcycle</a>
                        <!-- <a class="btn btn-outline-primary" href="{{ URL::to('find-motorcycle/') }}">Add Motorcycle</a> -->
                    </div>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a class="btn btn-outline-primary" href="{{ URL::to('check-vehicle-reg/') }}">Check Reg</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>

    <!-- This area is used to dispay errors -->
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <strong>{{ $message }}</strong>
    </div>
    @endif
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <!-- This area is used to dispay errors -->

    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Registration</th>
                    <th scope="col">Make</th>
                    <th scope="col">Model</th>
                    <th scope="col">Displacement</th>
                    <th scope="col">Year</th>
                    <th scope="col">Colour</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($motorcycles as $motorcycle)
                <tr>
                    <th class="text-uppercase" scope="row">{{$motorcycle->registration}}</th>
                    <td>{{$motorcycle->make}}</td>
                    <td>{{$motorcycle->model}}</td>
                    <td>{{$motorcycle->engine}}CC</td>
                    <td>{{$motorcycle->year}}</td>
                    <td>{{$motorcycle->colour}}</td>
                    <td></td>
                    <td>
                        <a class="btn btn-outline-primary" href="{{ URL::to('motorcycles/' . $motorcycle->id) }}">Details</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endauth

    @guest
    <h1>Homepage</h1>
    <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
    @endguest
</div>
@endsection
