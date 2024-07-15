<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('dashboard') }}" class="app-brand-link">
            <h1 class="display-6">jewellery_shop</h1>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item active">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <!-- Layouts -->


        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Pages</span>
        </li>

        <li class="menu-item">
            <a href="{{ route('view.products') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-shopping-bag-alt"></i>
                <div data-i18n="Authentications">Products</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('query.list') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-message-dots"></i>
                <div data-i18n="Misc">Query</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('order.manage') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-dollar"></i>
                <div data-i18n="Misc">Orders</div>
            </a>
        </li>
        <!-- Misc -->
    </ul>
</aside>
