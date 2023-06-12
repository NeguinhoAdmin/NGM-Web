@extends('frontend.main_master')

@section('content')

<!-- Page title -->
<div class="page-title parallax parallax1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-heading">
                    <h1 class="title">Motorcycles Rentals</h1>
                </div><!-- /.page-title-heading -->
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="/">Honda & Yamaha Specialists</a></li>
                        <li><a href="/rentals-motorcycle">Motorcycles for Rent</a></li>
                    </ul>
                </div><!-- /.breadcrumbs -->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.page-title -->

<!-- PRODUCT -->
<section class="flat-row main-shop style1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-top-menu margin-bottom-58">
                    <ul class="flat-filter style-2">
                        <li class="active"><a href="#" data-filter="*">ALL MODELS</a></li>
                        <li><a href="#" data-filter=".hbikes">HONDA MOTORCYCLES</a></li>
                        <li><a href="#" data-filter=".hscooters">HONDA SCOOTERS</a></li>
                        <li><a href="#" data-filter=".ybikes">YAMAHA MOTORCYCLES</a></li>
                        <li><a href="#" data-filter=".yscooters">YAMAHA SCOOTERS</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="product-content product-fourcolumn clearfix">

                    <ul class="product style2 isotope-product clearfix">
                        @foreach($motorcycles->chunk(4) as $chunk)
                        <li class="product-item hscooters">
                            @foreach($chunk as $motorcycle)
                            <div class="product-thumb clearfix">
                                <a href="/rentals-motorcycle/{{ $motorcycle->id }}">
                                    <img src="{{url('assets/images/rentals/honda-pcx-125.jpg')}}" alt="image">
                                </a>
                            </div>
                            <div class="product-info clearfix">
                                <span class="product-title">{{ $brand[0]->name }} {{$motorcycle->name}}</span>
                                <div class="price">
                                    <ins>
                                        <span class="amount">£{{ $motorcycle->price_amount }} per day</span>
                                    </ins>
                                </div>
                            </div>
                            <!-- <span class="regular">Urban Mobility</span> -->
                            <div class="add-to-cart text-center">
                                <a href="/rentals-motorcycle/{{ $motorcycle->id }}">MORE INFORMATION</a>
                            </div>
                            <a href="#" class="like"><i class="fa fa-heart-o"></i></a>
                            @endforeach
                        </li>
                        @endforeach
                    </ul>

                    <!-- <div class="elm-btn text-center">
                        <a href="#" class="themesflat-button outline ol-accent margin-top-40">LOAD MORE</a>
                        </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END PRODUCT -->

@stop