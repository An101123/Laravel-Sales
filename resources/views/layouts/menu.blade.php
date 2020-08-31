<li class="nav-item {{ Request::is('categories*') ? 'active' : '' }}">
    <a class="nav-link"
       href="{{ route('categories.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>{{__('Categories')}}</span>
    </a>
</li>
<li class="nav-item {{ Request::is('products*') ? 'active' : '' }}">
    <a class="nav-link"
       href="{{ route('products.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>{{__('Products')}}</span>
    </a>
</li>
<li class="nav-item {{ Request::is('customers*') ? 'active' : '' }}">
    <a class="nav-link"
       href="{{ route('customers.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>{{__('Customers')}}</span>
    </a>
</li>
<li class="nav-item {{ Request::is('promotions*') ? 'active' : '' }}">
    <a class="nav-link"
       href="{{ route('promotions.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>{{__('Promotions')}}</span>
    </a>
</li>
<li class="nav-item {{ Request::is('orders*') ? 'active' : '' }}">
    <a class="nav-link"
       href="{{ route('orders.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>{{__('Orders')}}</span>
    </a>
</li>
<li class="nav-item {{ Request::is('orderDetails*') ? 'active' : '' }}">
    <a class="nav-link"
       href="{{ route('orderDetails.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>{{__('Order Details')}}</span>
    </a>
</li>
<li class="nav-item {{ Request::is('aboutuses*') ? 'active' : '' }}">
    <a class="nav-link"
       href="{{ route('aboutuses.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>{{__('About Us')}}</span>
    </a>
</li>