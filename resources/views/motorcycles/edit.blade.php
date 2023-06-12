@extends('layouts.app-master')

@section('content')
<div class="container">
    @auth
    <h1>{{ $motorcycle->registration }}</h1>
    <div class="conatiner-fluid">
        <div class="btn-group pull-right" role="group" aria-label="Basic example">
            <a class="btn btn-outline-success" href="{{ URL()->previous() }}">Back</a>
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

    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    <h4>Vehicle</h4>
                </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <div class="container">
                        <div class="row align-items-start">
                            <div class="col">
                                <h4>Basic Details</h4>
                                <form action={{ route('motorcycles.update',$motorcycle->id) }} method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input hidden class="form-control" type="text" placeholder="Registration" name="registration" id="registration" value="{{ $motorcycle->registration }}">
                                    <div class="mb-3">
                                        {{ $motorcycle->make }}
                                        {{-- <input class="form-control" type="text" placeholder="Make" name="make"
                                            id="make" value="{{ $motorcycle->make }}"> --}}
                                    </div>
                                    <div class="mb-3">
                                        <input class="form-control" type="text" placeholder="Model" name="model" id="model" value="{{ $motorcycle->model }}">
                                    </div>
                                    <div class="mb-3">
                                        <input class="form-control" type="text" placeholder="Colour" name="colour" id="colour" value="{{ $motorcycle->colour }}">
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Engine" name="engine" id="engine" value="{{ $motorcycle->engine  }}">
                                        <span class="input-group-text" id="engine">CC</span>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="fuel_type" name="fuel_type" placeholder="Fuel Type" value="{{ $motorcycle->fuel_type }}">
                                    </div>
                                    <div class="mb-3">
                                        <input class="form-control" type="text" placeholder="Year" name="year" id="year" value="{{ $motorcycle->year }}">
                                    </div>
                                    <div class="mb-3">
                                        <input class="form-control" type="text" placeholder="Tax Status" name="tax_status" id="tax_status" value="{{ $motorcycle->tax_status }}">
                                    </div>
                                    <div class="mb-3">
                                        <input class="form-control" type="text" placeholder="Tax Due Date" name="tax_due_date" id="tax_due_date" value="{{ $motorcycle->tax_due_date }}">
                                    </div>
                                    <div class="mb-3">
                                        <input class="form-control" type="text" placeholder="MOT Status" name="mot_status" id="mot_status" value="{{ $motorcycle->mot_status }}">
                                    </div>
                                    <div class="mb-3">
                                        <input class="form-control" type="text" placeholder="MOT Expiry Date" name="mot_expiry_date" id="mot_expiry_date" value="{{$motorcycle->mot_expiry_date}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="basic-url" class="form-label">CO2 Emissions</label>
                                        <input class="form-control" type="text" placeholder="C02 Emissions" name="co2_emissions" id="co2_emissions" value="{{ $motorcycle->co2_emissions }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="basic-url" class="form-label">Marked for Export</label>
                                        <input class="form-control" type="text" placeholder="Marked for Export" name="marked_for_export" id="marked_for_export" value="{{ $motorcycle->marked_for_export }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="basic-url" class="form-label">Last V5 Issue Date/label>
                                            <input class="form-control" type="text" placeholder="Last V5C Issue Date" name="last_v5_issue_date" id="last_v5_issue_date" value="{{ $motorcycle->last_v5_issue_date }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="basic-url" class="form-label">Wheel Plan</label>
                                        <input class="form-control" type="text" placeholder="Wheel Plan" name="wheel_plan" id="wheel_plan" value="{{$motorcycle->wheel_plan}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="basic-url" class="form-label">Month of First Registiration</label>
                                        <input class="form-control" type="text" placeholder="Month of First Registration" name="month_of_first_registration" id="month_of_first_registration" value="{{$motorcycle->month_of_first_registration}}">
                                    </div>
                            </div>
                            <div class="col">
                                <h4 class="text-capitalize">Status: {{ $motorcycle->availability }}</h4>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="availability" id="availability" value="for rent" {{ ($motorcycle->availability=="1")? "checked" : "" }}>
                                        <label class="form-check-label" for="is_for_rent">
                                            For Rent
                                        </label>
                                    </div>
                                    <div hidden class="form-check">
                                        <input class="form-check-input" type="radio" name="availability" id="availability" value="rented" {{ ($motorcycle->availability=="1")? "checked" : "" }}>
                                        <label class="form-check-label" for="is_rented">
                                            Rented
                                        </label>
                                    </div>
                                    <div hidden class="form-check">
                                        <input class="form-check-input" type="radio" name="availability" id="availability" value="for sale" {{ ($motorcycle->availability=="1")? "checked" : "" }}>
                                        <label class="form-check-label" for="is_for_sale">
                                            For Sale
                                        </label>
                                    </div>
                                    <div hidden class="form-check mb-3">
                                        <input class="form-check-input" type="radio" name="availability" id="availability" value="sold" {{ ($motorcycle->availability=="1")? "checked" : "" }}>
                                        <label class="form-check-label" for="is_sold">
                                            Sold
                                        </label>
                                    </div>
                                </div>
                                <h4 class="mt-3">Financials</h4>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Rental Price £</span>
                                    <input type="text" class="form-control" placeholder="00.00" aria-label="Price" name="rental_price" id="rental_price" value="{{ $motorcycle->rental_price }}">
                                </div>

                                <button type="submit" class="btn btn-outline-success">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @endauth

            @guest
            <h1>Homepage</h1>
            <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
            @endguest
        </div>
        @endsection
