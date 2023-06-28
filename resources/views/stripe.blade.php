<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-UK" lang="en-UK"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"><!--<![endif]-->

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-1RE49QH35E"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-1RE49QH35E');
    </script>

    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>NGM</title>

    <meta name="author" content="Emmanuel Nwokedi">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/colors/color1.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Favicon and touch icons  -->
    <link href="{{url('/img/logo-4.png')}}" rel="shortcut icon">

    <!--[if lt IE 9]>
        <script src="javascript/html5shiv.js"></script>
        <script src="javascript/respond.min.js"></script>
    <![endif]-->
</head>

<!-- /#site-header-wrap -->

<body>

    <!-- Preloader -->
    <div id="loading-overlay">
        <div class="loader"></div>
    </div>

    <!-- Boxed -->
    <div class="boxed">
        <div id="site-header-wrap">

            <!-- Header -->
            <header id="header" class="header clearfix">

                <!-- Start Top Nav -->
                <nav class="navbar navbar-expand navbar-dark bg-dark d-none d-lg-block" style="background-color: #101111;">
                    <div class="container">
                        <div class="w-100 d-flex justify-content-between">
                            <div>
                                <i class="fa fa-envelope mx-2" style="color:white;"></i>
                                <a style="color: white;" class="navbar-sm-brand text-light text-decoration-none" href="mailto:customerservice@neguinhomotors.co.uk" target="_newtab" onmouseover="this.style.color='#f63440'" onMouseOut="this.style.color='#fff'">Customer Service</a>
                                <i class="fa fa-phone mx-2" style="color:white;"></i>
                                <a style="color: white;" class="navbar-sm-brand text-light text-decoration-none" href="tel:02083141498" onmouseover="this.style.color='#f63440'" onMouseOut="this.style.color='#fff'">Catford: 0208 314 1498</a>
                                <i class="fa fa-phone mx-2" style="color:white;"></i>
                                <a style="color: white;" class="navbar-sm-brand text-light text-decoration-none" href="tel:02034095478" onmouseover="this.style.color='#f63440'" onMouseOut="this.style.color='#fff'">Tooting: 0203 409 5478</a>
                                <i class="fa fa-bell mx-2" style="color:white;"></i>
                                <a style="color: white;" class="navbar-sm-brand text-light text-decoration-none" href="/contact/call-back" onmouseover="this.style.color='#f63440'" onMouseOut="this.style.color='#fff'">Request Callback</a>
                            </div>

                            @auth
                            <div>
                                <i class="fa fa-user mx-2" style="color:white;"></i>
                                <a style="color: white;" class="text-light" style="padding-right: 5px;" href="/dashboard" onmouseover="this.style.color='#f63440'" onMouseOut="this.style.color='#fff'">Welcome {{ auth()->user()->first_name }}</a>
                            </div>
                            <div>
                                <a style="color: white;" class="text-light" style="padding-right: 5px;" href="{{ route('logout.perform') }}" onmouseover="this.style.color='#f63440'" onMouseOut="this.style.color='#fff'">Logout</a>
                            </div>
                            @endauth

                            @guest
                            <div>
                                <a style="color: white;" class="text-light" style="padding-right: 5px;" href="{{ route('login.perform') }}" onmouseover="this.style.color='#f63440'" onMouseOut="this.style.color='#fff'">Login </a> /
                                <a style="color: white;" class="text-light" style="padding-right: 5px;" href="{{ route('register.perform') }}" onmouseover="this.style.color='#f63440'" onMouseOut="this.style.color='#fff'">Register</a>
                            </div>
                            @endguest
                        </div>
                    </div>
                </nav>
                <!-- Close Top Nav -->

                <div class="container-fluid container-width-93 clearfix" id="site-header-inner">
                    <div id="logo" class="logo float-left image-responsive col-sm-3 col-md-4">
                        <a href="/" title="logo" class="logo">
                            <img src="{{url('img/neguinhomotors3.png')}}" alt="Neguinho Motors" width="70%" height="24" data-retina="{{url('img/neguinhomotors3.png')}}" data-width="70%" data-height="24">
                        </a>
                    </div><!-- /.logo -->
                    <div class="mobile-button"><span></span></div>
                    <ul class="menu-extra">
                        <li class="box-search">
                            <a class="icon_search header-search-icon" href="#"></a>
                            <form role="search" method="get" class="header-search-form" action="#">
                                <input type="text" value="" name="search" class="header-search-field" placeholder="Search...">
                                <button type="submit" class="header-search-submit" title="Search">Search</button>
                            </form>
                        </li>
                        <li class="box-cart nav-top-cart-wrapper">
                            <a class="icon_cart nav-cart-trigger " href="/cart"><span> {{ Cart::instance('default')->count() }}</span></a>
                        </li>
                    </ul>
                    <div class="nav-wrap">
                        <nav id="mainnav" class="mainnav">
                            <ul class="menu">
                                <li>
                                    <a href="/motorcycle-sales">SALES</a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="/new-motorcycles">NEW MOTORCYCLES</a>
                                        </li>
                                        <li>
                                            <a href="/used-motorcycles">USED MOTORCYCLES</a>
                                        </li>
                                        <li>
                                            <a href="/coming-soon">FINANCE</a>
                                        </li>
                                        <li>
                                            <a href="/coming-soon">MOTORCYCLE INSURANCE</a>
                                        </li>
                                        <li>
                                            <a href="/accident-management-services">ACCIDENT MANAGEMENT</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="/motorcycle-rentals">RENTALS</a>
                                </li>
                                <li>
                                    <a href="/services">SERVICES</a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="/accident-management-services">ACCIDENT MANAGEMENT</a>
                                        </li>
                                    </ul>
                                </li>
                                <!-- <li>
                    <a href="/category/1">SHOP</a>
                    <ul class="submenu">
                        <li>
                            <a href="/category/1">HELMETS</a>
                        </li>
                        <li>
                            <a href="/category/14">HELMET ACCESSORIES</a>
                        </li>
                        <li>
                            <a href="/category/2">ESSENTIALS</a>
                        </li>
                        <li>
                            <a href="/category/11">CLOTHING</a>
                            <ul class="submenu">
                                <li>
                                    <a href="/category/10">HEADWEAR</a>
                                </li>
                                <li>
                                    <a href="/category/3">HEATED CLOTHING</a>
                                </li>
                                <li>
                                    <a href="/category/26">OXFORD CLOTHING</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="/category/6">LOCKS</a>
                        </li>
                        <li>
                            <a href="/category/7">PAINT PROTECTION</a>
                        </li>
                        <li>
                            <a href="/category/8">HANDLEBAR ACCESSORIES</a>
                        </li>
                        <li>
                            <a href="/category/9">REFLECTIVES</a>
                        </li>
                        <li>
                            <a href="/category/12">LIGHTING</a>
                        </li>
                        <li>
                            <a href="/category/13">LUGGAGE</a>
                        </li>
                        <li>
                            <a href="/category/15">BATTERY CARE</a>
                        </li>
                        <li>
                            <a href="/category/16">CYCLE ACCESSORIES</a>
                        </li>
                        <li>
                            <a href="/category/25">INTERCOMS</a>
                        </li>
                        <li>
                            <a href="/category/35">MINT</a>
                        </li>
                    </ul>
                </li> -->
                                <li>
                                    <a href="/about">ABOUT</a>
                                </li>
                                <li>
                                    <a href="/contact">CONTACT</a>
                                </li>
                            </ul>
                        </nav><!-- /.mainnav -->
                    </div><!-- /.nav-wrap -->
                </div><!-- /.container-fluid -->
            </header><!-- /header -->

        </div>

        <!-- End /#site-header-wrap -->

        <!-- Page Content -->


        <div class="row">
            <div class="col-md-7 col-md-offset-3">
                <div class="panel panel-default credit-card-box">
                    <div class="panel-heading display-table">
                        <h3 class="panel-title text-center"><strong>Payment Details</strong></h3>
                    </div>
                    <div class="panel-body">

                        @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                        @endif

                        <form role="form" action="{{ route('stripe.post') }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                            @csrf

                            <div class='form-row row'>
                                <div class='col-xs-12 form-group required'>
                                    <label class='control-label'>Name on Card</label>
                                    <input class='form-control' size='4' type='text'>
                                </div>
                            </div>

                            <div class='form-row row'>
                                <div class='col-xs-12 form-group card required'>
                                    <label class='control-label'>Card Number</label>
                                    <input autocomplete='off' class='form-control card-number' size='20' type='text'>
                                </div>
                            </div>

                            <div class='form-row row'>
                                <div class='col-xs-12 col-md-4 form-group cvc required'>
                                    <label class='control-label'>CVC</label>
                                    <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                                </div>
                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                    <label class='control-label'>Expiration Month</label> <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                                </div>
                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                    <label class='control-label'>Expiration Year</label>
                                    <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                                </div>
                            </div>

                            <div class='form-row row'>
                                <div class='col-md-12 error form-group hide'>
                                    <div class='alert-danger alert'>Please correct the errors and try again.</div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12">
                                    <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now (£100)</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>



    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

    <script type="text/javascript">
        $(function() {

            /*------------------------------------------
            --------------------------------------------
            Stripe Payment Code
            --------------------------------------------
            --------------------------------------------*/

            var $form = $(".require-validation");

            $('form.require-validation').bind('submit', function(e) {
                var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'
                    ].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid = true;
                $errorMessage.addClass('hide');

                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('hide');
                        e.preventDefault();
                    }
                });

                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }

            });

            /*------------------------------------------
            --------------------------------------------
            Stripe Response Handler
            --------------------------------------------
            --------------------------------------------*/
            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    /* token contains id, last4, and card type */
                    var token = response['id'];

                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }

        });
    </script>

    <!-- End Page Content -->

    <!-- Newsletter -->



    <!-- End Newsletter -->

    <!-- Footer -->

    @include('frontend.body.footer')

    <!-- End Footer -->

    <!-- Go Top -->
    <a class="go-top">
        <i class="fa fa-chevron-up"></i>
    </a>

    </div>
    <!-- Javascript -->
    @include('frontend.body.footer-scripts')
</body>

</html>
