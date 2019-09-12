@extends('layouts.frontend')
@section('content')
    <!-- breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1">
                <li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active">Checkout Page</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <!-- checkout -->
    <div class="checkout">
        <div class="container">
            <h2>Your shopping cart contains: <span>{{\Gloudemans\Shoppingcart\Facades\Cart::content()->count()}} Products</span></h2>
            @include('includes.flash')
            <form class="w3-container w3-display-middle w3-card-4 " method="POST" id="payment-form"  action="{{route('payment.paywithpaypal')}}">
                {{ csrf_field() }}
                <div class="checkout-right">
                    <table class="timetable_sub">
                        <thead>
                        <tr>
                            <th>SL No.</th>
                            <th>Product</th>
                            <th>Quality</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        @php($i=1)
                        @foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $cart)
                            <input class="w3-input w3-border" name="item_name_{{$i}}" type="hidden" value="{{$cart->name}}"></p>
                            <input class="w3-input w3-border" name="item_quantity_{{$i}}" type="hidden" value="{{$cart->qty}}"></p>
                            <input class="w3-input w3-border" name="item_price_{{$i}}" type="hidden" value="{{$cart->price}}"></p>

                            <tr class="rem1">
                                <td class="invert">{{$i++}}</td>
                                <td class="invert-image"><a href="{{route('frontend.product', \App\Model\Product::find($cart->id)->slug )}}">
                                        <img src="{{asset('images/product/' .\App\Model\Product::find($cart->id)->thumb_image)}}" alt=" " class="img-responsive" /></a></td>
                                <td class="invert">
                                    <div class="quantity">
                                        <div class="quantity-select">
                                            <div class="entry value"><span>{{$cart->qty}}</span></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="invert">{{$cart->name}}</td>
                                <td class="invert">{{$cart->price}}</td>
                                <td class="invert">{{$cart->price*$cart->qty}}</td>
                            </tr>
                    @endforeach
                    <!--quantity-->
                    </table>
                </div>
                <input class="w3-input w3-border" name="total_num_item" type="hidden" value="{{$i-1}}"></p>

                <div class="checkout-left" >
                    <div class="checkout-left-basket">
                        <h4>Continue to basket</h4>
                        <ul>
                            <li>TAX<i>-</i> <span>{{\Gloudemans\Shoppingcart\Facades\Cart::tax()}}</span></li>
                            <li>Total<i>-</i> <span>{{\Gloudemans\Shoppingcart\Facades\Cart::total()}}</span></li>
                        </ul>
                    </div>
                    <div class="checkout-right-basket">
                        <a href="{{route('frontend.index')}}"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Continue Shopping</a>
                        <a href="{{route('frontend.cart.index')}}">Checkout &nbsp;<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="checkout-left" >
                    <div class="checkout-left-basket">
                        <h4>Shipping Address</h4>

                        <h2 class="w3-text-blue">Payment Form</h2>
                        <p>Demo PayPal form - Integrating paypal in laravel</p>
                        <p>
                            <label class="w3-text-blue"><b>Amount</b></label>
                            <input class="w3-input w3-border" name="amount" type="text" value="{{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}"></p>

                        <button class="w3-btn w3-blue">Pay with PayPal</button></p>

                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- //checkout -->
@endsection