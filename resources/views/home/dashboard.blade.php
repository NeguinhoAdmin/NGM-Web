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

    <div class="row align-items-start mb-3">
        <div class="col">
            <h4>{{ $count }} Rental Payments</h4>
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
            <h4>Fleet Stats</h4>
            <div>
                <canvas id="rentals" height="100px"></canvas>
            </div>
            <table class="table-striped">
                <td>For Rent: {{ $forRentCount }}</td>
            </table>
            <table class="table-striped">
                <td>Rented: {{ $rentedCount }}</td>
            </table>
            <table class="table-striped">
                <td>For Sale: {{ $forSaleCount }}</td>
            </table>
            <table class="table-striped">
                <td>Sold: {{ $soldCount }}</td>
            </table>
            <table class="table-striped">
                <td>Repairs: {{ $repairsCount }}</td>
            </table>
            <table class="table-striped">
                <td>Cat B: {{ $catBCount }}</td>
            </table>
            <table class="table-striped">
                <td>Claim in Progress: {{ $claimInProgressCount }}</td>
            </table>
            <table class="table-striped">
                <td>Impounded: {{ $impoundedCount }}</td>
            </table>
            <table class="table-striped">
                <td>Accident: {{ $accidentCount }}</td>
            </table>
            <table class="table-striped">
                <td>Missing: {{ $missingCount }}</td>
            </table>
            <table class="table-striped">
                <td>Stolen: {{ $stolenCount }}</td>
            </table>
        </div>
    </div>

    <div class="row align-items-start mb-3">
        <div class="col">


        </div>
        <div class="col">
            <div>
                <canvas id="rentals" height="100px"></canvas>
            </div>
        </div>
    </div>
    @endauth

    @guest
    <h1>Homepage</h1>
    <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
    @endguest
</div>
@stop