<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>@yield('title') {{$data['configurations']->name}}</title>
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=no">
    <meta name="description" content="Default Description">
    <meta name="keywords" content="fashion, store, E-commerce">
    <meta name="robots" content="*">
    <link rel="icon" href="#" type="image/x-icon">
    <link rel="shortcut icon" href="#" type="image/x-icon">

    <!-- CSS Style -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/stylesheet/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/stylesheet/font-awesome.css')}}" media="all">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/stylesheet/revslider.css')}}" >
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/stylesheet/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/stylesheet/owl.theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/stylesheet/jquery.bxslider.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/stylesheet/jquery.mobile-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/stylesheet/style.css')}}" media="all">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/stylesheet/responsive.css')}}" media="all">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,400,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,400italic,700,800,900' rel='stylesheet' type='text/css'>

    <meta name="viewport" content="initial-scale=1.0, width=device-width">
    @yield('css')
</head>
<body>
<div id="page">
    <header>
        <div id="header">
            <div class="header-container container">
                <div class="row">
                    <div class="logo"> <a href="{{route('frontend.index')}}" title="Flavours HTML">
                            <div><img src="{{asset('frontend/images/'. $data['configurations']->logo)}}" alt="{{$data['configurations']->name}}"></div>
                        </a> </div>
                    <div class="fl-nav-menu">

                        <nav>
                            <div class="mm-toggle-wrap">
                                <div class="mm-toggle"><i class="icon-align-justify"></i><span class="mm-label">Menu</span> </div>
                            </div>
                            <div class="nav-inner">
                                <!-- BEGIN NAV -->
                                <ul id="nav" class="hidden-xs">
                                    @foreach($data['categories'] as $category)
                                    <li class="mega-menu"><a href="{{route('frontend.category',$category->slug)}}" class="level-top"><span>{{$category->name}}</span></a>
                                        <div class="level0-wrapper dropdown-6col">
                                            <div class="container">
                                                <div class="level0-wrapper2">
                                                    <div class="nav-block nav-block-center">
                                                        <ul class="level0">
                                                            @foreach($category->subcategories as $subcategory)
                                                            <li class="level1 nav-6-1 parent item"><a href="{{route('frontend.subcategory',$subcategory->slug)}}"><span>{{$subcategory->name}}</span></a>
                                                                <ul class="level1">
                                                                    @foreach($subcategory->product_lines as $product_line)
                                                                    <li class="level2 nav-6-1-1"><a href="{{route('frontend.product_line',$product_line->slug)}}"><span>{{$product_line->name}}</span></a></li>
                                                                    @endforeach
                                                                </ul>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!--level0-wrapper2-->

                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                    <li class="mega-menu"> <a class="level-top" href="grid.html"><span>Contact Us</span></a> </li>
                                </ul>
                                <!--nav-->
                            </div>
                        </nav>
                    </div>
                    <!--row-->
                </div>
                <div class="fl-header-right">
                    <div class="fl-links">
                        <div class="no-js"> <a title="Company" class="clicker"></a>
                            <div class="fl-nav-links">
                                <div class="language-currency">
                                    <div class="fl-language">
                                        <ul class="lang">
                                            <li><a href="#"> <img src="{{asset('frontend/images/english.png')}}" alt="English"> <span>English</span> </a></li>
                                            <li><a href="#"> <img src="{{asset('frontend/images/francais.png')}}" alt="French"> <span>French</span> </a></li>
                                            <li><a href="#"> <img src="{{asset('frontend/images/german.png')}}" alt="German"> <span>German</span> </a></li>
                                        </ul>
                                    </div>
                                    <!--fl-language-->
                                    <!-- END For version 1,2,3,4,6 -->
                                    <!-- For version 1,2,3,4,6 -->
                                    <div class="fl-currency">
                                        <ul class="currencies_list">
                                            <li><a href="#" title="EGP"> £</a></li>
                                            <li><a href="#" title="EUR"> €</a></li>
                                            <li><a href="#" title="USD"> $</a></li>
                                        </ul>
                                    </div>
                                    <!--fl-currency-->
                                    <!-- END For version 1,2,3,4,6 -->
                                </div>
                                <ul class="links">
                                    <li><a href="dashboard.html" title="My Account">My Account</a></li>
                                    <li><a href="wishlist.html" title="Wishlist">Wishlist</a></li>
                                    <li><a href="checkout.html" title="Checkout">Checkout</a></li>
                                    <li><a href="blog.html" title="Blog"><span>Blog</span></a></li>
                                    @if(!isset(\Illuminate\Support\Facades\Auth::guard('customer')->user()->name))
                                        <li><a href="{{ route('customer.register') }}"> Create Account </a></li>

                                        <li class="last"><a href="{{ route('customer.auth.login') }}">Login</a></li>
                                    @else
                                        <li class="last"><a href="{{ route('customer.auth.logout') }}">Logout</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="fl-cart-contain">
                        <div class="mini-cart">
                            <div class="basket"> <a href="{{route('frontend.cart.index')}}"> </a> </div>
                        </div>
                    </div>
                    <!--mini-cart-->
                    <div class="collapse navbar-collapse">
                        <form class="navbar-form" role="search">
                            <div class="input-group">
                                <input class="GlobalNavSearch js-globalSearchInput " placeholder="Search" id="desktopSearchInput"  data-reactid=".1.0.0.0">
                                <label class="GlobalNavSearch-searchIcon" for="desktopSearchInput" data-reactid=".1.0.0.1"></label>
                            </div>
                        </form>
                    </div>
                    <!--links-->
                </div>
            </div>
        </div>
    </header>

    <div class="content">
        @yield('content')
    </div>


    <!-- For version 1,2,3,4,6 -->
    <div class="footer-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 space">
                    <div class="block1">
                        <strong>New Arriavls</strong>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        <a href="#">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 space thumbnails">
                    <div class="thumbnail_block">
                        <img src="{{asset('frontend/images/chair.jpg')}}" alt="">
                        <div class="caption hovered">
                            <div class="caption-wrapper">
                                <div class="caption-inner">
                                    <h3>Top Collection</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    <p><a href="#">View All</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 space">
                    <div class="block2">
                        <strong>Hot Deal</strong>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        <a href="#">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 space thumbnails">
                    <div class="thumbnail_block">
                        <img src="{{asset('frontend/images/app.jpg')}}" alt="">
                        <div class="caption hovered">
                            <div class="caption-wrapper">
                                <div class="caption-inner">
                                    <h3>Flipmart App</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    <p><a href="#">Download</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <footer>
        <!-- BEGIN INFORMATIVE FOOTER -->
        <div class="footer-inner">
            <div class="newsletter-row">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col">
                            <!-- Footer Payment Link -->
                            <div class="payment-accept">
                                <div><img src="{{asset('frontend/images/payment-1.png')}}" alt="payment1"> <img src="{{asset('frontend/images/payment-2.png')}}" alt="payment2"> <img src="{{asset('frontend/images/payment-3.png')}}" alt="payment3"> <img src="{{asset('frontend/images/payment-4.png')}}" alt="payment4"></div>
                            </div>
                        </div>
                        <!-- Footer Newsletter -->
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 col1">
                            <div class="newsletter-wrap">
                                <h4>Sign up for emails</h4>
                                <form action="#" method="post" id="newsletter-validate-detail1">
                                    <div id="container_form_news">
                                        <div id="container_form_news2">
                                            <input type="text" name="email" id="newsletter1" title="Sign up for our newsletter" class="input-text required-entry validate-email" placeholder="Enter your email address">
                                            <button type="submit" title="Subscribe" class="button subscribe"><span>Subscribe</span></button>
                                        </div>
                                        <!--container_form_news2-->
                                    </div>
                                    <!--container_form_news-->
                                </form>

                            </div>
                            <!--newsletter-wrap-->
                        </div>

                    </div>
                </div>
                <!--footer-column-last-->
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-xs-12 col-lg-4">
                        <div class="co-info">
                            <h4>Contact Us</h4>
                            <address>
                                <div><em class="icon-location-arrow"></em> <span>{{$data['configurations']->address}}</span></div>
                                <div> <em class="icon-mobile-phone"></em><span> {{$data['configurations']->phone}}</span></div>
                                <div> <em class="icon-envelope"></em><span>{{$data['configurations']->email}}</span></div>
                            </address>
                            <div class="social">

                                <ul class="link">
                                    <li class="fb pull-left"><a target="_blank" rel="nofollow" href="{{$data['configurations']->fb_link}}" title="Facebook"></a></li>
                                    <li class="tw pull-left"><a target="_blank" rel="nofollow" href="{{$data['configurations']->twitter_link}}" title="Twitter"></a></li>
                                    <li class="linkedin pull-left"><a target="_blank" rel="nofollow" href="{{$data['configurations']->insta_link}}" title="Instagram"></a></li>
                                    <li class="youtube pull-left"><a target="_blank" rel="nofollow" href="{{$data['configurations']->youtube_link}}" title="Youtube"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-8 col-xs-12 col-lg-8">
                        <div class="footer-column">
                            <h4>Customer Service</h4>
                            <ul class="links">
                                <li class="first"><a href="#" title="Contact us">My Account</a></li>
                                <li><a href="#" title="About us">Order History</a></li>
                                <li><a href="#" title="faq">FAQ</a></li>
                                <li><a href="#" title="Popular Searches">Specials</a></li>
                                <li class="last"><a href="#" title="Where is my order?">Help Center</a></li>

                            </ul>
                        </div>
                        <div class="footer-column">
                            <h4>Corporation</h4>
                            <ul class="links">
                                <li class="first"><a title="Your Account" href="#">About us</a></li>
                                <li><a title="Information" href="#">Customer Service</a></li>
                                <li><a title="Addresses" href="#">Company</a></li>
                                <li><a title="Addresses" href="#">Investor Relations</a></li>
                                <li class="last"><a title="Orders History" href="#">Advanced Search</a></li>

                            </ul>
                        </div>
                        <div class="footer-column">
                            <h4>Why choose Us</h4>
                            <ul class="links">
                                <li class="first"><a href="#" title="About us">Shopping Guide</a></li>
                                <li><a href="#" title="Blog">Blog</a></li>
                                <li><a href="#" title="Company">Company</a></li>
                                <li><a href="#" title="Investor Relations">Investor Relations</a></li>
                                <li class=" last"><a href="contact-us.html" title="Suppliers">Contact Us</a></li>
                            </ul>
                        </div>




                    </div>

                    <!--col-sm-12 col-xs-12 col-lg-8-->
                    <!--col-xs-12 col-lg-4-->
                </div>
                <!--row-->

            </div>

            <!--container-->
        </div>
        <!--footer-inner-->

        <div class="footer-middle">
            <div class="container">
                <div class="row">
                    <div class="our-features-box wow bounceInUp animated animated">
                        <div class="container">
                            <ul>
                                <li>
                                    <div class="feature-box free-shipping">
                                        <div class="icon-truck"></div>
                                        <div class="content">Free Shipping on order over $99</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="feature-box need-help">
                                        <div class="icon-support"></div>
                                        <div class="content">Need Help +(888) 123-4567</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="feature-box money-back">
                                        <div class="icon-money"></div>
                                        <div class="content">Money Back Guarantee</div>
                                    </div>
                                </li>
                                <li class="last">
                                    <div class="feature-box return-policy">
                                        <div class="icon-return"></div>
                                        <div class="content">30 days return Service</div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--row-->
            </div>
            <!--container-->
        </div>

        <!-- BEGIN SIMPLE FOOTER -->
    </footer>
    <!-- End For version 1,2,3,4,6 -->

