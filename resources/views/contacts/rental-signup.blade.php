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

<div class="container">
    <form>
        @csrf
        <div class="row align-items-start mb-3">
            <div class="col mb-3">
                <h2 class="mb-3">Renter Information</h2>
                <div class="row mb-3">
                    <div class="col">
                        <input type="text" class="form-control" id="first_name" placeholder="First name" aria-label="First name">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="last_name" placeholder="Last name" aria-label="Last name">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <input type="text" class="form-control" id="phone" placeholder="Phone" aria-label="Phone">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="email" placeholder="Email" aria-label="Email">
                    </div>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="address" placeholder="Address" aria-label="Address">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="licence" placeholder="Licence Number" aria-label="Licence Number">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Driving Licence Front</label>
                    <input class="form-control" type="file" id="dlFront">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Driving Licence Back</label>
                    <input class="form-control" type="file" id="dlBack">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">CBT</label>
                    <input class="form-control" type="file" id="cbt">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Proof of ID (UK Driving Licence or Passport)</label>
                    <input class="form-control" type="file" id="proofId">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Proof of Address</label>
                    <input class="form-control" type="file" id="proofAddress">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Insurance Certificate</label>
                    <input class="form-control" type="file" id="insurance">
                </div>

            </div>

            <div class="col mb-3">
                <h2 class="mb-3">Vehicle Information</h2>

                <ul class="list-group list-group-flush mb-3">
                    <li class="list-group-item" id="make" value="{{ $motorcycle->make }}">{{ $motorcycle->make }}</li>
                    <li class="list-group-item" id="model" value="{{ $motorcycle->model }}">{{ $motorcycle->model }}</li>
                    <li class="list-group-item" id="engine" value="{{ $motorcycle->engine }}">{{ $motorcycle->engine }}CC</li>
                    <li class="list-group-item" id="colour" value="{{ $motorcycle->colour }}">{{ $motorcycle->colour }}</li>
                    <li class="list-group-item" id="year" value="{{ $motorcycle->year }}">{{ $motorcycle->year }}</li>
                    <li class="list-group-item text-uppercase" id="category" value="{{ $motorcycle->category }}">{{ $motorcycle->category }}</li>
                </ul>

                <img src="{{url('/storage/uploads/' . $motorcycle->file_name)}}" alt="Image" style="width: 100%;">

                <h2 class="mb-3">Charge Information</h2>
                <table class="table">
                    <thead>
                        <th>Service</th>
                        <th>Cost</th>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Reservation</th>
                            <td>£20.00</td>
                        </tr>
                        <tr>
                            <th scope="row">Deposit - Payment taken on collection</th>
                            <td>£300.00</td>
                        </tr>
                        <tr>
                            <th scope="row">Weekly Rental - Payment taken on collection</th>
                            <td>£{{ $motorcycle->rental_price }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row align-items-start mb-3">
            <div class="col mb-3">

            </div>
            <div class="col mb-3">

            </div>
        </div>

        <div class="col-md-12">
            <label class="" for="">Signature:</label>
            <br />
            <div id="sig"></div>
            <br />
            <button id="clear">Clear Signature</button>
            <textarea id="signature64" name="signed" style="display: none"></textarea>
        </div>
    </form>
</div>

@stop
