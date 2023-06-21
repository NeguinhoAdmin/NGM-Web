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