</div>
<!--page-->
<!-- Mobile Menu-->
<div id="mobile-menu">
    <ul class="mobile-menu">

        <li>
            <div class="home"><a href="#"><i class="icon-home"></i>Home</a> </div>
        </li>
        <li><span class="expand fa fa-plus"></span><a href="#">Pages</a>
            <ul>
                <li><a href="grid.html">Grid</a> </li>
                <li> <a href="list.html">List</a> </li>
                <li> <a href="product-detail.html">Product Detail</a> </li>
                <li> <a href="shopping-cart.html">Shopping Cart</a> </li>
                <li><span class="expand fa fa-plus"></span><a href="checkout.html">Checkout</a>
                    <ul>
                        <li><a href="checkout-method.html">Checkout Method</a> </li>
                        <li><a href="checkout-billing-info.html">Checkout Billing Info</a> </li>
                    </ul>
                </li>
                <li> <a href="wishlist.html">Wishlist</a> </li>
                <li> <a href="dashboard.html">Dashboard</a> </li>
                <li> <a href="multiple-addresses.html">Multiple Addresses</a> </li>
                <li> <a href="about-us.html">About us</a> </li>
                <li><span class="expand fa fa-plus"></span><a href="blog.html">Blog</a>
                    <ul>
                        <li><a href="blog-detail.html">Blog Detail</a> </li>
                    </ul>
                </li>
                <li><a href="contact-us.html">Contact us</a> </li>
                <li><a href="404error.html">404 Error Page</a> </li>
            </ul>
        </li>
        <li><span class="expand fa fa-plus"></span><a href="#">Women</a>
            <ul>
                <li><span class="expand fa fa-plus"></span> <a href="#" class="">Stylish Bag</a>
                    <ul>
                        <li> <a href="#" class="">Clutch Handbags</a> </li>
                        <li> <a href="#l" class="">Diaper Bags</a> </li>
                        <li> <a href="#" class="">Bags</a> </li>
                        <li> <a href="#" class="">Hobo handbags</a> </li>
                    </ul>
                </li>
                <li><span class="expand fa fa-plus"></span> <a href="#">Material Bag</a>
                    <ul>
                        <li> <a href="#">Beaded Handbags</a> </li>
                        <li> <a href="#">Fabric Handbags</a> </li>
                        <li> <a href="#">Handbags</a> </li>
                        <li> <a href="#">Leather Handbags</a> </li>
                    </ul>
                </li>
                <li><span class="expand fa fa-plus"></span> <a href="#">Shoes</a>
                    <ul>
                        <li> <a href="#">Flat Shoes</a> </li>
                        <li> <a href="#">Flat Sandals</a> </li>
                        <li> <a href="#">Boots</a> </li>
                        <li> <a href="#">Heels</a> </li>
                    </ul>
                </li>
                <li><span class="expand fa fa-plus"></span> <a href="#">Jwellery</a>
                    <ul>
                        <li> <a href="#">Bracelets</a> </li>
                        <li> <a href="#">Necklaces &amp; Pendent</a> </li>
                        <li> <a href="#l">Pendants</a> </li>
                        <li> <a href="#">Pins &amp; Brooches</a> </li>
                    </ul>
                </li>
                <li><span class="expand fa fa-plus"></span> <a href="#">Dresses</a>
                    <ul>
                        <li> <a href="#">Casual Dresses</a> </li>
                        <li> <a href="#">Evening</a> </li>
                        <li> <a href="#">Designer</a> </li>
                        <li> <a href="#">Party</a> </li>
                    </ul>
                </li>
                <li><span class="expand fa fa-plus"></span> <a href="#">Swimwear</a>
                    <ul>
                        <li> <a href="#">Swimsuits</a> </li>
                        <li> <a href="#">Beach Clothing</a> </li>
                        <li> <a href="#">Clothing</a> </li>
                        <li> <a href="#">Bikinis</a> </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li><span class="expand fa fa-plus"></span><a href="#">Men</a>
            <ul>
                <li><span class="expand fa fa-plus"></span> <a href="#" class="">Shoes</a>
                    <ul class="level1">
                        <li class="level2 nav-6-1-1"><a href="#">Sport Shoes</a> </li>
                        <li class="level2 nav-6-1-1"><a href="#">Casual Shoes</a> </li>
                        <li class="level2 nav-6-1-1"><a href="#">Leather Shoes</a> </li>
                        <li class="level2 nav-6-1-1"><a href="#">canvas shoes</a> </li>
                    </ul>
                </li>
                <li><span class="expand fa fa-plus"></span> <a href="#">Dresses</a>
                    <ul class="level1">
                        <li class="level2 nav-6-1-1"><a href="#">Casual Dresses</a> </li>
                        <li class="level2 nav-6-1-1"><a href="#">Evening</a> </li>
                        <li class="level2 nav-6-1-1"><a href="#">Designer</a> </li>
                        <li class="level2 nav-6-1-1"><a href="#">Party</a> </li>
                    </ul>
                </li>
                <li><span class="expand fa fa-plus"></span> <a href="#">Jackets</a>
                    <ul class="level1">
                        <li class="level2 nav-6-1-1"><a href="#">Coats</a> </li>
                        <li class="level2 nav-6-1-1"><a href="#">Formal Jackets</a> </li>
                        <li class="level2 nav-6-1-1"><a href="#">Leather Jackets</a> </li>
                        <li class="level2 nav-6-1-1"><a href="#">Blazers</a> </li>
                    </ul>
                </li>
                <li><span class="expand fa fa-plus"></span> <a href="#">Watches</a>
                    <ul class="level1">
                        <li class="level2 nav-6-1-1"><a href="#">Fasttrack</a> </li>
                        <li class="level2 nav-6-1-1"><a href="#">Casio</a> </li>
                        <li class="level2 nav-6-1-1"><a href="#">Titan</a> </li>
                        <li class="level2 nav-6-1-1"><a href="#">Tommy-Hilfiger</a> </li>
                    </ul>
                </li>
                <li><span class="expand fa fa-plus"></span> <a href="#">Sunglasses</a>
                    <ul class="level1">
                        <li class="level2 nav-6-1-1"><a href="#">Ray Ban</a> </li>
                        <li class="level2 nav-6-1-1"><a href="#">Fasttrack</a> </li>
                        <li class="level2 nav-6-1-1"><a href="#">Police</a> </li>
                        <li class="level2 nav-6-1-1"><a href="#">Oakley</a> </li>
                    </ul>
                </li>
                <li><span class="expand fa fa-plus"></span> <a href="#">Accesories</a>
                    <ul class="level1">
                        <li class="level2 nav-6-1-1"><a href="#">Backpacks</a> </li>

                        <li class="level2 nav-6-1-1"><a href="#">Wallets</a> </li>
                        <li class="level2 nav-6-1-1"><a href="#">Laptops Bags</a> </li>
                        <li class="level2 nav-6-1-1"><a href="#">Belts</a> </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li><span class="expand fa fa-plus"></span><a href="#">Electronics</a>
            <ul>
                <li><span class="expand fa fa-plus"></span> <a href="#"><span>Mobiles</span></a>
                    <ul>
                        <li> <a href="#"><span>Samsung</span></a> </li>
                        <li> <a href="#"><span>Nokia</span></a> </li>
                        <li> <a href="#"><span>IPhone</span></a> </li>
                        <li> <a href="#"><span>Sony</span></a> </li>
                    </ul>
                </li>
                <li><span class="expand fa fa-plus"></span> <a href="#" class=""><span>Accesories</span></a>
                    <ul>
                        <li> <a href="#"><span>Mobile Memory Cards</span></a> </li>
                        <li> <a href="#"><span>Cases &amp; Covers</span></a> </li>
                        <li> <a href="#"><span>Mobile Headphones</span></a> </li>
                        <li> <a href="#"><span>Bluetooth Headsets</span></a> </li>
                    </ul>
                </li>
                <li><span class="expand fa fa-plus"></span> <a href="#"><span>Cameras</span></a>
                    <ul>
                        <li> <a href="#"><span>Camcorders</span></a> </li>
                        <li> <a href="#"><span>Point &amp; Shoot</span></a> </li>
                        <li> <a href="#"><span>Digital SLR</span></a> </li>
                        <li> <a href="#"><span>Camera Accesories</span></a> </li>
                    </ul>
                </li>
                <li><span class="expand fa fa-plus"></span> <a href="#"><span>Audio &amp; Video</span></a>
                    <ul>
                        <li> <a href="#"><span>MP3 Players</span></a> </li>
                        <li> <a href="#"><span>IPods</span></a> </li>
                        <li> <a href="#"><span>Speakers</span></a> </li>
                        <li> <a href="#"><span>Video Players</span></a> </li>
                    </ul>
                </li>
                <li><span class="expand fa fa-plus"></span> <a href="#"><span>Computer</span></a>
                    <ul>
                        <li> <a href="#"><span>External Hard Disk</span></a> </li>
                        <li> <a href="#"><span>Pendrives</span></a> </li>
                        <li> <a href="#"><span>Headphones</span></a> </li>
                        <li> <a href="#"><span>PC Components</span></a> </li>
                    </ul>
                </li>
                <li><span class="expand fa fa-plus"></span> <a href="#"><span>Appliances</span></a>
                    <ul>
                        <li> <a href="#"><span>Vaccum Cleaners</span></a> </li>
                        <li> <a href="#"><span>Indoor Lighting</span></a> </li>
                        <li> <a href="#"><span>Kitchen Tools</span></a> </li>
                        <li> <a href="#"><span>Water Purifier</span></a> </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li><a href="#">Furniture</a> </li>
        <li><a href="#">Kids</a> </li>
        <li><a href="contact-us.html">Contact Us</a> </li>
    </ul>
