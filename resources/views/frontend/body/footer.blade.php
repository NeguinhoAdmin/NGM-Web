<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-2">
                <div class="widget widget-link">
                    @auth
                    <ul>
                        <li><a href="/contact">Contact Us</a></li>
                        <li><a href="/dashboard">My Account</a></li>
                        <li><a href="/cart">My Cart</a></li>
                        <li><a href="#">My Wishlist Items</a></li>
                        <li><a href="#">My Checkout</a></li>
                        <li><a href="#">Delivery</a></li>
                        <li><a href="#">Returns</a></li>
                        <li><a href="#">Help & FAQs</a></li>
                    </ul>
                    @endauth

                    @guest
                    <ul>
                        <li>
                            <a href="{{ route('login.perform') }}">Login </a>
                        </li>
                        <li>
                            <a href="{{ route('register.perform') }}">Register</a>
                        </li>
                    </ul>
                    @endguest

                </div><!-- /.widget -->
            </div><!-- /.col-md-3 -->
            <div class="col-sm-6 col-md-2">
                <div class="widget widget-link link-login">
                    <ul>
                        <li><a href="/terms-of-use">Terms of Use</a></li>
                        <li><a href="/cookie-and-privacy-policy">Cookies & Privacy</a></li>
                        <li><a href="/refund-policy">Refund Policy</a></li>
                        <li><a href="/shipping-policy">Shipping Policy</a></li>
                    </ul>
                </div><!-- /.widget -->
            </div><!-- /.col-md-3 -->
            <div class="col-sm-6 col-md-4">
                <div class="widget widget-brand">
                    <h3 class="">Got one? Get one...</h3>
                    <A href="/contact/trade-account">
                        <img src="{{url('img/home/trade_account_card.jpg')}}" alt="image" width="100%">
                    </a>
                </div><!-- /.widget -->
            </div><!-- /.col-md-3 -->
            <div class="col-sm-6 col-md-4">
                <div class="widget widget-brand">
                    <ul class="flat-contact">
                        <li class="area"><a href="/" title="logo">
                                <img src="{{url('/img/neguinhomotors3.png')}}" alt="image" width="100%" data-retina="{{url('i/mg/neguinhomotors3.png')}}" data-width="100%">
                            </a></li>
                        <li class="area">CATFORD</li>
                        <li>
                            <i class="fa fa-phone mx-2"></i>
                            <a class="phone" href="tel:0208314498">0208 314 1498</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope mx-2"></i>
                            <a class="email" href="mailto:info@neguinhomotors.co.uk" target="_newtab">info@neguinhomotors.co.uk</a>
                        </li>
                        <li>
                            <i class="fa fa-map-marker mx-2"></i>
                            <a class="address">Unit 1179, 9 Catford Hill, London SE6 4NU</a>
                        </li>
                        <li class="area">TOOTING</li>
                        <li>
                            <i class="fa fa-phone mx-2"></i>
                            <a class="phone" href="tel:02034095478">0203 409 5478</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope mx-2"></i>
                            <a class="email" href="mailto:info@neguinhomotors.co.uk">info@neguinhomotors.co.uk</a>
                        </li>
                        <li>
                            <i class="fa fa-map-marker mx-2"></i>
                            <a class="address">4A Penwortham Road, London SW16 6RE</a>
                        </li>
                    </ul><!-- /.flat-contact -->
                </div><!-- /.widget -->
            </div><!-- /.col-md-3 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</footer><!-- /.footer -->

<div class="footer-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p class="copyright text-center">Copyright @ 2023 <a href="/">Neguinho Motors Limited - All Rights Reserved</a>
                </p>
            </div>
        </div>
    </div>
</div>
