@extends('frontend.layouts.index')
@section('content')
<div class="rev-slider">
    <div class="fullwidthbanner-container">
        <div class="fullwidthbanner">
            <div class="bannercontainer">
                <div class="banner">
                    <ul>
                        @foreach($aboutus as $abus)
                        <!-- THE FIRST SLIDE -->
                        <li data-transition="boxfade"
                            data-slotamount="20"
                            class="active-revslide"
                            style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
                            <div class="slotholder"
                                 style="width:100%;height:100%;"
                                 data-duration="undefined"
                                 data-zoomstart="undefined"
                                 data-zoomend="undefined"
                                 data-rotationstart="undefined"
                                 data-rotationend="undefined"
                                 data-ease="undefined"
                                 data-bgpositionend="undefined"
                                 data-bgposition="undefined"
                                 data-kenburns="undefined"
                                 data-easeme="undefined"
                                 data-bgfit="undefined"
                                 data-bgfitend="undefined"
                                 data-owidth="undefined"
                                 data-oheight="undefined">
                                <div class="tp-bgimg defaultimg"
                                     data-lazyload="undefined"
                                     data-bgfit="cover"
                                     data-bgposition="center center"
                                     data-bgrepeat="no-repeat"
                                     data-lazydone="undefined"
                                     src="image/{{$abus->image}}"
                                     data-src="image/{{$abus->image}}"
                                     style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('image/{{$abus->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                                </div>
                            </div>

                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="tp-bannertimer"></div>
        </div>
    </div>
    <!--slider-->
</div>
<div class="container">
    <div id="content"
         class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="beta-products-list">
                        <h4>New Products</h4>
                        <div class="beta-products-details">
                            <!-- <p class="pull-left">438 styles found</p> -->
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                            @foreach($newProduct as $new)
                            <div class="col-sm-3">
                                <div class="single-item">
                                    @if($new->price_promotion!=0)
                                    <div class="ribbon-wrapper">
                                        <div class="ribbon sale">Sale</div>
                                    </div>
                                    @endif
                                    <div class="single-item-header">
                                        <a href="{{url('shoesstore/productDetails', $new->id)}}"><img
                                                 src="image/{{$new->image}}"
                                                 alt=""></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$new->name}}</p>
                                        <p class="single-item-price">
                                            @if($new->price_promotion==0)
                                            <span class="flash-sale">{{$new->price}}</span>
                                            @else
                                            <span class="flash-del">{{$new->price}}</span>
                                            <span class="flash-sale">{{$new->price_promotion}}</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="
                                                  single-item-caption">
                                        <a class="add-to-cart pull-left"
                                           href="{{url('shoesstore/addToCart', $new->id)}}"><i
                                               class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary"
                                           href="{{url('shoesstore/productDetails', $new->id)}}">Details <i
                                               class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div> <!-- .beta-products-list -->

                    <div class="space50">&nbsp;</div>

                    <div class="beta-products-list">
                        <h4>Top Products</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">{{count($topProduct)}} items found</p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            @foreach($topProduct as $top)
                            <div class="col-sm-3">
                                <div class="single-item">
                                    <div class="single-item-header">
                                        <a href="{{url('shoesstore/productDetails', $top->id)}}"><img
                                                 src="image/{{$top->image}}"
                                                 alt=""></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$top->name}}</p>
                                        <p class="single-item-price">
                                            <span class="flash-del">{{$top->price}}</span>
                                            <span class="flash-sale">{{$top->price_promotion}}</span>
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left"
                                           href="{{url('shoesstore/addToCart', $top->id)}}"><i
                                               class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary"
                                           href="{{url('shoesstore/productDetails', $top->id)}}">Details <i
                                               class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="row">{{$topProduct->links()}}</div>
                        <div class="space40">&nbsp;</div>

                    </div> <!-- .beta-products-list -->
                </div>
            </div> <!-- end section with sidebar and main content -->


        </div> <!-- .main-content -->
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection