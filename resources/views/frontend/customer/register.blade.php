@extends('layouts.frontend')
@section('title','Register page')
@section('content')
    <div class="main">
        <div class="account-login container">
            <!--page-title-->

            <form action="{{route('customer.register.store')}}" method="post" id="login-form">
                @csrf
                <input name="form_key" type="hidden" value="EPYwQxF6xoWcjLUr">
                <fieldset class="col2-set">
                    <div class="col-1 new-users">
                        <strong>New Customers</strong>
                        <div class="content">

                            <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
                            <div class="buttons-set">
                                <button type="button" title="Create an Account" class="button create-account" onClick=""><span><span>Create an Account</span></span></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 registered-users">
                        <strong>Registered Customers</strong>
                        <div class="content">

                            <p>If you don't have an account with us, please register here.</p>
                            <ul class="form-list">
                                <li>
                                    <label for="name">Name<em class="required">*</em></label>
                                    <div class="input-box">
                                        <input type="text" name="name" value="" id="name" class="input-text required-entry validate-name" title="Name">
                                    </div>
                                </li>


                                <li>
                                    <label for="email">Email Address<em class="required">*</em></label>
                                    <div class="input-box">
                                        <input type="text" name="email" value="" id="email" class="input-text required-entry validate-email" title="Email Address">
                                    </div>
                                </li>

                                <li>
                                    <label for="username">Username<em class="required">*</em></label>
                                    <div class="input-box">
                                        <input type="text" name="username" value="" id="username" class="input-text required-entry validate-username" title="Username">
                                    </div>
                                </li>
                                <li>
                                    <label for="password">Password<em class="required">*</em></label>
                                    <div class="input-box">
                                        <input type="password" name="password" class="input-text required-entry validate-password" id="password" title="Password">
                                    </div>
                                </li>
                                <li>
                                    <label for="confirm_password">Confirm Password<em class="required">*</em></label>
                                    <div class="input-box">
                                        <input type="password" name="confirm_password" class="input-text required-entry validate-password" id="confirm_password" title="Confirm Password">
                                    </div>
                                </li>
                                <li>
                                    <label for="address">Address<em class="required">*</em></label>
                                    <div class="input-box">
                                        <input type="text" name="address" value="" id="address" class="input-text required-entry validate-address" title="Address">
                                    </div>
                                </li>

                                <li>
                                    <label for="phone">Phone<em class="required">*</em></label>
                                    <div class="input-box">
                                        <input type="number" name="phone" value="" id="phone" class="input-text required-entry validate-phone" title="Phone">
                                    </div>
                                </li>
                                <li>
                                    <label for="shipping_address">Shipping Address<em class="required">*</em></label>
                                    <div class="input-box">
                                        <input type="address" name="shipping_address" value="" id="shipping_address" class="input-text required-entry validate-shipping_address" title="Shipping Address">
                                    </div>
                                </li>

                                <li>
                                    <label for="phone">Date of Birth<em class="required">*</em></label>
                                    <div class="input-box">
                                        <input type="date" name="date" value="" id="date" class="input-text required-entry validate-date" title="Date">
                                    </div>
                                </li>

                            </ul>
                            <div class="remember-me-popup">
                                <div class="remember-me-popup-head" style="display:none">
                                    <h3 id="text2">What's this?</h3>
                                    <a href="#" class="remember-me-popup-close" onClick="showDiv()" title="Close">Close</a>
                                </div>
                                <div class="remember-me-popup-body" style="display:none">
                                    <p id="text1">Checking "Remember Me" will let you access your shopping cart on this computer when you are logged out</p>
                                    <div class="remember-me-popup-close-button a-right">
                                        <a href="#" class="remember-me-popup-close button" title="Close" onClick="
            showDiv()"><span>Close</span></a>
                                    </div>
                                </div>
                            </div>

                            <p class="required">* Required Fields</p>



                            <div class="buttons-set">
                                <button type="submit" class="button register" title="Register" name="register" id="register"><span>Register</span></button>

                                <a href="#" class="forgot-word">Forgot Your Password?</a>
                            </div> <!--buttons-set-->
                        </div> <!--content-->
                    </div> <!--col-2 registered-users-->
                </fieldset> <!--col2-set-->
            </form>

        </div> <!--account-login-->

    </div><!--main-container-->
@endsection