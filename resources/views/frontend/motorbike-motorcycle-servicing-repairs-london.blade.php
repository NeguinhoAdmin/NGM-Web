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
                                <!-- <div class="text-wrap"> -->
                                <h3 class="title mb-3">Motorcycle Repairs</h3>
                                <p class="mb-3">
                                    Neguinho Motors specializes in repair, maintenance, MOT and restoration projects for all models of Japanese and European motorcycles, scooters and mopeds.
                                </p>
                                <p class="mb-3">
                                    Established in October 2018, our team of professionally trained mechanics have been helping motorcycle owners in South London for many years. During that time we have built a strong reputation for quality workmanship, reliability and competitive pricing.
                                </p>
                                <p class="mb-3">
                                    With extensive experience and passion for motorcycles, you can rest assured that your pride and joy at Neguinho Motors is in our hands.
                                </p>
                                <div class="elm-btn">
                                    <a href="#" class="themesflat-button outline ol-accent has-padding-41 margin-top-24">BOOK APPOINTMENT</a>
                                </div>
                                <!-- </div> -->
                            </div>
                        </div><!-- /.grid-row -->

                        <div class="grid-row image-right padding-bottom-48 clearfix">
                            <div class="grid-item">
                                <!-- <div class="text-wrap"> -->
                                <h3 class="title mb-3">Book Your Motorcycle Service</h3>
                                <p class="mb-3">
                                    Did you know that regular service and maintenance can help keep your motorcycle's running costs low and resale value high?
                                </p>
                                <p class="mb-3">
                                    It's not just about the money – maintaining your bike also covers important safety areas like brakes, steering, suspension and tires and can help you identify potential problems before they happen.
                                </p>
                                <p class="mb-3">
                                    Regular maintenance of your motorcycle not only prolongs its life and your safety, it also keeps it performing at its best. Have your motorcycle serviced regularly for peace of mind, to ensure full rider confidence and to ensure your motorcycle is running at its best. We have experienced technicians for motorcycle manufacturers. Book Yamaha Motorcycle Service or Honda Motorcycle Service today at Neguinho Motors Motorcycle Service Center.
                                </p>
                                <div class="elm-btn">
                                    <a href="#" class="themesflat-button outline ol-accent has-padding-41 margin-top-24">BOOK YOUR SERVICE</a>
                                </div>
                                <!-- </div> -->
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
                                <!-- <div class="text-wrap"> -->
                                <h3 class="title mb-3">Book Your MOT</h3>
                                <p class="mb-3">
                                    Neguinho Motors currently have a specialist motorcycle MOT workshop in south London. So you're sure to find one near you that offers motorcycle and motorbike MOT and service packages at their outlets.
                                </p>
                                <p class="mb-3">
                                    Our test riders and mechanics are fully qualified and receive regular training, so they are fully familiar with the ever-changing demands of motorcycle technical inspection. This means you can book a bike test knowing you're getting quality service from trusted local experts. Book your technical motorcycle test with us today.
                                </p>
                                <div class="elm-btn">
                                    <a href="#" class="themesflat-button outline ol-accent has-padding-41 margin-top-24">BOOK YOUR MOT</a>
                                </div>
                                <!-- </div> -->
                            </div>
                        </div><!-- /.grid-row -->

                        <div class="grid-row image-right clearfix">
                            <div class="grid-item">
                                <!-- <div class="text-wrap"> -->
                                <h3 class="title mb-3">Accident Management Services</h3>
                                <p class="mb-3">
                                    You may be entitled to a motorcycle accident claim if the actionsof another motorist or pedestrian in the automobile accident resulted in injury. In such cases, you may be entitled to compensation for the suffering you have suffered, as well as for the financial loss you have suffered.
                                </p>
                                <p class="mb-3">
                                    In our guide to motorcycle accident compensation claims, we explain the types of accidents that can lead to an accident, how the compensation process works and the amount of compensation that can be paid for specific injuries.
                                </p>
                                <p class="mb-3">
                                    Try our No Win No Fee service
                                </p>
                                <div class="elm-btn">
                                    <a href="/accident-management-services" class="themesflat-button outline ol-accent has-padding-41 margin-top-24">Make a claim today</a>
                                </div>
                                <!-- </div> -->
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