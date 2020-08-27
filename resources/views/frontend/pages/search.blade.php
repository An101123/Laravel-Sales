@extends('frontend.layouts.index')
@section('content')

<div class="container">
    <div id="content"
         class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="beta-products-list">
                        <h4>Kết quả tìm kiếm</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">{{count($product)}} styles found</p>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                            @foreach($product as $product)
                            <div class="col-sm-3">
                                <div class="single-item">
                                    @if($product->price_promotion!=0)
                                    <div class="ribbon-wrapper">
                                        <div class="ribbon sale">Sale</div>
                                    </div>
                                    @endif
                                    <div class="single-item-header">
                                        <a href="{{url('shoesstore/productDetails', $product->id)}}"><img
                                                 src="{{url('image/', $product->image)}}"
                                                 alt=""></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$product->name}}</p>
                                        <p class="single-item-price">
                                            @if($product->price_promotion==0)
                                            <span class="flash-sale">{{$product->price}}</span>
                                            @else
                                            <span class="flash-del">{{$product->price}}</span>
                                            <span class="flash-sale">{{$product->price_promotion}}</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="
                                                  single-item-caption">
                                        <a class="add-to-cart pull-left"
                                           href="{{url('shoesstore/addToCart', $product->id)}}"><i
                                               class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary"
                                           href="{{url('shoesstore/productDetails', $product->id)}}">Details <i
                                               class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div> <!-- .beta-products-list -->

                    <div class="space50">&nbsp;</div>

                    <!-- .beta-products-list -->
                </div>
            </div> <!-- end section with sidebar and main content -->


        </div> <!-- .main-content -->
    </div> <!-- #content -->
</div>
@endsection