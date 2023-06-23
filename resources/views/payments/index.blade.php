@extends('layouts.app-master')

@section('content')
<div class="container mb-3">
    @auth
    <h1 class="mb-3">{{ $count }} Payments Due</h1>
    <div class="containe">
        <div class=" row align-items-start">
            <div class="col">
                <div class="container-fluid">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a class="btn btn-outline-primary" href="{{ URL()->previous() }}">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
        </ui>
</div>
@endif
<!-- This area is used to dispay errors -->

<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">REGISTRATION</th>
                <th scope="col">TYPE</th>
                <th scope="col">AMOUNT</th>
                <th scope="col">DUE DATE</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rentalpayments as $payment)
            <tr>
                <th scope="row">{{ $payment->registration }}</th>
                <th class="text-capitalize">{{ $payment->payment_type }}</th>
                <td>{{ $payment->outstanding }}</td>
                <td>{{ $payment->payment_due_date }}</td>
                <td>
                    <a class="btn btn-outline-primary" href="{{ URL::to('users/' . $payment ->user_id) }}">Client Record</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endauth

@guest
<h1>Homepage</h1>
<p class=" lead">Your viewing the home page. Please login to view the restricted data.</p>
@endguest
</div>
@endsection