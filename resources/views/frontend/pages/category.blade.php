@extends('frontend.layouts.index')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Sản phẩm</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{url('shoesstore')}}">Home</a> / <span>Sản phẩm </span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">
    <div id="content"
         class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-3">
                    <ul class="aside-menu">
                        @foreach($categories as $categories)
                        <li><a href="{{url('shoesstore/categories', $categories->id)}}">{{$categories->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-sm-9">
                    <div class="beta-products-list">
                        <h4>New Products</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">{{count($product_category)}} items found</p>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                            @foreach($product_category as $product_category)
                            <div class="col-sm-4">
                                <div class="single-item">
                                    @if($product_category->price_promotion!=0)
                                    <div class="ribbon-wrapper">
                                        <div class="ribbon sale">Sale</div>
                                    </div>
                                    @endif
                                    <div class="single-item-header">
                                        <a href="{{url('shoesstore/productDetails', $product_category->id)}}"><img
                                                 src="{{url('image', $product_category->image)}}"
                                                 alt=""></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$product_category->name}}</p>
                                        <p class="single-item-price">
                                            @if($product_category->price_promotion == 0)
                                            <span class="flash-sale">{{$product_category->price}}</span>
                                            @else
                                            <span class="flash-del">{{$product_category->price}}</span>
                                            <span class="flash-sale">{{$product_category->price_promotion}}</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left"
                                           href="{{url('shoesstore/addToCart', $product_category->id)}}"><i
                                               class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary"
                                           href="product.html">Details <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div> <!-- .beta-products-list -->

                    <div class="space50">&nbsp;</div>

                    <!-- <div class="beta-products-list">
                        <h4>Top Products</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">438 styles found</p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="single-item">
                                    <div class="single-item-header">
                                        <a href="product.html"><img src="{{url('assets/dest/images/products/1.jpg')}}"
                                                 alt=""></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">Sample Woman Top</p>
                                        <p class="single-item-price">
                                            <span>$34.55</span>
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left"
                                           href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary"
                                           href="product.html">Details <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="single-item">
                                    <div class="single-item-header">
                                        <a href="product.html"><img src="{{url('assets/dest/images/products/1.jpg')}}"
                                                 alt=""></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">Sample Woman Top</p>
                                        <p class="single-item-price">
                                            <span>$34.55</span>
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left"
                                           href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary"
                                           href="product.html">Details <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="single-item">
                                    <div class="single-item-header">
                                        <a href="product.html"><img src="{{url('assets/dest/images/products/1.jpg')}}"
                                                 alt=""></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">Sample Woman Top</p>
                                        <p class="single-item-price">
                                            <span>$34.55</span>
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left"
                                           href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary"
                                           href="product.html">Details <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="space40">&nbsp;</div>

                    </div> .beta-products-list -->
                </div>
            </div> <!-- end section with sidebar and main content -->


        </div> <!-- .main-content -->
    </div> <!-- #content -->
</div>
@endsection('content')