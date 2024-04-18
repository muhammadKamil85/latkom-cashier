<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Route::currentRouteName() == 'admin-dashboard' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin-dashboard') }}">
            <i class="fa-solid fa-house"></i>
            <span>Dashboard</span></a>
    </li>
@if(Auth::user()->role == 'admin')
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Admin Pages
    </div>

    <!-- Nav Item - Product -->
    <li class="nav-item {{ Route::currentRouteName() == 'admin-product' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin-product') }}">
            <i class="fa-solid fa-store"></i>
            <span>Product</span></a>
    </li>

    <!-- Nav Item - Transaction -->
    <li class="nav-item {{ Route::currentRouteName() == 'admin-transaction' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin-transaction') }}">
            <i class="fa-solid fa-cart-shopping"></i>
            <span>Transaction</span></a>
    </li>

    <!-- Nav Item - User -->
    <li class="nav-item {{ Route::currentRouteName() == 'admin-user' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin-user') }}">
            <i class="fa-solid fa-user"></i>
            <span>User</span></a>
    </li>
@endif
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Cashier Pages
    </div>

    <!-- Nav Item - Product -->
    <li class="nav-item {{ Route::currentRouteName() == 'cashier-product' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('cashier-product') }}">
            <i class="fa-solid fa-basket-shopping"></i>
            <span>Product</span></a>
    </li>

    <!-- Nav Item - Transaction -->
    <li class="nav-item {{ Route::currentRouteName() == 'cashier-transaction' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('cashier-transaction') }}">
            <i class="fa-solid fa-handshake"></i>
            <span>Transaction</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
