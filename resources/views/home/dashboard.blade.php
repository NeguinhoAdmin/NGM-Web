@extends('layouts.app-master')

@section('content')
<div class="container">
    @auth

    <div class="btn-group pull-right mb-3" role="group" aria-label="Basic example">
        <a class="btn btn-primary" href="{{ URL::to('users/') }}">Clients</a>
    </div>

    <h1>Dashboard</h1>
    <h5 class="title mb-3">Date: {{ $toDay }}</h5>

    <!-- This area is used to dispay errors -->

    <div class="row align-items-start">
        <div class="col">
            <h4>{{ $count }} Payments</h4>
            <table class="table-striped">
                <td>Outstanding: £{{ $rpayments }} </td>
            </table>
            <table class="table-striped">
                <td>{{ $rcount }} Rentals £{{ $rrpayments }}</td>
            </table>
            <table class="table-striped">
                <td>{{ $dcount }} Deposits £{{ $ddpayments }}</td>
            </table>
        </div>
        <div class="col">

        </div>
        <div class="col">

        </div>
    </div>
    @endauth

    @guest
    <h1>Homepage</h1>
    <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
    @endguest
</div>
@endsection