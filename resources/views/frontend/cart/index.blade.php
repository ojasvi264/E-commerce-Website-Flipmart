@extends('layouts.frontend')
@section('title', 'Cart Listing' )
@section('content')
    <div class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title">
                        <h2>Shopping Cart</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- BEGIN Main Container -->

    <div class="main-container col1-layout wow bounceInUp animated">

        <div class="main container">
            <div class="cart wow bounceInUp animated">
                <div class="table-responsive shopping-cart-tbl  container">

                        <fieldset>
                            <table id="shopping-cart-table" class="data-table cart-table table-striped">
                                <thead>
                                <tr class="first last">
                                    <th rowspan="1">&nbsp;</th>
                                    <th rowspan="1"><span class="nobr">Product Name</span></th>
                                    <th rowspan="1"></th>
                                    <th rowspan="1">Attributes</th>
                                    <th class="a-center" colspan="1"><span class="nobr">Unit Price</span></th>
                                    <th rowspan="1" class="a-center">Qty</th>
                                    <th class="a-center" colspan="1">Subtotal</th>
                                    <th rowspan="1" class="a-center">&nbsp;</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr class="first last">
                                    <td colspan="7" class="last">
                                        <button type="button" title="Continue Shopping" class="button btn-continue" onClick=""><span><span>Continue Shopping</span></span></button>
                                        <button type="submit" name="update_cart_action" value="update_qty" title="Update Cart" class="button btn-update"><span><span>Update Cart</span></span></button>
                                        <button type="submit" name="update_cart_action" value="empty_cart" title="Clear Cart" class="button btn-empty" id="empty_cart_button"><span><span>Clear Cart</span></span></button>

                                    </td>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach ($data['carts'] as $cart)
                                    @php
                                        $product = \App\Model\Product::find($cart->id);
                                        $image = $product->images->first();
                                    @endphp
                                    <tr class="first last odd">
                                        <td class="image hidden-table"><a href="{{route('frontend.product',$product->slug)}}" title="Women&#39;s Georgette Animal Print" class="product-image">
                                                <img src="{{asset('images/product/' . $image->image)}}" width="75" alt="Women&#39;s Georgette Animal Print">
                                            </a></td>
                                        <td>
                                            <h2 class="product-name">
                                                <a href="product-detail.html">{{$cart->name}}</a>
                                            </h2>
                                        </td>
                                        <td class="a-center hidden-table">
                                            <a href="#" class="edit-bnt" title="Edit item parameters"></a>
                                        </td>
                                        <td>
                                            <ul>
                                                @foreach($cart->options as $key => $option)
                                                    <li>{{$key . ' : ' .$option}}</li>
                                                @endforeach
                                            </ul>
                                        </td>

                                        <td class="hidden-table">
                            <span class="cart-price">
                                                <span class="price">Rs. {{$cart->price}}</span>
            </span>


                                        </td>
                                        <td class="a-center movewishlist">
                                            <input name="cart[26340][qty]" value="{{$cart->qty}}" size="4" title="Qty" class="input-text qty" maxlength="12">
                                        </td>
                                        <td class="movewishlist">
                    <span class="cart-price">

                                                <span class="price">Rs.{{$cart->price * $cart->qty}}</span>
        </span>
                                        </td>
                                        <td class="a-center last">

                                            <form action="{{route('cart.destroy',$cart->rowId)}}" method="post" >
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE"/>
                                                <button class="btn-danger"><i class="fa fa-trash"></i>Delete</button>
                                            </form>
                                        </td>





                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </fieldset>
                </div>

                <!-- BEGIN CART COLLATERALS -->


                <div class="cart-collaterals container">
                    <!-- BEGIN COL2 SEL COL 1 -->


                    <!-- BEGIN TOTALS COL 2 -->
                    <div class="col-sm-4">


                        <div class="shipping">

                            <h3>Estimate Shipping and Tax</h3>
                            <div class="shipping-form">
                                <form action="#" method="post" id="shipping-zip-form">
                                    <p>Enter your destination to get a shipping estimate.</p>
                                    <ul class="form-list">
                                        <li>
                                            <label for="country" class="required"><em>*</em>Country</label>
                                            <div class="input-box">
                                                <select name="country_id" id="country" class="validate-select" title="Country"><option value="">Select Country</option><option value="AF">Afghanistan</option><option value="AX">Åland Islands</option><option value="AL">Albania</option><option value="DZ">Algeria</option><option value="AS">American Samoa</option></select>                    </div>
                                        </li>
                                        <li>
                                            <label for="region_id">State/Province</label>
                                            <div class="input-box">
                                                <select id="region_id" name="region_id" title="State/Province" class="required-entry validate-select">
                                                    <option value="">Please select region, state or province</option>
                                                    <option value="1" title="Alabama">Alabama</option><option value="2" title="Alaska">Alaska</option><option value="3" title="American Samoa">American Samoa</option><option value="4" title="Arizona">Arizona</option><option value="5" title="Arkansas">Arkansas</option><option value="6" title="Armed Forces Africa">Armed Forces Africa</option><option value="7" title="Armed Forces Americas">Armed Forces Americas</option><option value="8" title="Armed Forces Canada">Armed Forces Canada</option><option value="9" title="Armed Forces Europe">Armed Forces Europe</option><option value="10" title="Armed Forces Middle East">Armed Forces Middle East</option><option value="11" title="Armed Forces Pacific">Armed Forces Pacific</option><option value="12" title="California">California</option><option value="13" title="Colorado">Colorado</option><option value="14" title="Connecticut">Connecticut</option><option value="15" title="Delaware">Delaware</option><option value="16" title="District of Columbia">District of Columbia</option><option value="17" title="Federated States Of Micronesia">Federated States Of Micronesia</option><option value="18" title="Florida">Florida</option><option value="19" title="Georgia">Georgia</option><option value="20" title="Guam">Guam</option><option value="21" title="Hawaii">Hawaii</option><option value="22" title="Idaho">Idaho</option><option value="23" title="Illinois">Illinois</option><option value="24" title="Indiana">Indiana</option><option value="25" title="Iowa">Iowa</option><option value="26" title="Kansas">Kansas</option><option value="27" title="Kentucky">Kentucky</option><option value="28" title="Louisiana">Louisiana</option><option value="29" title="Maine">Maine</option><option value="30" title="Marshall Islands">Marshall Islands</option><option value="31" title="Maryland">Maryland</option><option value="32" title="Massachusetts">Massachusetts</option><option value="33" title="Michigan">Michigan</option><option value="34" title="Minnesota">Minnesota</option><option value="35" title="Mississippi">Mississippi</option><option value="36" title="Missouri">Missouri</option><option value="37" title="Montana">Montana</option><option value="38" title="Nebraska">Nebraska</option><option value="39" title="Nevada">Nevada</option><option value="40" title="New Hampshire">New Hampshire</option><option value="41" title="New Jersey">New Jersey</option><option value="42" title="New Mexico">New Mexico</option><option value="43" title="New York">New York</option><option value="44" title="North Carolina">North Carolina</option><option value="45" title="North Dakota">North Dakota</option><option value="46" title="Northern Mariana Islands">Northern Mariana Islands</option><option value="47" title="Ohio">Ohio</option><option value="48" title="Oklahoma">Oklahoma</option><option value="49" title="Oregon">Oregon</option><option value="50" title="Palau">Palau</option><option value="51" title="Pennsylvania">Pennsylvania</option><option value="52" title="Puerto Rico">Puerto Rico</option><option value="53" title="Rhode Island">Rhode Island</option><option value="54" title="South Carolina">South Carolina</option><option value="55" title="South Dakota">South Dakota</option><option value="56" title="Tennessee">Tennessee</option><option value="57" title="Texas">Texas</option><option value="58" title="Utah">Utah</option><option value="59" title="Vermont">Vermont</option><option value="60" title="Virgin Islands">Virgin Islands</option><option value="61" title="Virginia">Virginia</option><option value="62" title="Washington">Washington</option><option value="63" title="West Virginia">West Virginia</option><option value="64" title="Wisconsin">Wisconsin</option><option value="65" title="Wyoming">Wyoming</option></select>

                                                <input type="text" id="region" name="region" value="" title="State/Province" class="input-text required-entry" style="display: none;">
                                            </div>
                                        </li>
                                        <li>
                                            <label for="postcode">Zip/Postal Code</label>
                                            <div class="input-box">
                                                <input class="input-text validate-postcode" type="text" id="postcode" name="estimate_postcode" value="">
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="buttons-set11">
                                        <button type="button" title="Get a Quote" onClick="coShippingMethodForm.submit()" class="button get-quote"><span>Get a Quote</span></button>
                                    </div> <!--buttons-set11-->
                                </form>


                            </div>
                        </div>

                    </div>

                    <div class="col-sm-4">

                        <div class="discount">
                            <h3>Discount Codes</h3>
                            <form id="discount-coupon-form" action="#" method="post">
                                <label for="coupon_code">Enter your coupon code if you have one.</label>
                                <input type="hidden" name="remove" id="remove-coupone" value="0">
                                <input class="input-text fullwidth" type="text" id="coupon_code" name="coupon_code" value="">
                                <button type="button" title="Apply Coupon" class="button coupon " onClick="discountForm.submit(false)" value="Apply Coupon"><span>Apply Coupon</span></button>

                            </form>

                        </div> <!--discount-->
                    </div> <!--col-sm-4-->

                    <div class="col-sm-4">
                        <div class="totals">
                            <h3>Shopping Cart Total</h3>
                            <div class="inner">

                                <table id="shopping-cart-totals-table" class="table shopping-cart-table-total">
                                    <tfoot>
                                    <tr>
                                        <td style="" class="a-left" colspan="1">
                                            <strong>Grand Total</strong>
                                        </td>
                                        <td style="" class="a-right">
                                            <strong><span class="price">$129.00</span></strong>
                                        </td>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <tr>
                                        <td style="" class="a-left" colspan="1">
                                            Subtotal    </td>
                                        <td style="" class="a-right">
                                            <span class="price">$129.00</span>    </td>
                                    </tr>
                                    </tbody>
                                </table>

                                <ul class="checkout">
                                    <li>
                                        <a href="{{route('customer.checkout')}}"><button type="button" title="Proceed to Checkout" class="button btn-proceed-checkout" > Proceed to checkout</button></a>
                                    </li>
                                    <li><a href="multiple-addresses.html" title="Checkout with Multiple Addresses">Checkout with Multiple Addresses</a>
                                    </li>
                                </ul>
                            </div><!--inner-->
                        </div><!--totals-->
                    </div> <!--col-sm-4-->


                </div> <!--cart-collaterals-->



            </div>  <!--cart-->

        </div><!--main-container-->

    </div> <!--col1-layout-->
    <!-- For version 1,2,3,4,6 -->
@endsection