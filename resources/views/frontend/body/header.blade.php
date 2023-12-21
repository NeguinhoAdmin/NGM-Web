<!-- Header -->
<header id="header" class="header clearfix">

    <!-- Start Top Nav -->
    <nav class="navbar navbar-expand navbar-dark bg-dark d-none d-lg-block" style="background-color: #101111;">
        <div class="container">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fa fa-envelope mx-2" style="color:white;"></i>
                    <a style="color: white;" class="navbar-sm-brand text-light text-decoration-none"
                        href="mailto:customerservice@neguinhomotors.co.uk" target="_newtab"
                        onmouseover="this.style.color='#f63440'" onMouseOut="this.style.color='#fff'">Customer
                        Service</a>
                    <i class="fa fa-phone mx-2" style="color:white;"></i>
                    <a style="color: white;" class="navbar-sm-brand text-light text-decoration-none"
                        href="tel:02083141498" onmouseover="this.style.color='#f63440'"
                        onMouseOut="this.style.color='#fff'">Catford: 0208 314 1498</a>
                    <i class="fa fa-phone mx-2" style="color:white;"></i>
                    <a style="color: white;" class="navbar-sm-brand text-light text-decoration-none"
                        href="tel:02034095478" onmouseover="this.style.color='#f63440'"
                        onMouseOut="this.style.color='#fff'">Tooting: 0203 409 5478</a>
                    <i class="fa fa-bell mx-2" style="color:white;"></i>
                    <a style="color: white;" class="navbar-sm-brand text-light text-decoration-none"
                        href="/contact/call-back" onmouseover="this.style.color='#f63440'"
                        onMouseOut="this.style.color='#fff'">Request Callback</a>
                </div>

                <div>
                    @if (Route::has('login'))

                        @auth

                            <a class="navbar-sm-brand text-light text-decoration-none" href="{{ url('/dashboard') }}"
                                style="color:white;">Dashboard</a>
                        @else
                            <a class="navbar-sm-brand text-light text-decoration-none" href="{{ route('login') }}"
                                style="color:white;">Log in </a>/

                            @if (Route::has('register'))
                                <a class="navbar-sm-brand text-light text-decoration-none" href="{{ route('register') }}"
                                    style="color:white;">Register</a>
                            @endif

                        @endauth

                    @endif
                </div>

            </div>
        </div>
    </nav>
    <!-- Close Top Nav -->

    <div class="container-fluid container-width-93 clearfix" id="site-header-inner">
        <div id="logo" class="logo float-left image-responsive col-sm-3 col-md-4">
            <a href="/" title="logo" class="logo">
                <img src="{{ url('img/neguinho-motors-logo-1.png') }}" alt="Neguinho Motors" width="85%"
                    height="24" data-retina="{{ url('img/neguinho-motors-logo-1.png') }}" data-width="85%"
                    data-height="24">
            </a>
        </div><!-- /.logo -->
        <div class="mobile-button"><span></span></div>
        <ul class="menu-extra">
            <li class="box-search">
                <a class="icon_search header-search-icon" href="#"></a>
                <form role="search" method="get" class="header-search-form" action="#">
                    <input type="text" value="" name="search" class="header-search-field"
                        placeholder="Search...">
                    <button type="submit" class="header-search-submit" title="Search">Search</button>
                </form>
            </li>
            <li class="box-cart nav-top-cart-wrapper">
                <a class="icon_cart nav-cart-trigger " href="/cart"><span> </span></a>
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
                        <a href="/motorcycle-rental-hire">RENTALS</a>
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
                        <a href="/shop-motorcycle">SHOP</a>
                        <ul class="submenu">
                            <li>
                                <a href="/helmets">ACCESSORIES</a>
                                <ul class="submenu">
                                    <li>
                                        <a href="/category/10">PHONE & DEVICE MOUNTS</a>
                                    </li>
                                    <li>
                                        <a href="/category/10">COVERS</a>
                                    </li>
                                    <li>
                                        <a href="/category/3">HANDLEBAR ACCESSORIES</a>
                                        <ul class="submenu">
                                            <li>
                                                <a href="/category/10">PHONES</a>
                                            </li>
                                            <li>
                                                <a href="/category/10">CLOCKS</a>
                                            </li>
                                            <li>
                                                <a href="/category/10">BAR ENDS</a>
                                            </li>
                                            <li>
                                                <a href="/category/10">GRIPS</a>
                                            </li>
                                            <li>
                                                <a href="/category/10">HEATED GRIPS</a>
                                            </li>
                                            <li>
                                                <a href="/category/10">MIRRORS</a>
                                            </li>
                                            <li>
                                                <a href="/category/10">MUFFS</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="/category/26">BATTERY CARE & POWER</a>
                                    </li>
                                    <li>
                                        <a href="/category/10">SCOOT STUFF</a>
                                    </li>
                                    <li>
                                        <a href="/category/10">WORKSHOP</a>
                                    </li>
                                    <li>
                                        <a href="/category/10">HELMET ACCESSORIES</a>
                                    </li>
                                    <li>
                                        <a href="/category/10">LIGHTING</a>
                                    </li>
                                    <li>
                                        <a href="/category/10">PAINT PROTECTION</a>
                                    </li>
                                    <li>
                                        <a href="/category/10">TRAVEL & TRANSPORTATION</a>
                                    </li>
                                    <li>
                                        <a href="/category/10">TYRES & WHEEL CARE</a>
                                    </li>
                                    <li>
                                        <a href="/category/10">EYE WEAR</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="/helmets">HELMETS</a>
                                <ul class="submenu">
                                    <li>
                                        <a href="/category/10">MT HELMETS</a>
                                        <ul class="submenu">
                                            <li>
                                                <a href="/category/10">FULL FACE</a>
                                            </li>
                                            <li>
                                                <a href="/category/10">OPEN FACE</a>
                                            </li>
                                            <li>
                                                <a href="/category/10">VISORS & PINLOCK</a>
                                            </li>
                                            <li>
                                                <a href="/category/10">FLIP FRONT</a>
                                            </li>
                                            <li>
                                                <a href="/category/10">MT ACCESSORIES</a>
                                            </li>
                                            <li>
                                                <a href="/category/10">GOGGLES</a>
                                            </li>
                                            <li>
                                                <a href="/category/10">ADVENTURE</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="/category/10">SIMPONS</a>
                                        <ul class="submenu">
                                            <li>
                                                <a href="/category/10">FULL FACE</a>
                                            </li>
                                            <li>
                                                <a href="/category/10">FLIP FRONT</a>
                                            </li>
                                            <li>
                                                <a href="/category/10">ACCESSORIES</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="/category/10">ALPINESTARS</a>
                                    </li>
                                    <li>
                                        <a href="/category/10">BOX</a>
                                        <ul class="submenu">
                                            <li>
                                                <a href="/category/10">VISORS & PINLOCK</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="/category/10">HJC</a>
                                        <ul class="submenu">
                                            <li>
                                                <a href="/category/10">ADVENTURE</a>
                                            </li>
                                            <li>
                                                <a href="/category/10">SMART HJC</a>
                                            </li>
                                            <li>
                                                <a href="/category/10">FLIP FRONT</a>
                                            </li>
                                            <li>
                                                <a href="/category/10">FULL FACE</a>
                                            </li>
                                            <li>
                                                <a href="/category/10">MOTOR X</a>
                                            </li>
                                            <li>
                                                <a href="/category/10">OPEN FACE</a>
                                            </li>
                                            <li>
                                                <a href="/category/10">VISORS & PINLOCK</a>
                                            </li>
                                            <li>
                                                <a href="/category/10">SPARES</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="/helmets">SECURITY</a>
                                <ul class="submenu">
                                    <li>
                                        <a href="/category/10">LEVER LOCKS</a>
                                    </li>
                                    <li>
                                        <a href="/category/10">CHAIN LOCKS & CHAINS</a>
                                    </li>
                                    <li>
                                        <a href="/category/10">ANCHORS</a>
                                    </li>
                                    <li>
                                        <a href="/category/10">CABLE LOCKS</a>
                                    </li>
                                    <li>
                                        <a href="/category/10">DISC LOCKS & PADLOCKS</a>
                                    </li>
                                    <li>
                                        <a href="/category/10">U LOCKS</a>
                                    </li>
                                </ul>
                            </li>
                    </li>
                    <li>
                        <a href="/helmets">LUGGAGE</a>
                        <ul class="submenu">
                            <li>
                                <a href="/category/10">HELMET & BOOT CARRIERS</a>
                            </li>
                            <li>
                                <a href="/category/10">PANNIERS</a>
                            </li>
                            <li>
                                <a href="/category/10">LUGGAGE ACCESSORIES</a>
                            </li>
                            <li>
                                <a href="/category/10">BACKPACKS</a>
                            </li>
                            <li>
                                <a href="/category/10">TAIL PACKS</a>
                            </li>
                            <li>
                                <a href="/category/10">TANK BAGS</a>
                            </li>
                            <li>
                                <a href="/category/10">WAIST AND LEG BAGS</a>
                            </li>
                            <li>
                                <a href="/category/10">TOP BOXES</a>
                            </li>
                            <li>
                                <a href="/category/10">SAT NAV HOLDER</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="/helmets">CLOTHING</a>
                        <ul class="submenu">
                            <li>
                                <a href="/category/10">ARMR</a>
                                <ul class="submenu">
                                    <li>
                                        <a href="/category/10">TEXTILE JACKETS</a>
                                    </li>
                                    <li>
                                        <a href="/category/10">LEATHER JACKETS</a>
                                    </li>
                                    <li>
                                        <a href="/category/10">ARMR ACCESSORIES</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="/category/10">DOJO</a>
                                <ul class="submenu">
                                    <li>
                                        <a href="/category/10">BOOTS</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="/category/10">ALPINESTARS</a>
                                <ul class="submenu">
                                    <li>
                                        <a href="/category/10">BOOTS</a>
                                    </li>
                                    <li>
                                        <a href="/category/10">CASUAL</a>
                                    </li>
                                    <li>
                                        <a href="/category/10">GLOVES</a>
                                    </li>
                                    <li>
                                        <a href="/category/10">LEATHER JACKETS</a>
                                    </li>
                                    <li>
                                        <a href="/category/10">LEATHER SUITS</a>
                                    </li>
                                    <li>
                                        <a href="/category/10">PROTECTORS & SLIDERS</a>
                                    </li>
                                    <li>
                                        <a href="/category/10">RAIN WEAR</a>
                                    </li>
                                    <li>
                                        <a href="/category/10">TEXTILE JACKETS</a>
                                    </li>
                                    <li>
                                        <a href="/category/10">TROUSERS</a>
                                    </li>
                                    <li>
                                        <a href="/category/10">REINFORCED JEANS & HOODIES</a>
                                    </li>
                                    <li>
                                        <a href="/category/10">ACCESSORIES & LAYERS</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="/category/10">OXFORDS</a>
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
                            <li>
                                <a href="/category/10">SPARTAN</a>
                            </li>
                            <li>
                                <a href="/category/10">BULL-IT</a>
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
                    <li>
                        <a href="/helmets">TRACKER</a>
                    </li>
                </ul>
                </li>
                <li>
                    <a href="/about">ABOUT</a>
                </li>
                <li>
                    <a href="/contact">CONTACT</a>
                    <ul class="submenu">
                        <li>
                            <a href="/login">LOGIN</a>
                        </li>
                        <li>
                            <a href="/register">REGISTER</a>
                        </li>
                    </ul>
                </li>
                </ul>
            </nav><!-- /.mainnav -->
        </div><!-- /.nav-wrap -->
    </div><!-- /.container-fluid -->
</header><!-- /header -->
