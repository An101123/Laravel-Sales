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
                <ul class="nav navbar-nav ml-auto">
                    <li><a href="#"><i class="fa fa-user"></i>{{__('Account')}}: {{Auth::user()->name}}<span
                                  id="l1-contact-separator">&nbsp;|&nbsp;</span></a></li>
                    <li><a href="{{url('/logout')}}">{{__('Log out')}}<span
                                  id="l1-contact-separator">&nbsp;|&nbsp;</span></a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link"
                           style="margin-right: 10px"
                           data-toggle="dropdown"
                           href="#"
                           role="button"
                           aria-haspopup="true"
                           aria-expanded="false">
                            {{__('Language')}} </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <ul class="test">
                                <li><a class="dropdown-item"
                                       href="{{route('language', ['en'])}}"><i><img width="10px"
                                                 height="10px"
                                                 src="image/english.png"
                                                 alt=""></i>
                                        English
                                    </a></li>
                                <li><a class="dropdown-item"
                                       href="{{route('language', ['vi'])}}"><i><img width="10px"
                                                 height="10px"
                                                 src="image/vietnam.png"
                                                 alt=""></i>
                                        Vietnamese
                                    </a> </li>
                            </ul>
                        </div>
                    </li>
                </ul>

                @else
                <ul class="nav navbar-nav ml-auto">
                    <li><a href="#"><i class="fa fa-user"></i>{{__('Account')}} <span
                                  id="l1-contact-separator">&nbsp;|&nbsp;</span></a></li>

                    <li><a href="{{url('register')}}">{{__('Sign up')}}<span
                                  id="l1-contact-separator">&nbsp;|&nbsp;</span></a></li>
                    <li><a href="{{url('login')}}">{{__('Sign in')}}<span
                                  id="l1-contact-separator">&nbsp;|&nbsp;</span></a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link"
                           style="margin-right: 10px"
                           data-toggle="dropdown"
                           href="#"
                           role="button"
                           aria-haspopup="true"
                           aria-expanded="false">
                            {{__('Language')}} </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <ul class="test">
                                <li><a class="dropdown-item"
                                       href="{{route('language', ['en'])}}"><i><img width="10px"
                                                 height="10px"
                                                 src="image/english.png"
                                                 alt=""></i>
                                        English
                                    </a></li>
                                <li><a class="dropdown-item"
                                       href="{{route('language', ['vi'])}}"><i><img width="10px"
                                                 height="10px"
                                                 src="image/vietnam.png"
                                                 alt=""></i>
                                        Vietnamese
                                    </a> </li>
                            </ul>
                        </div>
                    </li>
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
                    <li><a href="{{url('shoesstore')}}">{{__('Home')}}</a></li>
                    <li><a href="#">{{__('Categories')}}</a>
                        <ul class="sub-menu">
                            @foreach($category as $category)
                            <li><a href="{{url('shoesstore/categories', $category->id)}}">{{$category->name}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{url('shoesstore/aboutus')}}">{{__('About Us')}}</a></li>
                    <li><a href="{{url('shoesstore/contact')}}">{{__('Contact')}}</a></li>
                </ul>
                <div class="clearfix"></div>
            </nav>
        </div> <!-- .container -->
    </div> <!-- .header-bottom -->
</div> <!-- #header -->