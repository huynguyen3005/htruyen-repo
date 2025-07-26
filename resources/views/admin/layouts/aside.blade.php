<aside class="left-sidebar with-vertical">
    <!-- Start Vertical Layout Sidebar -->
    <!-- ---------------------------------- -->
    <div class="brand-logo d-flex align-items-center justify-content-between">
        <a href="../dark/index.html" class="text-nowrap logo-img">
            <img src="{{ asset('admin/assets/images/logos/logo-light.svg') }}" class="dark-logo" alt="Logo-Dark" />
            <img src="{{ asset('admin/assets/images/logos/logo-dark.svg') }}" class="light-logo" alt="Logo-light" />
        </a>
        <a href="javascript:void(0)" class="sidebartoggler ms-auto text-decoration-none fs-5 d-block d-xl-none">
            <i class="ti ti-x"></i>
        </a>
    </div>

    <div class="scroll-sidebar" data-simplebar>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="mb-0">

                <!-- ============================= -->
                <!-- Home -->
                <!-- ============================= -->
                <li class="nav-small-cap">
                    <iconify-icon icon="solar:menu-dots-bold-duotone" class="nav-small-cap-icon fs-5"></iconify-icon>
                    <span class="hide-menu">Home</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link primary-hover-bg"
                        href="{{ route('admin.fetchAndStoreStories') }}" aria-expanded="false">
                        <span class="aside-icon p-2 bg-primary-subtle rounded-1">
                            <iconify-icon icon="solar:screencast-2-line-duotone" class="fs-6"></iconify-icon>
                        </span>
                        <span class="hide-menu ps-1">Update Comics</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link primary-hover-bg"
                        href="{{ route('admin.fetchStoriesDescription') }}" aria-expanded="false">
                        <span class="aside-icon p-2 bg-primary-subtle rounded-1">
                            <iconify-icon icon="solar:screencast-2-line-duotone" class="fs-6"></iconify-icon>
                        </span>
                        <span class="hide-menu ps-1">Update Comics description</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link primary-hover-bg" href="{{ route('home') }}"
                        aria-expanded="false">
                        <span class="aside-icon p-2 bg-primary-subtle rounded-1">
                            <iconify-icon icon="solar:window-frame-line-duotone" class="fs-6"></iconify-icon>
                        </span>
                        <span class="hide-menu ps-1">Client Homepage</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link success-hover-bg"
                        href="{{ route('admin.fetchAndStoreCategories') }}" aria-expanded="false">
                        <span class="aside-icon p-2 bg-success-subtle rounded-1">
                            <iconify-icon icon="solar:chart-line-duotone" class="fs-6"></iconify-icon>
                        </span>
                        <span class="hide-menu ps-1">Update Categories</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link success-hover-bg"
                        href="{{ route('admin.generateSitemap') }}" aria-expanded="false">
                        <span class="aside-icon p-2 bg-success-subtle rounded-1">
                            <iconify-icon icon="solar:chart-line-duotone" class="fs-6"></iconify-icon>
                        </span>
                        <span class="hide-menu ps-1">Genarate Site map</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link success-hover-bg"
                        href="{{ route('admin.UdMetaKeywords') }}" aria-expanded="false">
                        <span class="aside-icon p-2 bg-success-subtle rounded-1">
                            <iconify-icon icon="solar:chart-line-duotone" class="fs-6"></iconify-icon>
                        </span>
                        <span class="hide-menu ps-1">Update Meta Keywords</span>
                    </a>
                </li>

                <!-- ============================= -->
                <!-- Apps -->
                <!-- ============================= -->
                <li class="nav-small-cap">
                    <iconify-icon icon="solar:menu-dots-bold-duotone" class="nav-small-cap-icon fs-5"></iconify-icon>
                    <span class="hide-menu">Apps</span>
                </li>
                {{-- Comic --}}
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow success-hover-bg" href="#" aria-expanded="false">
                        <span class="aside-icon p-2 bg-success-subtle rounded-1">
                            <iconify-icon icon="solar:smart-speaker-minimalistic-line-duotone"
                                class="fs-6"></iconify-icon>
                        </span>
                        <span class="hide-menu ps-1">Comic</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="../dark/eco-shop.html" class="sidebar-link">
                                <span class="sidebar-icon"></span>
                                <span class="hide-menu">Shop One</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="../dark/eco-shop2.html" class="sidebar-link">
                                <span class="sidebar-icon"></span>
                                <span class="hide-menu">Shop Two</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="../dark/eco-shop-detail.html" class="sidebar-link">
                                <span class="sidebar-icon"></span>
                                <span class="hide-menu">Details One</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="../dark/eco-shop-detail2.html" class="sidebar-link">
                                <span class="sidebar-icon"></span>
                                <span class="hide-menu">Details Two</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="../dark/eco-product-list.html" class="sidebar-link">
                                <span class="sidebar-icon"></span>
                                <span class="hide-menu">List</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="../dark/eco-checkout.html" class="sidebar-link">
                                <span class="sidebar-icon"></span>
                                <span class="hide-menu">Checkout</span>
                            </a>
                        </li>
                    </ul>
                </li>
                
                {{-- User --}}
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow danger-hover-bg" href="#" aria-expanded="false">
                        <span class="aside-icon p-2 bg-danger-subtle rounded-1">
                            <iconify-icon icon="solar:user-circle-line-duotone" class="fs-6"></iconify-icon>
                        </span>
                        <span class="hide-menu ps-1">User</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="../dark/page-user-profile.html" class="sidebar-link">
                                <span class="sidebar-icon"></span>
                                <span class="hide-menu">Profile One</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="../dark/page-user-profile2.html" class="sidebar-link">
                                <span class="sidebar-icon"></span>
                                <span class="hide-menu">Profile Two</span>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- Email --}}
                <li class="sidebar-item">
                    <a class="sidebar-link indigo-hover-bg" href="../dark/app-email.html" aria-expanded="false">
                        <span class="aside-icon p-2 bg-indigo-subtle rounded-1">
                            <iconify-icon icon="solar:mailbox-line-duotone" class="fs-6"></iconify-icon>
                        </span>
                        <span class="hide-menu ps-1">Email</span>
                    </a>
                </li>
            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>

    <div class=" fixed-profile mx-3 mt-3">
        <div class="card bg-primary-subtle mb-0 shadow-none">
            <div class="card-body p-4">
                <div class="d-flex align-items-center justify-content-between gap-3">
                    <div class="d-flex align-items-center gap-3">
                        <img src="{{ asset('admin/assets/images/profile/user-1.jpg') }}" width="45"
                            height="45" class="img-fluid rounded-circle" alt="" />
                        <div>
                            <h5 class="mb-1">{{ Auth::user()->name }}</h5>
                            <p class="mb-0">Admin</p>
                        </div>
                    </div>
                    <a href="{{ route('logout') }}" class="position-relative" data-bs-toggle="tooltip"
                        data-bs-placement="top" data-bs-title="Logout">
                        <iconify-icon icon="solar:logout-line-duotone" class="fs-8"></iconify-icon>
                    </a>
                </div>
            </div>
        </div>
    </div>
</aside>
