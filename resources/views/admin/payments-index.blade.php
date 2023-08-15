<x-app-layout>
    <x-slot name="header">
        <div class="container text-center">
            @auth
            <div class="row">
                <div class="col col-lg-7">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <div class="btn">
                            <a class="btn btn-outline-danger" href="{{ URL::to('rentalpayments') }}">Rentals</a>
                        </div>
                        <div class="btn">
                            <a class="btn btn-outline-danger" href="{{ URL::to('/outstanding-deposits') }}">Deposits</a>
                        </div>
                        <div class="btn">
                            <form method="GET" class="d-flex" role="search">
                                <input class="form-control me-2" type="search" name="search" value="{{ request()->get('search') }}" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
                                <button class="btn btn-outline-danger" type="submit" id="button-addon2">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-5">
                    <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ $count }} {{ $paymentType }} {{ __('Payments Due') }}
                    </h1>
                </div>
            </div>
            <div>
                <!-- resources/views/tasks.blade.php -->

            </div>
        </div>
    </x-slot>

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

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">REGISTRATION</th>
                                <th scope="col">TYPE</th>
                                <th scope="col">AMOUNT</th>
                                <th scope="col">DUE DATE</th>
                                <th scope="col"></th>
                                <th scope="col">Discount Amount (£)</th>
                                <th scope="col"></th>
                                <th scope="col" class="text-center" style="color: red;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rentalpayments as $payment)
                            <tr>
                                <td scope="row">{{ $payment->id }}</td>
                                <td scope="row">{{ $payment->registration }}</td>
                                <td class="text-capitalize">{{ $payment->payment_type }}</td>
                                <td>{{ $payment->outstanding }}</td>
                                <td>{{ Carbon\Carbon::parse($payment->payment_due_date)->format('d/m/Y') }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <div class="btn">
                                            <a class="btn btn-success" href="{{ URL::to('users/' . $payment->user_id) }}">Client</a>
                                        </div>
                                        <div class="btn">
                                            <a class="btn btn-primary" href="{{ URL::to('motorcycles/' . $payment->motorcycle_id) }}">Motorcycle</a>
                                        </div>
                                    </div>
                                </td>
                                <form action="/discount-payment" method="POST" enctype="multipart/form-data">
                                    <td class="text-center">
                                        @csrf
                                        <input hidden name="payment_id" id="payment_id" value="{{ $payment->id }}">
                                        <input name="discountAmount" id="discountAmount">
                                    </td>
                                    <td>
                                        <div class="btn">
                                            <button class="btn btn-outline-success" type="submit">Discount</button>
                                        </div>
                                    </td>
                                </form>
                                <form action="/void-payment" method="POST" enctype="multipart/form-data">
                                    <td class="text-center">
                                        @csrf
                                        <input hidden name="payment_id" id="payment_id" value="{{ $payment->id }}">
                                        <div class="btn">
                                            <button class="btn btn-outline-danger" type="submit">VOIiD</button>
                                        </div>
                                    </td>
                                </form>
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
        </div>
    </div>

</x-app-layout>
