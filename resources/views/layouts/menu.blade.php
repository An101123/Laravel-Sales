<li class="nav-item {{ Request::is('categories*') ? 'active' : '' }}">
    <a class="nav-link"
       href="{{ route('categories.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Categories</span>
    </a>
</li>
<li class="nav-item {{ Request::is('products*') ? 'active' : '' }}">
    <a class="nav-link"
       href="{{ route('products.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Products</span>
    </a>
</li>
<li class="nav-item {{ Request::is('customers*') ? 'active' : '' }}">
    <a class="nav-link"
       href="{{ route('customers.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Customers</span>
    </a>
</li>
<li class="nav-item {{ Request::is('promotions*') ? 'active' : '' }}">
    <a class="nav-link"
       href="{{ route('promotions.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Promotions</span>
    </a>
</li>
<li class="nav-item {{ Request::is('orders*') ? 'active' : '' }}">
    <a class="nav-link"
       href="{{ route('orders.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Orders</span>
    </a>
</li>
<li class="nav-item {{ Request::is('orderDetails*') ? 'active' : '' }}">
    <a class="nav-link"
       href="{{ route('orderDetails.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Order Details</span>
    </a>
</li>
<li class="nav-item {{ Request::is('aboutuses*') ? 'active' : '' }}">
    <a class="nav-link"
       href="{{ route('aboutuses.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>About Us</span>
    </a>
</li>