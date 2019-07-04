@extends('layouts.frontend')

@section('content')
    <div id="tmg-slideshow" class="tmg-slideshow">
        <div class="container">
            <div id='thm_slider_wrapper' class='thm_slider_wrapper fullwidthbanner-container' >
                <div id='thm-rev-slider' class='rev_slider fullwidthabanner'>
                    <ul>
                        <li data-transition='random' data-slotamount='7' data-masterspeed='1000' data-thumb='{{asset('frontend/images/slide-img2.jpg')}}'><img src="{{asset('frontend/images/slide-img2.jpg')}}"  data-bgposition='left top'  data-bgfit='cover' data-bgrepeat='no-repeat' alt="slider-image1" />
                            <div class="info">
                                <div class='tp-caption LargeTitle sfl  tp-resizeme ' data-x='0'  data-y='230'  data-endspeed='500'  data-speed='500' data-start='1300' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:3;white-space:nowrap;'><span>Awesome Design</span></div>
                                <div class='tp-caAption sfb  tp-resizeme ' data-x='0'  data-y='420'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4;white-space:nowrap;'><a href='#' class="buy-btn">Shop Now</a></div>
                                <div    class='tp-caption Title sft  tp-resizeme ' data-x='0'  data-y='320'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Power2.easeInOut' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4;white-space:nowrap;'>Pellentesque habitant morbi tristique <br> senectus et netus et malesuada</div>
                            </div>
                        </li>
                        <li data-transition='random' data-slotamount='7' data-masterspeed='1000' data-thumb='{{asset('frontend/images/slide-img1.jpg')}}'><img src="{{asset('frontend/images/slide-img1.jpg')}}"  data-bgposition='left top'  data-bgfit='cover' data-bgrepeat='no-repeat' alt="slider-image2"  />
                            <div class="info">
                                <div class='tp-caption LargeTitle sfl  tp-resizeme ' data-x='0'  data-y='230'  data-endspeed='500'  data-speed='500' data-start='1300' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:3;mwhite-space:nowrap;'><span>Flipmart Hot Collection</span></div>
                                <div class='tp-caption sfb  tp-resizeme ' data-x='0'  data-y='420'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4;white-space:nowrap;'><a href='#' class="buy-btn">Shop Now</a></div>
                                <div    class='tp-caption Title sft  tp-resizeme ' data-x='0'  data-y='320'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Power2.easeInOut' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4;white-space:nowrap;'>Pellentesque habitant morbi tristique <br> senectus et netus et malesuada</div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>






    <!--Category slider Start-->
    <div class="CollectionGrid-container">
        <div class="CollectionGrid container">
            <a class="CollectionGrid-tile hover-overlay-light" href="#">
                <div class="CollectionGrid-tileImage align-center">
                    <img src="{{asset('frontend/products-images/bags.jpg')}}" alt="bags">
                </div>
                <div class="CollectionGrid-tileName js-dotdotdot">
                    Handbags
                </div>
            </a>
            <a class="CollectionGrid-tile hover-overlay-light" href="#">
                <div class="CollectionGrid-tileImage align-center">
                    <img src="{{asset('frontend/products-images/light.jpg')}}" alt="bags">
                </div>
                <div class="CollectionGrid-tileName js-dotdotdot">
                    Lighting
                </div>
            </a><a class="CollectionGrid-tile hover-overlay-light" href="#">
                <div class="CollectionGrid-tileImage align-center">
                    <img src="{{asset('frontend/products-images/kids.jpg')}}" alt="bags">
                </div>
                <div class="CollectionGrid-tileName js-dotdotdot">
                    Kids
                </div>
            </a><a class="CollectionGrid-tile hover-overlay-light" href="#">
                <div class="CollectionGrid-tileImage align-center">
                    <img src="{{asset('frontend/products-images/watch.jpg')}}" alt="bags">
                </div>
                <div class="CollectionGrid-tileName js-dotdotdot">
                    Watches
                </div>
            </a><a class="CollectionGrid-tile hover-overlay-light" href="#">
                <div class="CollectionGrid-tileImage align-center">
                    <img src="{{asset('frontend/products-images/kichen.jpg')}}" alt="bags">
                </div>
                <div class="CollectionGrid-tileName js-dotdotdot">
                    kitchen
                </div>
            </a>
        </div>
    </div>
    <!--Category silder End-->






    <!-- best Pro Slider -->
    <section class=" wow bounceInUp animated">
        <div class="best-pro slider-items-products container">
            <div class="new_title">
                <h2>Best Seller</h2>
            </div>

            <div id="best-seller" class="product-flexslider hidden-buttons">
                <div class="slider-items slider-width-col4 products-grid">
                    <div class="item">
                        <div class="item-inner">
                            <div class="item-img">
                                <div class="item-img-info"><a href="product-detail.html" title="Retis lapen casen" class="product-image"><img src="{{asset('frontend/products-images/p1.jpg')}}" alt="Retis lapen casen"></a>

                                    <div class="item-box-hover">
                                        <div class="box-inner">
                                            <div class="product-detail-bnt"><a class="button detail-bnt"><span>Quick View</span></a></div>
                                            <div class="actions"><span class="add-to-links"><a href="#" class="link-wishlist" title="Add to Wishlist"><span>Add to Wishlist</span></a> <a href="#" class="link-compare add_to_compare" title="Add to Compare"><span>Add to Compare</span></a></span> </div>
                                            <div class="add_cart">
                                                <button class="button btn-cart" type="button"><span>Add to Cart</span></button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item-info">
                                <div class="info-inner">
                                    <div class="item-title"><a href="product-detail.html" title="Retis lapen casen">Retis lapen casen</a> </div>
                                    <div class="item-content">
                                        <div class="rating">
                                            <div class="ratings">
                                                <div class="rating-box">
                                                    <div class="rating" style="width:80%"></div>
                                                </div>
                                                <p class="rating-links"><a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                            </div>
                                        </div>
                                        <div class="item-price">
                                            <div class="price-box"><span class="regular-price" ><span class="price">$125</span> </span> </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Item -->
                    <div class="item">
                        <div class="item-inner">
                            <div class="item-img">
                                <div class="item-img-info"><a href="product-detail.html" title="Retis lapen casen" class="product-image"><img src="{{asset('frontend/products-images/p2.jpg')}}" alt="Retis lapen casen"></a>

                                    <div class="item-box-hover">
                                        <div class="box-inner">
                                            <div class="product-detail-bnt"><a class="button detail-bnt"><span>Quick View</span></a></div>
                                            <div class="actions"><span class="add-to-links"><a href="#" class="link-wishlist" title="Add to Wishlist"><span>Add to Wishlist</span></a> <a href="#" class="link-compare add_to_compare" title="Add to Compare"><span>Add to Compare</span></a></span> </div>
                                            <div class="add_cart">
                                                <button class="button btn-cart" type="button"><span>Add to Cart</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item-info">
                                <div class="info-inner">
                                    <div class="item-title"><a href="product-detail.html" title="Retis lapen casen">Retis lapen casen</a> </div>
                                    <div class="item-content">
                                        <div class="rating">
                                            <div class="ratings">
                                                <div class="rating-box">
                                                    <div class="rating" style="width:80%"></div>
                                                </div>
                                                <p class="rating-links"><a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                            </div>
                                        </div>
                                        <div class="item-price">
                                            <div class="price-box"><span class="regular-price" ><span class="price">$125</span> </span> </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Item -->

                    <!-- Item -->
                    <div class="item">
                        <div class="item-inner">
                            <div class="item-img">
                                <div class="item-img-info"><a href="product-detail.html" title="Retis lapen casen" class="product-image"><img src="{{asset('frontend/products-images/p3.jpg')}}" alt="Retis lapen casen"></a>
                                    <div class="sale-label sale-top-left">Sale</div>
                                    <div class="item-box-hover">
                                        <div class="box-inner">
                                            <div class="product-detail-bnt"><a class="button detail-bnt"><span>Quick View</span></a></div>
                                            <div class="actions"><span class="add-to-links"><a href="#" class="link-wishlist" title="Add to Wishlist"><span>Add to Wishlist</span></a> <a href="#" class="link-compare add_to_compare" title="Add to Compare"><span>Add to Compare</span></a></span> </div>
                                            <div class="add_cart">
                                                <button class="button btn-cart" type="button"><span>Add to Cart</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item-info">
                                <div class="info-inner">
                                    <div class="item-title"><a href="product-detail.html" title="Retis lapen casen">Retis lapen casen</a> </div>
                                    <div class="item-content">
                                        <div class="rating">
                                            <div class="ratings">
                                                <div class="rating-box">
                                                    <div class="rating" style="width:80%"></div>
                                                </div>
                                                <p class="rating-links"><a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                            </div>
                                        </div>
                                        <div class="item-price">
                                            <div class="price-box"><span class="regular-price" ><span class="price">$125</span> </span> </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Item -->

                    <div class="item">
                        <div class="item-inner">
                            <div class="item-img">
                                <div class="item-img-info"><a href="product-detail.html" title="Retis lapen casen" class="product-image"><img src="{{asset('frontend/products-images/p4.jpg')}}" alt="Retis lapen casen"></a>

                                    <div class="item-box-hover">
                                        <div class="box-inner">
                                            <div class="product-detail-bnt"><a class="button detail-bnt"><span>Quick View</span></a></div>
                                            <div class="actions"><span class="add-to-links"><a href="#" class="link-wishlist" title="Add to Wishlist"><span>Add to Wishlist</span></a> <a href="#" class="link-compare add_to_compare" title="Add to Compare"><span>Add to Compare</span></a></span> </div>
                                            <div class="add_cart">
                                                <button class="button btn-cart" type="button"><span>Add to Cart</span></button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item-info">
                                <div class="info-inner">
                                    <div class="item-title"><a href="product-detail.html" title="Retis lapen casen">Retis lapen casen</a> </div>
                                    <div class="item-content">
                                        <div class="rating">
                                            <div class="ratings">
                                                <div class="rating-box">
                                                    <div class="rating" style="width:80%"></div>
                                                </div>
                                                <p class="rating-links"><a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                            </div>
                                        </div>
                                        <div class="item-price">
                                            <div class="price-box"><span class="regular-price" ><span class="price">$125</span> </span> </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Item -->
                    <div class="item">
                        <div class="item-inner">
                            <div class="item-img">
                                <div class="item-img-info"><a href="product-detail.html" title="Retis lapen casen" class="product-image"><img src="{{asset('frontend/products-images/p5.jpg')}}" alt="Retis lapen casen"></a>

                                    <div class="item-box-hover">
                                        <div class="box-inner">
                                            <div class="product-detail-bnt"><a class="button detail-bnt"><span>Quick View</span></a></div>
                                            <div class="actions"><span class="add-to-links"><a href="#" class="link-wishlist" title="Add to Wishlist"><span>Add to Wishlist</span></a> <a href="#" class="link-compare add_to_compare" title="Add to Compare"><span>Add to Compare</span></a></span> </div>
                                            <div class="add_cart">
                                                <button class="button btn-cart" type="button"><span>Add to Cart</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item-info">
                                <div class="info-inner">
                                    <div class="item-title"><a href="product-detail.html" title="Retis lapen casen">Retis lapen casen</a> </div>
                                    <div class="item-content">
                                        <div class="rating">
                                            <div class="ratings">
                                                <div class="rating-box">
                                                    <div class="rating" style="width:80%"></div>
                                                </div>
                                                <p class="rating-links"><a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                            </div>
                                        </div>
                                        <div class="item-price">
                                            <div class="price-box"><span class="regular-price" ><span class="price">$125</span> </span> </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Item -->

                    <!-- Item -->
                    <div class="item">
                        <div class="item-inner">
                            <div class="item-img">
                                <div class="item-img-info"><a href="product-detail.html" title="Retis lapen casen" class="product-image"><img src="{{asset('frontend/products-images/p6.jpg')}}" alt="Retis lapen casen"></a>

                                    <div class="item-box-hover">
                                        <div class="box-inner">
                                            <div class="product-detail-bnt"><a class="button detail-bnt"><span>Quick View</span></a></div>
                                            <div class="actions"><span class="add-to-links"><a href="#" class="link-wishlist" title="Add to Wishlist"><span>Add to Wishlist</span></a> <a href="#" class="link-compare add_to_compare" title="Add to Compare"><span>Add to Compare</span></a></span> </div>
                                            <div class="add_cart">
                                                <button class="button btn-cart" type="button"><span>Add to Cart</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item-info">
                                <div class="info-inner">
                                    <div class="item-title"><a href="product-detail.html" title="Retis lapen casen">Retis lapen casen</a> </div>
                                    <div class="item-content">
                                        <div class="rating">
                                            <div class="ratings">
                                                <div class="rating-box">
                                                    <div class="rating" style="width:80%"></div>
                                                </div>
                                                <p class="rating-links"><a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                            </div>
                                        </div>
                                        <div class="item-price">
                                            <div class="price-box"><span class="regular-price" ><span class="price">$125</span> </span> </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Item -->
                </div>
            </div>
        </div>
    </section>


    <!-- best Pro Slider -->




    <!-- Home Lastest Blog Block -->
    <div class="latest-blog wow bounceInUp animated animated container">
        <!--exclude For version 6 -->
        <div class="new_title">
            <h2>Latest Blog</h2>
        </div>
        <!--blog-title-->
        <!--For version 1,2,3,4,5,6,8 -->

        <div class="blog_block">
            <div class="blog_block_inner">
                <div class="col-lg-6 col-md-6 col-xs-12 col-sm-6 blog-post">
                    <div class="blog_inner">
                        <div class="blog-img"> <a href="blog-detail.html"> <img src="{{asset('frontend/images/blog-img1.jpg')}}" alt="blog image"> </a>
                            <div class="mask"> <a class="info" href="blog-detail.html">Read More</a> </div>
                        </div>
                        <!--blog-img-->
                        <div class="blog-info">
                            <div class="post-date">
                                <time class="entry-date" datetime="2015-05-11T11:07:27+00:00"><span>19</span> <br> March</time>
                            </div>
                            <h3><a href="blog-detail.html">Lorem ipsum dolor sit amet, consectetur adipiscing</a></h3>
                            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada ...</p>
                            <a class="readmore" href="blog-detail.html">Read More</a> </div>
                    </div>
                    <!--blog_inner-->
                </div>
                <!--col-lg-4 col-md-4 col-xs-12 col-sm-4-->
                <div class="col-lg-6 col-md-6 col-xs-12 col-sm-6 blog-post">
                    <div class="blog_inner">
                        <div class="blog-img"> <a href="blog-detail.html"> <img src="{{asset('frontend/images/blog-img2.jpg')}}" alt="blog image"> </a>
                            <div class="mask"> <a class="info" href="blog-detail.html">Read More</a> </div>
                        </div>
                        <!--blog-img-->
                        <div class="blog-info">
                            <div class="post-date">
                                <time class="entry-date" datetime="2015-05-11T11:07:27+00:00"><span>21</span> <br> March</time>
                            </div>
                            <h3><a href="blog-detail.html">Lorem ipsum dolor sit amet, consectetur adipiscing</a></h3>

                            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada ...</p>
                            <a class="readmore" href="blog-detail.html">Read More</a> </div>
                    </div>
                    <!--blog_inner-->
                </div>
            </div>
        </div>



        <!--END For version 1,2,3,4,5,6,8 -->
        <!--exclude For version 6 -->
        <!--container-->
    </div>

    <!-- Logo Brand Block -->
    <div class="brand-logo wow bounceInUp animated">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 testimonials-section">
                    <div class="">
                        <ul class="bxslider">
                            <li>
                                <div class="avatar"><img src="{{asset('frontend/images/member1')}}" alt="Image"></div>
                                <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                <div class="clients_author">John Doe	<span>Abc Company</span>	</div>
                            </li>
                            <li>
                                <div class="avatar"><img src="{{asset('frontend/images/member2')}}" alt="Image"></div>
                                <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                <div class="clients_author">Saraha Smith	<span>Datsun & Co</span>	</div>
                            </li>
                            <li>
                                <div class="avatar"><img src="{{asset('frontend/images/member3')}}" alt="Image"></div>
                                <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                <div class="clients_author">Stephen Doe	<span>Xperia Designs</span>	</div>
                            </li>

                        </ul>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 offer-slider">
                    <div class="left-coloum-hot">
                        <div class="deal_img"><img src="{{asset('frontend/images/hot_img')}}" alt="">
                        </div>
                        <div class="deal_info">
                            <h2><a href="#">Wall Pendent Lamp</a></h2>
                            <div class="starSeparator"></div>
                            <p>Flipmart lighting store is updated regularly with offers.</p>
                            <div class="rating">
                                <div class="ratings">
                                    <div class="rating-box">
                                        <div class="rating" style="width:80%"></div>
                                    </div>
                                    <p class="rating-links"><a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                </div>
                            </div>




                        </div>
                    </div>
                    <div class="box-timer">
                        <div class="countbox_1 timer-grid"></div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    @endsection