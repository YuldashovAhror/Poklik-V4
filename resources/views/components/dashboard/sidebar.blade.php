<div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="@include('components.dashboard.logo')" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="@include('components.dashboard.logo')" alt="" height="20">
            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled mt-4" id="side-menu">
                <li class="menu-title">Menu</li>
                <li>
                    <a href="/dashboard">
                        <i class="uil-star"></i>
                        <span>Test</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uil-star"></i>
                        <span>Dropdown</span>
                    </a>
                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                        <li><a href="ecommerce-products.html">Products</a></li>
                        <li><a href="ecommerce-product-detail.html">Product Detail</a></li>
                        <li><a href="ecommerce-orders.html">Orders</a></li>
                        <li><a href="ecommerce-customers.html">Customers</a></li>
                        <li><a href="ecommerce-cart.html">Cart</a></li>
                        <li><a href="ecommerce-checkout.html">Checkout</a></li>
                        <li><a href="ecommerce-shops.html">Shops</a></li>
                        <li><a href="ecommerce-add-product.html">Add Product</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>