@extends('frontend.main_master')

@section('content')
<div class="page-title parallax parallax1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-heading">
                    <h1 class="title">Your Shopping Cart</h1>
                </div><!-- /.page-title-heading -->
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="/">Honda & Yamaha Specialists</a></li>
                        <li><a href="/products">Shop</a></li>
                        <li><a href="/cart">Shopping Cart</a></li>
                    </ul>
                </div><!-- /.breadcrumbs -->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div>
<section class="flat-row shop-detail-content">
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-9">
                <div class="flat-tabs style-1 has-border">
                    @if (count(Cart::content()))
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product ID</th>
                                <th scope="col">Name</th>
                                <th class="text-center" scope="col">Quantity</th>
                                <th scope="col">Total inc. VAT</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Cart::content() as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td class="text-center">{{ $item->qty }}</td>
                                <td>£{{ $item->total }}</td>
                                <td>
                                    <a href="/oxford/remove/{{$item->id}}" type="button" class="btn btn-outline-danger">Remove</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="alert alert-info text-center m-0" role="alert">
                        Your Cart is <b>empty</b>.
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-md-3">
                <div class="parallax parallax1">
                    <form action="{{ route('product.checkout') }}">
                        <div class="title text-center" style="padding-top: 10px;">
                            <div class="title text-center">
                                <strong>ORDER SUMMARY</strong>
                            </div>
                            <div class="title text-center mb-3">
                                Items <strong>{{ $cartCount }}</strong>
                            </div>
                            <div class="title text-center mb-3">
                                Total <strong>{{ $cartSubtotal }}</strong>
                            </div>
                            <div class="title text-center mb-3">
                                Shipping <strong>TBD</strong>
                            </div>
                            <div class="title text-center mb-3" placeholder="00.00">
                                <input class="form-control text-center" type="text" placeholder="Enter Discount Code">
                            </div>
                            <div class="title text-center mb-3">
                                Order Total <strong>£{{ $newTotal }}</strong>
                            </div>
                            <!-- <div class="divider h10"></div> -->
                            <div class="button text-center" style="padding-bottom: 20px;">
                                <button type="submit" class="btn" type="button">SECURE CHECKOUT</button>
                            </div>
                            <div>
                                <p>
                                    All prices are subject to VAT.
                                </p>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p>
                The price and availability of items at NeguinhoMotors.co.uk are subject to change.
            </p>
            <p>
                The shopping basket is a temporary place to store a list of your items and reflects each item's most recent price.
            </p>
        </div>
    </div>
    </div>
</section><!-- /.shop-detail-content -->
@endsection

@section('scripts')

@endsection