</div>


<!-- JavaScript -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
<script type="text/javascript" src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/revslider.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/common.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/countdown.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/jquery.bxslider.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/jquery.mobile-menu.min.js')}}"></script>
<script type="text/javascript">
    var dthen1 = new Date("12/25/17 11:59:00 PM");
    start = "05/03/15 03:02:11 AM";
    start_date = Date.parse(start);
    var dnow1 = new Date(start_date);
    if (CountStepper > 0)
        ddiff = new Date((dnow1) - (dthen1));
    else
        ddiff = new Date((dthen1) - (dnow1));
    gsecs1 = Math.floor(ddiff.valueOf() / 1000);

    var iid1 = "countbox_1";
    CountBack_slider(gsecs1, "countbox_1", 1);

    var dthen1 = new Date("12/12/17 11:59:00 PM");
    start = "01/20/16 03:02:11 AM";
    start_date = Date.parse(start);
    var dnow1 = new Date(start_date);
    if (CountStepper > 0)
        ddiff = new Date((dnow1) - (dthen1));
    else
        ddiff = new Date((dthen1) - (dnow1));
    gsecs1 = Math.floor(ddiff.valueOf() / 1000);

    var iid1 = "countbox_2";
    CountBack_slider(gsecs1, "countbox_2", 1);
