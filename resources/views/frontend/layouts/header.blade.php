<div id="header">
    <div class="header-top">
        <div class="container">
            <div class="pull-left auto-width-left">
                <ul class="top-menu menu-beta l-inline">
                    <a href="index.html"
                       id="logo"><img width="100px"
                             src="{{url('image/logo.jpg')}}"
                             width="200px"
                             alt=""></a>
                </ul>
            </div>
            <div class="pull-right auto-width-right">
                @if(Auth::check())
                <ul class="top-details menu-beta l-inline">
                    <li><a href="#"><i class="fa fa-user"></i>Tài khoản: {{Auth::user()->name}}</a></li>
                    <li><a href="{{url('/logout')}}">Đăng xuất</a></li>
                </ul>

                @else
                <ul class="top-details menu-beta l-inline">
                    <li><a href="#"><i class="fa fa-user"></i>Tài khoản</a></li>
                    <li><a href="{{url('register')}}">Đăng kí</a></li>
                    <li><a href="{{url('login')}}">Đăng nhập</a></li>
                </ul>
                @endif
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-top -->
    <div class="header-body">
        <div class="container beta-relative">
            <div class="pull-right beta-components space-left ov">
                <div class="space10">&nbsp;</div>
                <div class="beta-comp">
                    <form role="search"
                          method="get"
                          id="searchform"
                          action="{{url('shoesstore/search')}}">
                        <input type="text"
                               value=""
                               name="key"
                               id="s"
                               placeholder="Nhập từ khóa..." />
                        <button class="fa fa-search"
                                type="submit"
                                id="searchsubmit"></button>
                    </form>
                </div>

                <div class="beta-comp">
                    @if(Session::has('cart'))
                    <div class="cart">
                        <div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng (@if(Session::has('cart'))
                            {{Session('cart')->totalQuantity}} @else Trống @endif)<i class="fa fa-chevron-down"></i>
                        </div>
                        <div class="beta-dropdown cart-body">

                            @foreach($product_cart as $product)
                            <div class="cart-item">
                                <a class="cart-item-delete"
                                   href="{{url('shoesstore/deleteCart', $product['item']['id'])}}"><i
                                       class="fa fa-times"></i></a>
                                <div class="media">
                                    <a class="pull-left"
                                       href="#"><img src="{{url('image', $product['item']['image'])}}"
                                             alt=""></a>
                                    <div class="media-body">
                                        <span class="cart-item-title">{{$product['item']['name']}}</span>
                                        <span class="cart-item-options">Size: XS; Colar: Navy</span>
                                        @if( $product['item']['price_promotion']==0)
                                        <span
                                              class="cart-item-amount">{{$product['quantity']}}x<span>{{$product['item']['price']}}</span></span>
                                        @else
                                        <span
                                              class="cart-item-amount">{{$product['quantity']}}x<span>{{$product['item']['price_promotion']}}</span></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach


                            <div class="cart-caption">
                                <div class="cart-total text-right">Tổng tiền: <span
                                          class="cart-total-value">{{Session('cart')->totalPrice}}</span></div>
                                <div class="clearfix"></div>

                                <div class="center">
                                    <div class="space10">&nbsp;</div>
                                    <a href="{{url('shoesstore/order')}}"
                                       class="beta-btn primary text-center">Đặt hàng <i
                                           class="fa fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div> <!-- .cart -->
                    @endif
                </div>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-body -->
    <div class="header-bottom"
         style="background-color: #0277b8;">
        <div class="container">
            <a class="visible-xs beta-menu-toggle pull-right"
               href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
            <div class="visible-xs clearfix"></div>
            <nav class="main-menu">
                <ul class="l-inline ov">
                    <li><a href="{{url('shoesstore')}}">Trang chủ</a></li>
                    <li><a href="#">Sản phẩm</a>
                        <ul class="sub-menu">
                            @foreach($category as $category)
                            <li><a href="{{url('shoesstore/categories', $category->id)}}">{{$category->name}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{url('shoesstore/aboutus')}}">Giới thiệu</a></li>
                    <li><a href="{{url('shoesstore/contact')}}">Liên hệ</a></li>
                </ul>
                <div class="clearfix"></div>
            </nav>
        </div> <!-- .container -->
    </div> <!-- .header-bottom -->
</div> <!-- #header -->