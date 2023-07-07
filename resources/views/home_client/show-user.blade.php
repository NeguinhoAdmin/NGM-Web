@extends('home_client.layouts.app-master')

@section('content')
<div class="container">
    @auth
    <h1 style="font-size: larger;">{{$user->first_name}} {{$user->last_name}}</h1>
    <p>
        Phone: {{$user->phone_number}}<br>
        Email: {{$user->email}}<br><br>
        Address:<br>
        {{$user->street_address}}
        {{$user->street_address_plus}}<br>{{$user->city}} {{$user->post_code}}
    </p>

    <hr>

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

    <div class="btn-group" role="group" aria-label="Basic example">
        <a class="btn btn-outline-success" href="{{ URL()->previous() }}">Back</a>
    </div>
    <div class="btn-group" role="group" aria-label="Basic example">
        <!-- <a class="btn btn-outline-success" href="{{ URL::to('users/' . $user->id . '/edit') }}">Edit Client</a> -->
    </div>
    <br>

    <h2 class="mt-3">Documents</h2>

    <div class="row align-items-start">
        <div class="col">
            <p>
                <strong>Nationality: </strong>{{ $user->nationality }}<br>
                <!-- <strong>Driving Licence: </strong>{{ $user->driving_licence }}<br> -->
            </p>
        </div>
        <div class="col">
            <!-- <a class="btn btn-outline-dark" href="{{ URL::to('/upload-files/' . $user->id) }}">Add Documents</a> -->
        </div>
    </div>

    <div class="btn-group" role="group" aria-label="Basic example">
        <a class="btn btn-outline-success" href="{{ URL::to('/file-dl-front/' . $user->id) }}">Licence Front</a>
    </div>
    <div class="btn-group" role="group" aria-label="Basic example">
        <a class="btn btn-outline-success" href="{{ URL::to('/file-dl-back/' . $user->id) }}">Licence Back</a>
    </div>
    <div class="btn-group" role="group" aria-label="Basic example">
        <a class="btn btn-outline-success" href="{{ URL::to('/file-pocbt/' . $user->id) }}">CBT</a>
    </div>
    <div class="btn-group" role="group" aria-label="Basic example">
        <a class="btn btn-outline-success" href="{{ URL::to('/file-poid/' . $user->id) }}">ID</a>
    </div>
    <div class="btn-group" role="group" aria-label="Basic example">
        <a class="btn btn-outline-success" href="{{ URL::to('/file-poadd/' . $user->id) }}">Proof of Address</a>
    </div>
    <div class="btn-group" role="group" aria-label="Basic example">
        <a class="btn btn-outline-success" href="{{ URL::to('/file-poins/' . $user->id) }}">Insurance</a>
    </div>

    <div class="row align-items-start mt-3">
        <div class="panel-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Document Type</th>
                        <th scope="col">Registration</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($documents as $document)
                    <tr>
                        <td>{{ $document->name }}</td>
                        <td>{{ $document->document_type }}</td>
                        <td>{{ $document->registration }}</td>
                        <td><a href="{{ url('/storage/uploads', $document->name) }}" target="_blank">View</a></td>
                        <td>
                            <div class="btn-group" role="group">
                                <a class="btn btn-outline-danger" href="/remove-upload/{{$document->id}}">Delete</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

    <div class="row mt-3">
        <h2>Motorcycles</h2>
        <!-- <div class="btn-group" role="group" aria-label="Basic example">
            <a class="btn btn-outline-success" href="{{ URL::to('/motorcycles-for-rent/' . $user->id) }}">Add Motorcycle</a>
        </div> -->
        <br>

        <!-- List of vehicles rented should go here with link to each vehicles details -->
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th scope="col">Registration</th>
                    <th scope="col">Make</th>
                    <th scope="col">Model</th>
                    <th scope="col">CC</th>
                    <th scope="col">Year</th>
                    <th scope="col">Colour</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($motorcycles as $motorcycle)
                <tr>
                    <td>{{$motorcycle->registration}}</td>
                    <td>{{$motorcycle->make}}</td>
                    <td>{{$motorcycle->model}}</td>
                    <td>{{$motorcycle->engine}}</td>
                    <td>{{$motorcycle->year}}</td>
                    <td>{{$motorcycle->colour}}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-outline-success" href="{{ URL::to('motorcycles/' . $motorcycle->id) }}">Details</a>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-outline-success" href="{{ URL::to('remove-rental/' . $motorcycle->id) }}">Remove</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endauth

@guest
<h1>Homepage</h1>
<p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
@endguest

@endsection