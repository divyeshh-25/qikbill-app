<!-- Sidebar -->
<div class="sidebar" id="sidebar">

    <!-- Logo -->
    <div class="sidebar-logo">
        <a href="index.html" class="logo logo-normal">
            <img src="{{ asset('assets/img/logo.png') }}" class="mx-4 mt-2" alt="Img">
        </a>

        <a href="index.html" class="logo logo-white">
            <img src="{{ asset('assets/img/logo-white.png') }}" class="mx-4 mt-2" alt="Img">
        </a>

        <a href="index.html" class="logo-small">
            <img src="{{ asset('assets/img/logo-small.png') }}" alt="Img">
        </a>

        <a id="toggle_btn" href="javascript:void(0);">
            <i data-feather="chevrons-left" class="feather-16"></i>
        </a>
    </div>
    <!-- /Logo -->

    <div class="modern-profile p-3 pb-0">
        <div class="text-center rounded bg-light p-3 mb-4 user-profile">
            <div class="avatar avatar-lg online mb-3">
                <img src="{{ asset('assets/img/customer/customer15.jpg') }}" alt="Img" class="img-fluid rounded-circle">
            </div>
            <h6 class="fs-14 fw-bold mb-1">Adrian Herman</h6>
            <p class="fs-12 mb-0">System Admin</p>
        </div>

        <div class="sidebar-nav mb-3">
            <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded nav-justified bg-transparent" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active border-0" href="#">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link border-0" href="chat.html">Chats</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link border-0" href="email.html">Inbox</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="sidebar-header p-3 pb-0 pt-2">
        <div class="text-center rounded bg-light p-2 mb-4 sidebar-profile d-flex align-items-center">
            <div class="avatar avatar-md onlin">
                <img src="{{ asset('assets/img/customer/customer15.jpg') }}" alt="Img" class="img-fluid rounded-circle">
            </div>

            <div class="text-start sidebar-profile-info ms-2">
                <h6 class="fs-14 fw-bold mb-1">Adrian Herman</h6>
                <p class="fs-12">System Admin</p>
            </div>
        </div>

        <div class="d-flex align-items-center justify-content-between menu-item mb-3">
            <div>
                <a href="index.html" class="btn btn-sm btn-icon bg-light">
                    <i class="ti ti-layout-grid-remove"></i>
                </a>
            </div>

            <div>
                <a href="chat.html" class="btn btn-sm btn-icon bg-light">
                    <i class="ti ti-brand-hipchat"></i>
                </a>
            </div>

            <div>
                <a href="email.html" class="btn btn-sm btn-icon bg-light position-relative">
                    <i class="ti ti-message"></i>
                </a>
            </div>

            <div class="notification-item">
                <a href="activities.html" class="btn btn-sm btn-icon bg-light position-relative">
                    <i class="ti ti-bell"></i>
                    <span class="notification-status-dot"></span>
                </a>
            </div>

            <div class="me-0">
                <a href="general-settings.html" class="btn btn-sm btn-icon bg-light">
                    <i class="ti ti-settings"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">

            <ul>

                <!-- Super Admin -->
                {{-- <li class="submenu-open">
                    <h6 class="submenu-hdr">Super Admin</h6>

                    <ul>
                         <x-layout.sidebar.item icon="ti ti-user-edit" label="Dashboard" link="{{ route('super_admin.dashboard') }}" /> 
                        <x-layout.sidebar.item icon="ti ti-list-details" label="Companies" link="companies.html" />
                        <x-layout.sidebar.item icon="ti ti-stairs-up" label="Subscriptions" link="subscription.html" />
                        <x-layout.sidebar.item icon="ti ti-shopping-bag" label="Packages" link="packages.html" />
                        <x-layout.sidebar.item icon="ti ti-brand-apple-arcade" label="Domain" link="domain.html" />
                        <x-layout.sidebar.item icon="ti ti-carousel-vertical" label="Purchase Transaction" link="purchase-transaction.html" />
                    </ul>
                </li> --}}

                <!-- Admin -->
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Admin</h6>
                    <ul>
                     <x-layout.sidebar.item icon="ti ti-layout-grid" label="Dashboard" link="{{ route('admin.dashboard') }}" /> 
                        <x-layout.sidebar.item icon="ti ti-user-edit" label="Products" link="{{ route('admin.products.index') }}" />
                        <x-layout.sidebar.item icon="ti ti-user-edit" label="Create Product" link="add-product.html" />
                        <x-layout.sidebar.item icon="ti ti-user-edit" label="Category" link="{{ route('admin.categories.index') }}" />
                        <x-layout.sidebar.item icon="ti ti-user-edit" label="Sub Category" link="{{ route('admin.categories.subcatgories') }}" />
                        <x-layout.sidebar.item icon="ti ti-user-edit" label="POS" link="pos.html" />
                    </ul>
                </li>

                <!-- User Management -->
                <li class="submenu-open">
                    <h6 class="submenu-hdr">User Management</h6>

                    <ul>
                        <x-layout.sidebar.item icon="ti ti-shield-up" label="Users" link="{{ route('admin.users.index') }}" />
                        <x-layout.sidebar.item icon="ti ti-user-circle" label="Customers" link="{{ route('admin.customers.index') }}" />
                        <x-layout.sidebar.item icon="ti ti-jump-rope" label="Roles & Permissions" link="{{ route('admin.roles.index') }}" />
                    </ul>
                </li>

                <!-- General -->
                <li class="submenu-open">
                    <h6 class="submenu-hdr">General</h6>

                    <ul>
                        <x-layout.sidebar.item icon="ti ti-user-circle" label="Profile" link="{{ route('admin.setting.profile') }}" />
                        <x-layout.sidebar.item icon="ti ti-settings" label="Setting" link="{{ route('admin.setting.get-company-setting') }}" />
                    </ul>
                </li>

            </ul>

        </div>
    </div>

</div>
<!-- /Sidebar -->
