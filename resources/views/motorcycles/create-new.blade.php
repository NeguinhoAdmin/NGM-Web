@extends('layouts.app-master')

@section('content')
<div class="container">
    @auth
    <h1>Create Motorcycle</h1>
    <div class="container-fluid">
        <div class="btn-group" role="group" aria-label="Basic example">
            <a class="btn btn-outline-primary" href="{{ url()->previous() }}">Back</a>
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

    <div class="container mb-3">
        <div class="row align-items-start">
            <div class="col">
                <div class="well">

                    {!! Form::open(['url' => '/brand-new-motorcycle', 'class' => 'form-horizontal']) !!}
                    @csrf
                    <fieldset>

                        <legend>New Motorcycle Setup</legend>

                        <!-- Manufacturer -->
                        <div class="form-group mb-3">
                            {!! Form::label('', '', ['class' => 'col-lg-2 control-label'] ) !!}
                            <div class="col-lg-12">
                                {!! Form::select('make', ['' => 'Select Manufacturer', 'honda' => 'Honda', 'yamaha' => 'Yamaha'], 'S', ['class' => 'form-control' ]) !!}
                            </div>
                        </div>

                        <!-- Model -->
                        <div class="mb-3">
                            <input class="form-control" type="text" placeholder="Motorcycle Model" name="model" id="model" value="{{old('model')}}">
                        </div>

                        <!-- Engine Size -->
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Engine" aria-label="engine" aria-describedby="engine" name="engine" id="engine" value="{{old('engine')}}">
                            <span class="input-group-text" id="engine_cc">CC</span>
                        </div>

                        <!-- Description -->
                        <div class="form-group mb-3">
                            {!! Form::label('textarea', 'Description', ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-12">
                                {!! Form::textarea('description', $value = null, ['class' => 'form-control', 'rows' => 3]) !!}
                                <span class="help-block">A brief description of the motorcycle.</span>
                            </div>
                        </div>


                        <!-- Price -->
                        <div class="input-group mb-3">
                            <span class="input-group-text">£</span>
                            <input type="text" class="form-control" placeholder="Motorcycle Price" aria-label="Price" name="price" id="price" value="{{old('price')}}">
                            <span class="input-group-text">.00</span>
                        </div>

                        <!-- Image Upload -->
                        <div class="custom-file mb-3">
                            <input type="file" name="file" class="custom-file-input" id="file">
                            <label class="custom-file-label" for="chooseFile">Select Motorcycle Image</label>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group mb-3">
                            <div class="col-lg-10 col-lg-offset-2">
                                {!! Form::submit('Submit', ['class' => 'btn btn-outline-primary pull-right'] ) !!}
                            </div>
                        </div>

                        {!! Form::close() !!}

                    </fieldset>
                </div>
            </div>
            <div class="col">

            </div>
            <div class="col">

                <form action="/brand-new-motorcycle" method="post" enctype="multipart/form-data">
                    @csrf

                    <legend>New Motorcycle Setup</legend>

                    <div hidden class="mb-3">
                        <input class="form-control" type="text" placeholder="Registration" name="registration" id="registration" value="{{old('registration')}}">
                    </div>
                    <select class="form-select mb-3" aria-label="Select Make" name="make" id="make" value="{{old('make')}}">
                        <option selected>Select Make</option>
                        <!-- <option value="honda">Honda</option>
                        <option value="yamaha">Yamaha</option> -->
                    </select>
                    <div class="mb-3">
                        <input class="form-control" type="text" placeholder="Motorcycle Model" name="model" id="model" value="{{old('model')}}">
                    </div>
                    <div hidden class="mb-3">
                        <input class="form-control" type="text" placeholder="Colour" name="colour" id="colour" value="{{old('colour')}}">
                    </div>
                    <div hidden class="mb-3">
                        <input class="form-control" type="text" placeholder="Fuel Type" id="fuel_type" name="year" value="{{old('petrol')}}">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Engine" aria-label="engine" aria-describedby="engine" name="engine" id="engine" value="{{old('engine')}}">
                        <span class="input-group-text" id="engine_cc">CC</span>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Brief Description</span>
                        <textarea class="form-control" name="description" id="description" aria-label="With textarea"></textarea>
                    </div>
                    <div class="custom-file mb-3">
                        <input type="file" name="file" class="custom-file-input" id="chooseFile">
                        <label class="custom-file-label" for="chooseFile">Select Picture</label>
                    </div>
                    <div class="form-group mb-3">
                        <div hidden class="form-check">
                            <input class="form-check-input" type="radio" name="availability" id="is_for_rent" value="for rent">
                            <label class="form-check-label" for="is_for_rent">
                                For Rent
                            </label>
                        </div>
                        <div hidden class="form-check">
                            <input class="form-check-input" type="radio" name="availability" id="is_rented" value="rented">
                            <label class="form-check-label" for="is_rented">
                                Rented
                            </label>
                        </div>
                        <div hidden class="form-check">
                            <input class="form-check-input" type="radio" name="availability" id="is_for_sale" value="for sale">
                            <label class="form-check-label" for="is_for_sale">
                                For Sale
                            </label>
                        </div>
                        <div hidden class="form-check">
                            <input class="form-check-input" type="radio" name="availability" id="used_for_sale" value="used for sale">
                            <label class="form-check-label" for="is_for_sale">
                                Used For Sale
                            </label>
                        </div>
                        <!-- <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="availability" id="is_sold" value="sold">
                                    <label class="form-check-label" for="is_sold">
                                        Sold
                                    </label>
                                </div> -->
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">£</span>
                        <input type="text" class="form-control" aria-label="Rental Price (to the nearest pound)" name="price" id="rental_price">
                        <span class="input-group-text">.00</span>
                    </div>

                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                </form>

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