</script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('#thm-rev-slider').show().revolution({
            dottedOverlay: 'none',
            delay: 5000,
            startwidth: 0,
            startheight:820,

            hideThumbs: 200,
            thumbWidth: 200,
            thumbHeight: 50,
            thumbAmount: 2,

            navigationType: 'thumb',
            navigationArrows: 'solo',
            navigationStyle: 'round',

            touchenabled: 'on',
            onHoverStop: 'on',

            swipe_velocity: 0.7,
            swipe_min_touches: 1,
            swipe_max_touches: 1,
            drag_block_vertical: false,

            spinner: 'spinner0',
            keyboardNavigation: 'off',

            navigationHAlign: 'center',
            navigationVAlign: 'bottom',
            navigationHOffset: 0,
            navigationVOffset: 20,

            soloArrowLeftHalign: 'left',
            soloArrowLeftValign: 'center',
            soloArrowLeftHOffset: 20,
            soloArrowLeftVOffset: 0,

            soloArrowRightHalign: 'right',
            soloArrowRightValign: 'center',
            soloArrowRightHOffset: 20,
            soloArrowRightVOffset: 0,

            shadow: 0,
            fullWidth: 'on',
            fullScreen: 'on',

            stopLoop: 'off',
            stopAfterLoops: -1,
            stopAtSlide: -1,

            shuffle: 'off',

            autoHeight: 'on',
            forceFullWidth: 'off',
            fullScreenAlignForce: 'off',
            minFullScreenHeight: 0,
            hideNavDelayOnMobile: 1500,

            hideThumbsOnMobile: 'off',
            hideBulletsOnMobile: 'off',
            hideArrowsOnMobile: 'off',
            hideThumbsUnderResolution: 0,

            hideSliderAtLimit: 0,
            hideCaptionAtLimit: 0,
            hideAllCaptionAtLilmit: 0,
            startWithSlide: 0,
            fullScreenOffsetContainer: ''
        });
    });
</script>
@yield('js')
</body>
</html>
