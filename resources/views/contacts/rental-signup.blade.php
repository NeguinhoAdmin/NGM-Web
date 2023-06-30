@extends('frontend.main_master')

@section('content')

<!-- Page title -->
<div class="page-title parallax parallax1 mb-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-heading">
                    <h1 class="title">Rental Agreement</h1>
                </div><!-- /.page-title-heading -->
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="/">Honda & Yamaha Specialists</a></li>
                        <li><a href="/rental-signup">Rental Agreement</a></li>
                    </ul>
                </div><!-- /.breadcrumbs -->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.page-title -->

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

<div class="container-fluid">
    <form method="POST" action="{{ url('/rentalsignup') }}">
        {{ csrf_field() }}
        <div class="row align-items-start mb-3">
            <div class="col-xs-12 col-sm-6 mb-3">
                <h2 class="mb-3">Renter Information</h2>

                <div class="mb-3">
                    <input type="text" class="form-control" name="first_name" id="inputFirst_name" placeholder="First name" aria-label="First name">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last name" aria-label="Last name">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" aria-label="Phone">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="email" id="email" placeholder="Email" aria-label="Email">
                </div>
                <div class="mb-3">
                    <input hidden type="password" class="form-control" name="password" id="inputPassword" placeholder="Rental3789">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="address1" id="address1" placeholder="Address 1" aria-label="Address Line 1">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="address2" id="address2" placeholder="" aria-label="Address Line 2">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="city" id="city" placeholder="" aria-label="City">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="post_code" id="post_code" placeholder="Post Code" aria-label="Post Code">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="licence" id="licence" placeholder="Licence Number" aria-label="Licence Number">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="nationality" id="nationality" placeholder="Nationality" aria-label="Nationality">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Driving Licence Front</label>
                    <input class="form-control" type="file" name="dlFront" id="dlFront">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Driving Licence Back</label>
                    <input class="form-control" type="file" name="dlBack" id="dlBack">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">CBT</label>
                    <input class="form-control" type="file" name="cbt" id="cbt">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Proof of ID (UK Driving Licence or Passport)</label>
                    <input class="form-control" type="file" name="proofId" id="proofId">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Proof of Address</label>
                    <input class="form-control" type="file" name="proofAddress" id="proofAddress">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Insurance Certificate</label>
                    <input class="form-control" type="file" name="insurance" id="insurance">
                </div>

            </div>

            <div class="col mb-3">
                <h2 class="mb-3">Vehicle Information</h2>

                <ul class="list-group list-group-flush mb-3">
                    <li class="form-control list-group-item" type="text" name="registration" id="registration" value="{{ $motorcycle->registration }}">{{ $motorcycle->registration }}</li>
                    <li class="form-control list-group-item" type="text" name="make" id="make" value="{{ $motorcycle->make }}">{{ $motorcycle->make }}</li>
                    <li class="list-group-item" name="model" id="model" value="{{ $motorcycle->model }}">{{ $motorcycle->model }}</li>
                    <li class="list-group-item" name="engine" id="engine" value="{{ $motorcycle->engine }}">{{ $motorcycle->engine }}CC</li>
                    <li class="list-group-item" name="colour" id="colour" value="{{ $motorcycle->colour }}">{{ $motorcycle->colour }}</li>
                    <li class="list-group-item" name="year" id="year" value="{{ $motorcycle->year }}">{{ $motorcycle->year }}</li>
                    <li class="list-group-item text-uppercase" name="category" id="category" value="{{ $motorcycle->category }}">{{ $motorcycle->category }}</li>
                </ul>

                <input hidden class="form-control list-group-item" type="text" name="motorcycle_id" id="motorcycle_id" value="{{ $motorcycle->id }}">
                <input hidden class="form-control list-group-item" type="text" name="registration" id="registration" value="{{ $motorcycle->registration }}">
                <input hidden class="form-control list-group-item" type="text" name="make" id="make" value="{{ $motorcycle->make }}">
                <input hidden class="form-control list-group-item" type="text" name="model" id="model" value="{{ $motorcycle->model }}">
                <input hidden class="form-control list-group-item" type="text" name="make" id="make" value="{{ $motorcycle->make }}">
                <input hidden class="form-control list-group-item" type="text" name="engine" id="engine" value="{{ $motorcycle->engine }}">
                <input hidden class="form-control list-group-item" type="text" name="year" id="year" value="{{ $motorcycle->year }}">
                <input hidden class="form-control list-group-item" type="text" name="deposit" id="deposit" value="{{ $deposit }}">
                <input hidden class="form-control list-group-item" type="text" name="price" id="price" value="{{ $motorcycle->rental_price }}">

                <img src="{{url('/storage/uploads/' . $motorcycle->file_name)}}" alt="Image" style="width: 100%;">

                <h2 class="mb-3">Charge Information</h2>
                <table class="table mb-3">
                    <tbody>
                        <tr>
                            <th scope="row">Deposit - Payment taken on collection</th>
                            <td name="deposit" name="deposit" id="deposit" value="{{ $deposit }}">£{{ $deposit }}.00</td>
                        </tr>
                        <tr>
                            <th scope="row">Weekly Rental - Payment taken on collection</th>
                            <td name="rental_price" id="rental_price" value="{{ $motorcycle->rental_price }}">£{{ $motorcycle->rental_price }}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="product-quantity margin-top-35">
                    <div class="add-to-cart">
                        <button action="submit">Rent this {{ $motorcycle->make    }} {{ $motorcycle->model }}</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@stop