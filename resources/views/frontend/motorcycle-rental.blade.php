<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-UK" lang="en-UK"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"><!--<![endif]-->

@include('frontend.body.head')

<body class="header_sticky header-style-2 has-menu-extra">
    <!-- Preloader -->
    <div id="loading-overlay">
        <div class="loader"></div>
    </div>

    <!-- Boxed -->
    <div class="boxed">
        <div id="site-header-wrap">

            @include('frontend.body.header')

        </div>

        <!-- Page title -->
        <div class="page-title parallax parallax1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title-heading">
                            <h1 class="title">{{$motorcycle->make}} {{ $motorcycle->model }}</h1>
                        </div><!-- /.page-title-heading -->
                        <div class="breadcrumbs">
                            <ul>
                                <li><a href="/">Honda & Yamaha Specialists</a></li>
                                <li><a href="/motorcycle-sales">Motorcycle Rental</a></li>
                                <li><a href="/new-motorcycle/{{ $motorcycle->slug }}">{{$motorcycle->make}} {{ $motorcycle->model }}</a></li>
                            </ul>
                        </div><!-- /.breadcrumbs -->
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.page-title -->

        <section class="flat-row main-shop shop-detail style-1">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="flat-image-box clearfix">
                            <div class="inner padding-top-4">
                                <ul class="product-list-fix-image">
                                    <li>
                                        <img src="{{url('/storage/uploads/' . $motorcycle->file_name)}}" alt="Image">
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- /.col-md-6 -->

                    <div class="col-md-6">
                        <div class="divider h0"></div>
                        <div class="product-detail">
                            <div class="inner">
                                <div class="content-detail form-group">
                                    <h2 class="product-title" value="{{$motorcycle->description}}" name="name">{{$motorcycle->make}} {{ $motorcycle->model }}</h2>
                                    <div class="flat-star style-1">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                        <i class="fa fa-star-half-o"></i>
                                        <span>(1)</span>
                                    </div>
                                    <p>{!! $motorcycle->description !!}</p>
                                    <div class="price margin-top-24">
                                        <ins><span class="amount" value="{{$motorcycle->price}}" name="price" id="price">£{{$motorcycle->rental_price}} per Week</span></ins>
                                    </div>
                                    <div hidden class="price margin-top-24">
                                        <ins><span class="amount" value="20" name="reserve_price" id="reserve_price">Reserve for £20.00</span></ins>
                                    </div>
                                    <div class="product-categories margin-top-22">
                                        <span>£20 RESERVES THIS MOTORCYCLE FOR 24 HOURS</span><a href="#"> </a>
                                    </div>
                                    <div class="product-quantity margin-top-35">
                                        <div class="add-to-cart text-center">
                                            <a href="/stripe/{{ $motorcycle->id }}">RESERVE FOR £20</a>
                                        </div>
                                    </div>
                                    <div class="product-categories margin-top-22 text-capitalize">
                                        <span>Category: </span><a href="#">{{ $motorcycle->category }}</a>
                                    </div>
                                    <div class="product-tags">
                                        <span>Tags: </span><a href="#"></a> <a href="#"></a> <a href="#"></a> <a href="#"></a>
                                    </div>
                                    <ul class="flat-socials margin-top-46">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>

                            </div>
                        </div><!-- /.product-detail -->
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.flat-row -->

        <section class="flat-row shop-detail-content style-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="flat-tabs style-1 has-border">
                            <div class="inner">
                                <ul class="menu-tab">
                                    <li class="active">Requirements</li>
                                    <li>Specifications</li>
                                    <li>Reviews</li>
                                </ul>
                                <div class="content-tab">
                                    <div class="content-inner">
                                        <div class="flat-grid-box col2 border-width border-width-1 has-padding clearfix">
                                            <div class="grid-row image-left clearfix">
                                                <div class="grid-item">
                                                    <div class="thumb text-center">
                                                        <img src="{{url('/storage/uploads/' . $motorcycle->file_name)}}" alt="Image" style="width: 50%;">
                                                    </div>
                                                </div><!-- /.grid-item -->
                                                <div class="grid-item">
                                                    <div class="text-wrap">
                                                        <h6 class="title">Requirements for Rental</h6>
                                                        <ul class="list-unstyled mb-3">
                                                            <li>- Driving licence</li>
                                                            <li>- Proof of address</li>
                                                            <li>- Proof of identification</li>
                                                            <li>- Insurance certification</li>
                                                            <li>- CBT certification</li>
                                                            <li>- £300 deposit</li>
                                                            <li>- 1 week rent</li>
                                                        </ul>
                                                        <p class="mb-3">
                                                            You need to bring a lock and chain before collecting the motorcycle. If you don't have one you can always purchase from our shop along with lot's of other motorcycle accessories.
                                                        </p>
                                                        <p class="mb-3">
                                                            Insurance fire and theft is the minimum cover we accept. The motorcycle must be locked at all times.
                                                        </p>
                                                        <p class="mb-3">
                                                            Any damage must be paid by you or a claim must be made under your insurance.
                                                        </p>
                                                        <p class="mb-3">
                                                            You must give one week notice before returning the motorcycle or deposit will be lost.
                                                        </p>
                                                        <p class="mb-3">
                                                            Deposit will be refunded provided there is no damage to the motorcycle and no accessorioes are missing.
                                                        </p>
                                                        <p>
                                                            We have a 6 weeks minimum rental period.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div><!-- /.grid-row -->
                                        </div><!-- /.flat-grid-box -->
                                    </div><!-- /.content-inner -->
                                    <div class="content-inner">
                                        <div class="inner max-width-40">
                                            <table>
                                                <tr>
                                                    <td>Body Type:</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Engine CC:</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Engine Power:</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Gearbox:</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Fuel Type:</td>
                                                    <td></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div><!-- /.content-inner -->
                                    <div class="content-inner">
                                        <div class="inner max-width-83 padding-top-33">
                                            <ol class="review-list">
                                                <li class="review">

                                                </li><!--  /.review    -->
                                            </ol><!-- /.review-list -->
                                            <div class="comment-respond review-respond" id="respond">
                                                <div class="comment-reply-title margin-bottom-14">
                                                    <h5>Write a review</h5>
                                                    <p>Your email address will not be published. Required fields are marked *</p>
                                                </div>
                                                <form novalidate="" class="comment-form review-form" id="commentform" method="post" action="#">
                                                    <p class="flat-star style-2">
                                                        <label>Rating*:</label>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </p>
                                                    <p class="comment-form-comment">
                                                        <label>Review*</label>
                                                        <textarea class="" tabindex="4" name="comment" required> </textarea>
                                                    </p>
                                                    <p class="comment-name">
                                                        <label>Name*</label>
                                                        <input type="text" aria-required="true" size="30" value="" name="name" id="name">
                                                    </p>
                                                    <p class="comment-email">
                                                        <label>Email*</label>
                                                        <input type="email" size="30" value="" name="email" id="email">
                                                    </p>
                                                    <p class="comment-form-notify clearfix">
                                                        <input type="checkbox" name="check-notify" id="check-notify"> <label for="check-notify">Notify me of new posts by email</label>
                                                    </p>
                                                    <p class="form-submit">
                                                        <button class="comment-submit">Submit</button>
                                                    </p>
                                                </form>
                                            </div><!-- /.comment-respond -->
                                        </div>
                                    </div><!-- /.content-inner -->
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /.shop-detail-content -->

        @include('frontend.body.footer')

        <!-- Go Top -->
        <a class="go-top">
            <i class="fa fa-chevron-up"></i>
        </a>

    </div>
    <!-- Javascript -->
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/tether.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/jquery.easing.js"></script>
    <script src="/assets/js/parallax.js"></script>
    <script src="/assets/js/jquery-waypoints.js"></script>
    <script src="/assets/js/jquery-countTo.js"></script>
    <script src="/assets/js/jquery.countdown.js"></script>
    <script src="/assets/js/jquery.flexslider-min.js"></script>
    <script src="/assets/js/images-loaded.js"></script>
    <script src="/assets/js/jquery.isotope.min.js"></script>
    <script src="/assets/js/magnific.popup.min.js"></script>
    <script src="/assets/js/jquery.hoverdir.js"></script>
    <script src="/assets/js/owl.carousel.min.js"></script>
    <script src="/assets/js/equalize.min.js"></script>
    <script src="/assets/js/gmap3.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIEU6OT3xqCksCetQeNLIPps6-AYrhq-s&region=GB"></script>
    <script src="/assets/js/jquery-ui.js"></script>

    <script src="/assets/js/jquery.cookie.js"></script>
    <script src="/assets/js/main.js"></script>

    <!-- Revolution Slider -->
    <script src="/assets/rev-slider/js/jquery.themepunch.tools.min.js"></script>
    <script src="/assets/rev-slider/js/jquery.themepunch.revolution.min.js"></script>
    <script src="/assets/js/rev-slider.js"></script>

    <!-- Load Extensions only on Local File Systems ! The following part can be removed on Server for On Demand Loading -->
    <script src="/assets/rev-slider/js/extensions/revolution.extension.actions.min.js"></script>
    <script src="/assets/rev-slider/js/extensions/revolution.extension.carousel.min.js"></script>
    <script src="/assets/rev-slider/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script src="/assets/rev-slider/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script src="/assets/rev-slider/js/extensions/revolution.extension.migration.min.js"></script>
    <script src="/assets/rev-slider/js/extensions/revolution.extension.navigation.min.js"></script>
    <script src="/assets/rev-slider/js/extensions/revolution.extension.parallax.min.js"></script>
    <script src="/assets/rev-slider/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script src="/assets/rev-slider/js/extensions/revolution.extension.video.min.js"></script>
</body>

</html>