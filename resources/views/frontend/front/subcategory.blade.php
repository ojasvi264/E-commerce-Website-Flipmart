@extends('layouts.frontend')
@section('title',$data['subcategory'][0]->name . ',')
@section('content')
    <div class="page-heading">
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div>
                        <ul>
                            <li class="home"> <a href="{{route('frontend.index')}}" title="Go to Home Page">Home</a> <span>&rsaquo; </span> </li>
                            <li class="home"> <a href="{{route('frontend.category',$data['category']->slug)}}" title="Go to Category Page">{{$data['category']->name}}</a> <span>&rsaquo; </span> </li>
                            <li class="subcategory1601"> <strong>{{$data['subcategory'][0]->name}}</strong> </li>
                        </ul>
                    </div>
                    <!--col-xs-12-->


                    <div class="page-title">
                        <h2>{{$data['subcategory'][0]->name}}</h2>
                    </div>
                    <!--row-->
                </div>
            </div>
            <!--container-->
        </div>
    </div>
    <!--breadcrumbs-->
    <!-- BEGIN Main Container col2-left -->
    <section class="main-container col2-left-layout bounceInUp animated">
        <!-- For version 1, 2, 3, 8 -->
        <!-- For version 1, 2, 3 -->
        <div class="container">
            <div class="row">
                <div class="col-main product-grid">
                    <div class="pro-coloumn">
                        <article class="col-main">
                            <div class="toolbar">
                                <div class="pager">
                                    <div id="sort-by">
                                        <label class="left">Sort By: </label>
                                        <ul>
                                            <li><a href="#">Position<span class="right-arrow"></span></a>
                                                <ul>
                                                    <li><a href="#">Name</a></li>
                                                    <li><a href="#">Price</a></li>
                                                    <li><a href="#">Position</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="pages">
                                        {{$data['products']->links()}}
                                    </div>
                                </div>
                                <div class="sorter">
                                    <div class="view-mode"> <span title="Grid" class="button button-active button-grid">Grid</span><a href="list.html" title="List" class="button-list">List</a> </div>
                                </div>


                            </div>
                            <div class="subcategory-products">
                                <ul class="products-grid">
                                    @foreach($data['products'] as $product)
                                        @php($image = $product->images->first())

                                        <li class="item col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="item-inner">
                                            <div class="item-img">
                                                <div class="item-img-info"><a href="{{route('frontend.product',$product->slug)}}" title="{{$product->name}}" class="product-image"><img  @if ( isset($image) && !empty($image->image))src="{{asset('images/product/' . $image->image)}}" @else  src="{{asset('images/products-images/p1.jpg')}}" @endif alt="Retis lapen casen"></a>

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
                                                    <div class="item-title"><a href="{{route('frontend.product',$product->slug)}}" title="Retis lapen casen">{{$product->name}}</a> </div>
                                                    <div class="item-content">
                                                        <div class="item-price">
                                                            <div class="price-box"><span class="regular-price" ><span class="price">{{$product->price}}</span> </span> </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="toolbar">


                                <div class="pager">

                                    <div class="pages">
                                        {{$data['products']->links()}}
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <!--	///*///======    End article  ========= //*/// -->
                </div>

            </div>
            <!--row-->
        </div>
    </section>
@endsection
