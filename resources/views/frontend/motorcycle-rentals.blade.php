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
                        <li><a href="#" data-filter=".honda">HONDA MOTORCYCLES</a></li>
                        <li><a href="#" data-filter=".yamaha">YAMAHA MOTORCYCLES</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="product-content product-fourcolumn clearfix">

                    <ul class="product style2 isotope-product clearfix">
                        @foreach($motorcycles as $motorcycle)
                        <li class="product-item {{ $motorcycle->make }}">

                            <div class="product-thumb clearfix mb-3">
                                <a href="/rentals-motorcycle/{{ $motorcycle->id }}">
                                    <img src="{{url('storage/uploads/' . $motorcycle->file_name)}}" alt="image" style="height: 235px;">
                                </a>
                            </div>
                            <div class="product-info clearfix">
                                <div><span class="product-title">{{ $motorcycle->make }}</span></div>
                                <span class="product-title">{{ $motorcycle->model }}</span>
                                <div class="price">
                                    <ins>
                                        <span class="amount">£{{ $motorcycle->rental_price }} per Week</span>
                                    </ins>
                                </div>
                            </div>
                            <!-- <span class="regular">Urban Mobility</span> -->
                            <div class="add-to-cart text-center">
                                <a href="/rentals-motorcycle/{{ $motorcycle->id }}">MORE INFORMATION</a>
                            </div>
                            <a href="#" class="like"><i class="fa fa-heart-o"></i></a>

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
