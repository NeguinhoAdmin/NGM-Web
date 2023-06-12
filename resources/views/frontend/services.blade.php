@extends('frontend.main_master')

@section('content')

<!-- Page title -->
<div class="page-title parallax parallax1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-heading">
                    <h1 class="title">Services</h1>
                </div><!-- /.page-title-heading -->
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="/">Honda & Yamaha Specialists</a></li>
                        <li><a href="/services">Services</a></li>
                    </ul>
                </div><!-- /.breadcrumbs -->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.page-title -->

<section class="flat-row shop-detail-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="flat-tabs style-1 has-border">
                    <div class="flat-grid-box col2 border-width border-width-1 has-padding clearfix">
                        <div class="grid-row image-left clearfix">
                            <div class="grid-item">
                                <div class="thumb text-center">
                                    <img src="{{ url('assets/images/services/repairs.jpg') }}" alt="Image">
                                </div>
                            </div><!-- /.grid-item -->
                            <div class="grid-item">
                                <div class="text-wrap">
                                    <h3 class="title">Motorcycle Repairs</h3>
                                    <p>Fashion has always been so temporary and uncertain. You can’t keep up with it. This social phenomenon is very whimsical, thus we as the consumers always try to stay in touch with all the latest fash- ion tendencies. </p>
                                    <div class="elm-btn">
                                        <a href="#" class="themesflat-button outline ol-accent has-padding-41 margin-top-24">BOOK APPOINTMENT</a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.grid-row -->

                        <div class="grid-row image-right padding-bottom-48 clearfix">
                            <div class="grid-item">
                                <div class="text-wrap">
                                    <h3 class="title">Book a Service</h3>
                                    <p>Fashion has always been so temporary and uncertain. You can’t keep up with it. This social phenomenon is very whimsical, thus we as the consumers always try to stay in touch with all the latest fash- ion tendencies. </p>
                                    <div class="elm-btn">
                                        <a href="#" class="themesflat-button outline ol-accent has-padding-41 margin-top-24">BOOK YOUR SERVICE</a>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-item">
                                <div class="thumb text-center">
                                    <img src="{{url('assets/images/services/book-service.jpg') }}" alt="Image">
                                </div>
                            </div><!-- /.grid-item -->
                        </div><!-- /.grid-row -->

                        <div class="grid-row image-left padding-bottom-48 clearfix">
                            <div class="grid-item">
                                <div class="thumb text-center">
                                    <img src="{{url('assets/images/services/book-mot.png') }}" alt="Image">
                                </div>
                            </div><!-- /.grid-item -->
                            <div class="grid-item">
                                <div class="text-wrap">
                                    <h3 class="title">Book Your MOT</h3>
                                    <p>Fashion has always been so temporary and uncertain. You can’t keep up with it. This social phenomenon is very whimsical, thus we as the consumers always try to stay in touch with all the latest fash- ion tendencies. </p>
                                    <div class="elm-btn">
                                        <a href="#" class="themesflat-button outline ol-accent has-padding-41 margin-top-24">BOOK YOUR MOT</a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.grid-row -->

                        <div class="grid-row image-right clearfix">
                            <div class="grid-item">
                                <div class="text-wrap">
                                    <h3 class="title">Accident Management Services</h3>
                                    <p>Fashion has always been so temporary and uncertain. You can’t keep up with it. This social phenomenon is very whimsical, thus we as the consumers always try to stay in touch with all the latest fash- ion tendencies. </p>
                                    <div class="elm-btn">
                                        <a href="#" class="themesflat-button outline ol-accent has-padding-41 margin-top-24">START THE PROCESS</a>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-item">
                                <div class="thumb text-center">
                                    <img src="{{url('assets/images/services/accident.jpg') }}" alt="Image">
                                </div>
                            </div><!-- /.grid-item -->
                        </div><!-- /.grid-row -->
                    </div><!-- /.flat-grid-box -->
                </div>
            </div>
        </div>
    </div>
</section><!-- /.shop-detail-content -->

@stop