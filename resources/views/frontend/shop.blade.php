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
    <link rel="stylesheet" type="text/css" href="/assets/css/jquery-accordion-menu.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/font-awesome.css">

    <!-- Favicon and touch icons  -->
    <link href="{{ url('/img/favicon.ico') }}" rel="shortcut icon">

    <!--[if lt IE 9]>
        <script src="javascript/html5shiv.js"></script>
        <script src="javascript/respond.min.js"></script>
    <![endif]-->

    {{-- @vite('resources/js/app.js') --}}
</head>

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

        <!-- Start Slidebar -->
        <section class="flat-row main-shop shop-slidebar">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="sidebar slidebar-shop">
                            <div class="widget widget-search">
                                <form role="search" method="get" class="search-form" action="#">
                                    <label>
                                        <input type="search" class="search-field" placeholder="Search …" value=""
                                            name="s">
                                    </label>
                                    <input type="submit" class="search-submit" value="Search">
                                </form>
                            </div><!-- /.widget-search -->
                            <div class="widget widget-sort-by">
                                <h5 class="widget-title mb-3">
                                    CATEGORIES
                                </h5>
                                <div id="jquery-accordion-menu" class="jquery-accordion-menu white mb-5">
                                    {{-- <div class="jquery-accordion-menu-header">Categories</div> --}}
                                    <ul>
                                        <li><a href="#">ACCESSORIES</a>
                                            <ul class="submenu">
                                                <li><a href="#">PHONE & DEVICE MOUNTS</a></li>
                                                <li><a href="#"></i>COVERS</a></li>
                                                <li><a href="#">HANDLEBAR ACCESSORIES</a>
                                                    <ul class="submenu">
                                                        <li><a href="#">PHONE</a></li>
                                                        <li><a href="#">CLOCKS</a></li>
                                                        <li><a href="#">BAR ENDS</a></li>
                                                        <li><a href="#">GRIPS</a></li>
                                                        <li><a href="#">HEATED GRIPS</a></li>
                                                        <li><a href="#">MIRRORS</a></li>
                                                        <li><a href="#">MUFFS</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">BATTERY CARE & POWER</a></li>
                                                <li><a href="#">SCOOT STUFF</a></li>
                                                <li><a href="#">WORKSHOP</a></li>
                                                <li><a href="#">HELMET ACCESSORIES</a></li>
                                                <li><a href="#">LIGHTING</a></li>
                                                <li><a href="#">PAINT PROTECTION</a></li>
                                                <li><a href="#">TRAVEL & TRANSPORTATION</a></li>
                                                <li><a href="#">TYRES & WHEEL CARE</a></li>
                                                <li><a href="#">EYE WEAR</a></li>
                                            </ul>
                                        </li>
                                        <li class="{{ Request::routeIs('helmets') ? 'active' : '' }}"><a
                                                href="/helmets">HELMETS</a>
                                            <ul class="submenu">
                                                <li class="active"><a href="/mt-helmets">MT HELMETS</a>
                                                    <ul class="submenu">
                                                        <li><a href="#">FULL FACE</a></li>
                                                        <li><a href="#">OPEN FACE</a></li>
                                                        <li><a href="#">FLIP FRONT</a></li>
                                                        <li><a href="#">ADVENTURE</a></li>
                                                        <li><a href="#">VISORS & PINLOCKS</a></li>
                                                        <li><a href="#">MT ACCESSORIES</a></li>
                                                        <li><a href="#">GOGGLES</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">SIMPSON</a>
                                                    <ul class="submenu">
                                                        <li><a href="#">FULL FACE</a></li>
                                                        <li><a href="#">FLIP FRONT</a></li>
                                                        <li><a href="#">ACCESSORIES</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">ALPINESTARS</a></li>
                                                <li><a href="#">BOX</a>
                                                    <ul class="submenu">
                                                        <li><a href="#">VISORS & PINLOCK</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">HJC</a>
                                                    <ul class="submenu">
                                                        <li><a href="#">ADVENTURE</a></li>
                                                        <li><a href="#">SMART HJC</a></li>
                                                        <li><a href="#">FLIP FRONT</a></li>
                                                        <li><a href="#">FULL FACE</a></li>
                                                        <li><a href="#">MOTO X</a></li>
                                                        <li><a href="#">OPEN FACE</a></li>
                                                        <li><a href="#">VISORS & PINLOCKS</a></li>
                                                        <li><a href="#">SPARES</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="#">SECURITY</a>
                                            <ul class="submenu">
                                                <li><a href="#">LEVER LOCKS</a></li>
                                                <li><a href="#">CHAIN LOCKS & CHAINS</a></li>
                                                <li><a href="#">ANCHORS</a></li>
                                                <li><a href="#">CABLE LOCKS</a></li>
                                                <li><a href="#">DISC LOCKS & PADLOCKS</a></li>
                                                <li><a href="#">U LOCKS</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">LUGGAGE</a>
                                            <ul class="submenu">
                                                <li><a href="#">HELMET & BOOT CARRIERS</a></li>
                                                <li><a href="#">PANNIERS</a></li>
                                                <li><a href="#">LUGGAGE ACCESSORIES</a></li>
                                                <li><a href="#">BACKPACKS</a></li>
                                                <li><a href="#">TAIL PACKS</a></li>
                                                <li><a href="#">TANK BAGS</a></li>
                                                <li><a href="#">WAIST & LEG BAGS</a></li>
                                                <li><a href="#">TOP BOXES</a></li>
                                                <li><a href="#">SAT NAV HOLDER</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">CLOTHING</a>
                                            <ul class="submenu">
                                                <li><a href="#">ARMR</a>
                                                    <ul class="submenu">
                                                        <li><a href="#">TEXTILE JACKETS</a></li>
                                                        <li><a href="#">LEATHER JACKETS</a></li>
                                                        <li><a href="#">AMRMR ACCESSORIES</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">DOJO</a>
                                                    <ul class="submenu">
                                                        <li><a href="#">BOOTS</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">ALPINESTARS</a>
                                                    <ul class="submenu">
                                                        <li><a href="#">BOOTS</a>
                                                            <ul class="submenu">
                                                                <li><a href="#">MEN</a></li>
                                                                <li><a href="#">WOMEN</a></li>
                                                            </ul>
                                                        </li>

                                                        <li><a href="#">CASUAL</a></li>
                                                        <li><a href="#">GLOVES</a>
                                                            <ul class="submenu">
                                                                <li><a href="#">MEN</a></li>
                                                                <li><a href="#">WOMEN</a></li>
                                                            </ul>
                                                        </li>
                                                        <li><a href="#">LEATHER JACKETS</a></li>
                                                        <li><a href="#">LEATHER SUITS</a></li>
                                                        <li><a href="#">PROTECTORS & SLIDERS</a></li>
                                                        <li><a href="#">RAIN WEAR</a></li>
                                                        <li><a href="#">TEXTILE JACKETS</a></li>
                                                        <li><a href="#">TROUSERS</a></li>
                                                        <li><a href="#">REINFORCED JEANS & HOODIES</a></li>
                                                        <li><a href="#">ACCESSORIES & LAYERS</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">OXFORDS</a>
                                                    <ul class="submenu">
                                                        <li><a href="#">CASUAL CLOTHING</a></li>
                                                        <li><a href="#">PROTECTIVE CASUAL WEAR</a></li>
                                                        <li><a href="#">BRACES</a></li>
                                                        <li><a href="#">GLOVES</a></li>
                                                        <li><a href="#">HEAD & NECKWEAR</a></li>
                                                        <li><a href="#">HEATED</a></li>
                                                        <li><a href="#">RAIN WEAR</a></li>
                                                        <li><a href="#">JACKETS</a></li>
                                                        <li><a href="#">KNEE SLIDERS</a></li>
                                                        <li><a href="#">LAYERS</a></li>
                                                        <li><a href="#">LEATHER</a></li>
                                                        <li><a href="#">RAIN WEAR</a></li>
                                                        <li><a href="#">REFLECTIVES</a></li>
                                                        <li><a href="#">PROTECTIVE DENIM</a></li>
                                                        <li><a href="#">SOCKS</a></li>
                                                        <li><a href="#">TROUSERS</a></li>
                                                        <li><a href="#">BOOTS</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">SPARTAN</a></li>
                                                <li><a href="#">BULL-IT</a>
                                                    <ul class="submenu">
                                                        <li><a href="#">MEN</a>
                                                            <ul class="submenu">
                                                                <li><a href="#">AA 2019</a></li>
                                                                <li><a href="#">SR6 6 SECOND 2017</a></li>
                                                            </ul>
                                                        </li>
                                                        <li><a href="#">WOMEN</a>
                                                            <ul class="submenu">
                                                                <li><a href="#">AA 2019</a></li>
                                                                <li><a href="#">SR6 2017 6 SECOND</a></li>
                                                            </ul>
                                                        </li>
                                                        <li><a href="#">PROTECTORS</a></li>
                                                        <li><a href="#">CASUAL</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="#">TRACKER</a></li>
                                    </ul>
                                </div>
                            </div><!-- /.widget-sort-by -->

                            {{-- <div class="widget widget-color">
                                <h5 class="widget-title">
                                    Colors
                                </h5>
                                <ul class="flat-color-list icon-left">
                                    <li><a href="#" class="yellow"></a><span>Yellow</span> <span
                                            class="pull-right">25</span></li>
                                    <li><a href="#" class="pink"> </a><span>White</span> <span
                                            class="pull-right">16</span></li>
                                    <li><a href="#" class="red active"></a><span>Red</span> <span
                                            class="pull-right">28</span></li>
                                    <li><a href="#" class="black"></a><span>Black</span> <span
                                            class="pull-right">12</span></li>
                                    <li><a href="#" class="blue"></a><span>Green</span> <span
                                            class="pull-right">0</span></li>
                                </ul>
                            </div><!-- /.widget-color --> --}}

                            {{-- <div class="widget widget-size">
                                <h5 class="widget-title">
                                    Size
                                </h5>
                                <ul>
                                    <li class="checkbox">
                                        <input type="checkbox" name="checkbok1" id="checkbox1">
                                        <label for="checkbox1">
                                            <a href="#">L</a>
                                        </label>
                                    </li>
                                    <li class="checkbox">
                                        <input type="checkbox" name="checkbok2" id="checkbox2">
                                        <label for="checkbox2">
                                            <a href="#">M</a>
                                        </label>
                                    </li>
                                    <li class="checkbox">
                                        <input type="checkbox" name="checkbok3" id="checkbox3">
                                        <label for="checkbox3">
                                            <a href="#">S</a>
                                        </label>
                                    </li>
                                    <li class="checkbox">
                                        <input type="checkbox" name="checkbok4" id="checkbox4">
                                        <label for="checkbox4">
                                            <a href="#">X</a>
                                        </label>
                                    </li>
                                    <li class="checkbox">
                                        <input type="checkbox" name="checkbok5" id="checkbox5">
                                        <label for="checkbox5">
                                            <a href="#">XL</a>
                                        </label>
                                    </li>
                                    <li class="checkbox">
                                        <input type="checkbox" name="checkbok6" id="checkbox6">
                                        <label for="checkbox6">
                                            <a href="#">XXL</a>
                                        </label>
                                    </li>
                                </ul>
                            </div><!-- /.widget-size --> --}}
                            {{-- <div class="widget widget-price">
                                <h5 class="widget-title">Filter by price</h5>
                                <div class="price-filter">
                                    <div id="slide-range"></div>
                                    <p class="amount">
                                        Price: <input type="text" id="amount" disabled="">
                                    </p>
                                </div>
                            </div> --}}
                            {{-- <div class="widget widget_tag">
                                <h5 class="widget-title">
                                    Tags
                                </h5>
                                <div class="tag-list">
                                    <a href="#">Pinlock</a>
                                    <a href="#" class="active">Waterproof</a>
                                    <a href="#">Winter</a>
                                    <a href="#">Top Box</a>
                                    <a href="#">Tracker</a>
                                    <a href="#">Intercom</a>
                                    <a href="#">Locks</a>
                                    <a href="#">Heated Grips</a>
                                </div>
                            </div><!-- /.widget --> --}}
                        </div><!-- /.sidebar -->
                    </div><!-- /.col-md-3 -->

                    <div class="col-md-9">
                        <div class="filter-shop clearfix">
                            <p class="showing-product float-right">
                                NEED TO FIND SOMETHING FAST? <strong>CALL 0208 314 1498</strong>
                            </p>
                        </div><!-- /.filte-shop -->

                        @yield('content')

                    </div><!-- /.col-md-9 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.flat-row -->

        @include('frontend.body.footer')

        <!-- Go Top -->
        <a class="go-top">
            <i class="fa fa-chevron-up"></i>
        </a>

    </div>
    <!-- Javascript -->
    <script src="/assets/js/jquery-1.11.1.min.js"></script>
    <script src="/assets/js/jquery-accordion-menu.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            jQuery("#jquery-accordion-menu").jqueryAccordionMenu();
        });
    </script>

    {{-- <script src="/assets/js/jquery.min.js"></script> --}}
    <script src="/assets/js/tether.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/jquery.easing.js"></script>
    {{-- <script src="/assets/js/parallax.js"></script> --}}
    {{-- <script src="/assets/js/jquery-waypoints.js"></script> --}}
    {{-- <script src="/assets/js/jquery-countTo.js"></script> --}}
    {{-- <script src="/assets/js/jquery.countdown.js"></script> --}}
    {{-- <script src="/assets/js/jquery.flexslider-min.js"></script> --}}
    <script src="/assets/js/images-loaded.js"></script>
    {{-- <script src="/assets/js/jquery.isotope.min.js"></script> --}}
    {{-- <script src="/assets/js/magnific.popup.min.js"></script> --}}
    {{-- <script src="/assets/js/jquery.hoverdir.js"></script> --}}
    {{-- <script src="/assets/js/owl.carousel.min.js"></script> --}}
    {{-- <script src="/assets/js/equalize.min.js"></script> --}}
    {{-- <script src="/assets/js/gmap3.min.js"></script> --}}
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIEU6OT3xqCksCetQeNLIPps6-AYrhq-s&region=GB"></script> --}}
    <script src="/assets/js/jquery-ui.js"></script>

    {{-- <script src="/assets/js/jquery.cookie.js"></script> --}}
    <script src="/assets/js/main.js"></script>

    <!-- Revolution Slider -->
    {{-- <script src="/assets/rev-slider/js/jquery.themepunch.tools.min.js"></script> --}}
    {{-- <script src="/assets/rev-slider/js/jquery.themepunch.revolution.min.js"></script> --}}
    {{-- <script src="/assets/js/rev-slider.js"></script> --}}

    <!-- Load Extensions only on Local File Systems ! The following part can be removed on Server for On Demand Loading -->
    {{-- <script src="assets/rev-slider/js/extensions/revolution.extension.actions.min.js"></script> --}}
    {{-- <script src="assets/rev-slider/js/extensions/revolution.extension.carousel.min.js"></script> --}}
    {{-- <script src="assets/rev-slider/js/extensions/revolution.extension.kenburn.min.js"></script> --}}
    {{-- <script src="assets/rev-slider/js/extensions/revolution.extension.layeranimation.min.js"></script> --}}
    {{-- <script src="assets/rev-slider/js/extensions/revolution.extension.migration.min.js"></script> --}}
    {{-- <script src="assets/rev-slider/js/extensions/revolution.extension.navigation.min.js"></script> --}}
    {{-- <script src="assets/rev-slider/js/extensions/revolution.extension.parallax.min.js"></script> --}}
    {{-- <script src="assets/rev-slider/js/extensions/revolution.extension.slideanims.min.js"></script> --}}
    {{-- <script src="assets/rev-slider/js/extensions/revolution.extension.video.min.js"></script> --}}
</body>

</html>
