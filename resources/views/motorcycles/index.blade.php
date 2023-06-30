@extends('layouts.app-master')

@section('content')
<div class="container">
    @auth
    <h1>{{ $count }} Motorcycle(s)</h1>
    <div class="container">
        <div class="row mb-3">
            <div class="container">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a class="btn btn-primary" href="{{ URL::to('/motorcycles/create') }}">Add Used Motorcycle</a>
                    <!-- <a class="btn btn-outline-primary" href="{{ URL::to('find-motorcycle/') }}">Add Motorcycle</a> -->
                </div>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a class="btn btn-primary" href="{{ URL::to('check-vehicle-reg/') }}">Check Reg</a>
                </div>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a class="btn btn-outline-primary" href="{{ URL::to('/create-new-motorcycle') }}">Add New Motorcycle</a>
                    <!-- <a class="btn btn-outline-primary" href="{{ URL::to('find-motorcycle/') }}">Add Motorcycle</a> -->
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="container">
            <div class="btn-group" role="group" aria-label="Basic example">
                <a class="btn btn-outline-primary" href="{{ URL::to('motorcycles/') }}">All</a>
            </div>
            <div class="btn-group" role="group" aria-label="Basic example">
                <a class="btn btn-outline-primary" href="{{ URL::to('is-for-rent/') }}">For Rent</a>
            </div>
            <div class="btn-group" role="group" aria-label="Basic example">
                <a class="btn btn-outline-primary" href="{{ URL::to('is-rented/') }}">Rented</a>
            </div>
            <div class="btn-group" role="group" aria-label="Basic example">
                <a class="btn btn-outline-primary" href="{{ URL::to('is-for-sale/') }}">For Sale</a>
            </div>

            <div class="btn-group" role="group" aria-label="Basic example">
                <a class="btn btn-outline-primary" href="{{ URL::to('is-sold/') }}">Sold</a>
            </div>
            <div class="btn-group" role="group" aria-label="Basic example">
                <a class="btn btn-outline-primary" href="{{ URL::to('in-for-repairs/') }}">Repairs</a>
            </div>
            <div class="btn-group" role="group" aria-label="Basic example">
                <a class="btn btn-outline-primary" href="{{ URL::to('cat-b/') }}">Cat B</a>
            </div>
            <div class="btn-group" role="group" aria-label="Basic example">
                <a class="btn btn-outline-primary" href="{{ URL::to('claim-in-progress/') }}">Claim In Progress</a>
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
                <td class="text-uppercase">{{$motorcycle->make}}</td>
                <td class="text-uppercase">{{$motorcycle->model}}</td>
                <td class="text-uppercase">{{$motorcycle->engine}}CC</td>
                <td class="text-uppercase">{{$motorcycle->year}}</td>
                <td class="text-uppercase">{{$motorcycle->colour}}</td>
                <td>
                    @if ($motorcycle->availability === 'for rent')
                    <a class="btn btn-outline-primary" href="{{ URL::to('rental-signup/' . $motorcycle->id) }}" target="_blank">Book</a>
                    @endif
                </td>
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