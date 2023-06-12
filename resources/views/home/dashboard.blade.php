@extends('layouts.app-master')

@section('content')
<div class="container">
    @auth
    <div container-fluid>
        <div class="btn-group pull-right" role="group" aria-label="Basic example">
            <a class="btn btn-primary" href="{{ URL::to('users/') }}">Clients</a>
        </div>
    </div>
    <h1>Dashboard</h1>
    <!-- This area is used to dispay errors -->

    <p class="lead text-center">Construction cannot start until all data repositories are assembled & populated0.</p>

    <div class="container">
        // Crack on...
    </div>
    @endauth

    @guest
    <h1>Homepage</h1>
    <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
    @endguest
</div>
@endsection