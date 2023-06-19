<!-- Header -->
<header id="header" class="header clearfix">

    <!-- Start Top Nav -->
    <nav class="navbar navbar-expand navbar-dark bg-dark d-none d-lg-block" style="background-color: #101111;">
        <div class="container">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fa fa-envelope mx-2" style="color:white;"></i>
                    <a style="color: white;" class="navbar-sm-brand text-light text-decoration-none" href="mailto:info@neguinhomotors.co.uk" target="_newtab" onmouseover="this.style.color='#f63440'" onMouseOut="this.style.color='#fff'">info@neguinhomotors.co.uk</a>
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
                                <a href="/new-motorcycles">BRAND NEW BIKES</a>
                            </li>
                            <li>
                                <a href="/used-motorcycles">SECOND HAND BIKES</a>
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
                    <li>
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
                    </li>
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
