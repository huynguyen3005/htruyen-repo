<header class="header style-1">
    <div class="container">
        <!-- Start Mainmenu Nav -->
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset(LOGO_LINK) }}" alt="logo htruyen"></a>
            <button class="navbar-toggler" type="button" name="search-btn" data-bs-toggle="collapse" data-bs-target="#myseachbar" id="search-toggler">
                <i class="fal fa-search"></i>
            </button>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar" id="menu-toggler">
                <i class="fas fa-bars"></i>
            </button>
            {{-- search bar --}}
            <div class="collapse navbar-collapse" id="myseachbar">
                <form action="{{ route('comic.search') }}" method="GET" class="search-form d-lg-none">
                    <div class="input-group form-group header-search-box">
                        <button class="input-group-text anime-btn" type="submit"><i class="fal fa-search"></i></button>
                        <input class="form-control" value="{{ isset($_GET['keyword']) ? $_GET['keyword'] : '' }}"
                            name="keyword" type="text" placeholder="Từ khóa tìm kiếm">
                    </div>
                </form>
            </div>
            {{-- menu bar --}}
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav ms-auto mainmenu d-lg-none">
                    <li class="menu-item-has-children">
                        <a href="{{ route('home') }}" class="active">Trang chủ</a>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#Pages" class="dropdown-toggle" id="pages" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" aria-expanded="false">Top
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                <path
                                    d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                            </svg>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="pages">
                            <li class="d-block" style="width: 100%;">
                                <a href="{{ route('comic.topday') }}"
                                    class="{{ isset($_GET['sort']) && $_GET['sort'] == 'view' ? 'active' : '' }}">Top
                                    ngày
                                </a>
                            </li>
                            <li class="d-block" style="width: 100%;">
                                <a href="{{ route('comic.topweek') }}"
                                    class="{{ isset($_GET['sort']) && $_GET['sort'] == 'rate' ? 'active' : '' }}">Top
                                    tuần
                                </a>
                            </li>
                            <li class="d-block" style="width: 100%;">
                                <a href="{{ route('comic.topmonth') }}"
                                    class="{{ isset($_GET['sort']) && $_GET['sort'] == 'rate' ? 'active' : '' }}">Top
                                    tháng
                                </a>
                            </li>
                            <li class="d-block" style="width: 100%;">
                                <a href="{{ route('comic.topviews') }}"
                                    class="{{ isset($_GET['sort']) && $_GET['sort'] == 'rate' ? 'active' : '' }}">Top
                                    views
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#Pages" class="dropdown-toggle" id="pages" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" aria-expanded="false">Thể loại
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                <path
                                    d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                            </svg>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="pages">
                            @foreach (\DB::table('categories')->get() as $category)
                                <li class="d-block" style="width: 100%;">
                                    <a href="{{ route('comic.search', ['genre' => [$category->category_id]]) }}"
                                        class="{{ isset($_GET['genre']) && in_array($category->category_id, $_GET['genre']) ? 'active' : '' }}">{{ Str::limit($category->name, 30) }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="{{ route('list-comics') }}">Truyện</a>
                    </li>
                </ul>
                <form action="{{ route('comic.search') }}" method="GET" class="search-form d-none d-lg-block">
                    <div class="input-group form-group header-search-box">
                        <button class="input-group-text anime-btn" type="submit"><i class="fal fa-search"></i></button>
                        <input class="form-control" value="{{ isset($_GET['keyword']) ? $_GET['keyword'] : '' }}"
                            name="keyword" type="text" placeholder="Từ khóa tìm kiếm">
                    </div>
                </form>
                {{-- login icon --}}
                @guest
                    <a href="{{ route('signup') }}" class="anime-btn2 light me-3">Đăng Ký</a>
                    <a href="{{ route('login') }}" class="anime-btn2 dark">Đăng Nhập</a>
                @endguest
                @auth
                    <!-- start apps Dropdown -->
                    <div class="nav-item dropdown">
                        <a class="nav-link position-relative ms-6" href="javascript:void(0)" id="drop1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="d-flex align-items-center flex-shrink-0">
                                <div class="user-profile me-sm-3 me-2">
                                    <img src="{{ asset('assets/media/profile/user-1.jpg') }}" width="45"
                                        class="rounded-circle" alt="">
                                </div>
                                <span class="d-sm-none d-block">
                                    <iconify-icon icon="solar:alt-arrow-down-line-duotone"></iconify-icon>
                                </span>
                            </div>
                        </a>
                        <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up "
                            aria-labelledby="drop1">
                            <div class="profile-dropdown position-relative" data-simplebar>
                                <div class="d-flex align-items-center justify-content-between pt-3 px-7">
                                    <button type="button" class="border-0 bg-transparent" aria-label="Close">
                                        <iconify-icon icon="solar:close-circle-line-duotone"
                                            class="fs-7 text-muted"></iconify-icon>
                                    </button>
                                </div>

                                <div class="d-flex align-items-center mx-7 py-9 border-bottom">
                                    <img src="{{ asset('assets/media/profile/user-1.jpg') }}" alt="user"
                                        width="90" class="rounded-circle" />
                                    <div class="ms-4">
                                        <h4 class="mb-0 fs-5 fw-normal">{{ auth()->user()->name }}</h4>
                                        <p class="text-muted mb-0 mt-1 d-flex align-items-center">
                                            <iconify-icon icon="solar:mailbox-line-duotone"
                                                class="fs-4 me-1"></iconify-icon>
                                            {{ auth()->user()->email }}
                                        </p>
                                    </div>
                                </div>

                                <div class="message-body">
                                    <a href="{{ route('profile.show') }}"
                                        class="dropdown-item px-7 d-flex align-items-center py-6">
                                        <span class="btn px-3 py-2 bg-info-subtle rounded-1 text-info shadow-none">
                                            <iconify-icon icon="solar:wallet-2-line-duotone"
                                                class="fs-7"></iconify-icon>
                                        </span>
                                        <div class="w-75 d-inline-block v-middle ps-3 ms-1">
                                            <h5 class="mb-0 mt-1 fs-4 fw-normal">
                                                Tài khoản của tôi
                                            </h5>
                                            <span class="fs-3 text-nowrap d-block fw-normal mt-1 text-muted">Cài đặt tài khoản</span>
                                        </div>
                                    </a>

                                    <a href="{{ route('comic.history') }}"
                                        class="dropdown-item px-7 d-flex align-items-center py-6">
                                        <span class="btn px-3 py-2 bg-success-subtle rounded-1 text-success shadow-none">
                                            <iconify-icon icon="solar:shield-minimalistic-line-duotone"
                                                class="fs-7"></iconify-icon>
                                        </span>
                                        <div class="w-75 d-inline-block v-middle ps-3 ms-1">
                                            <h5 class="mb-0 mt-1 fs-4 fw-normal">Lịch sử</h5>
                                            <span class="fs-3 text-nowrap d-block fw-normal mt-1 text-muted">Truyện đã đọc</span>
                                        </div>
                                    </a>
                                    @if (auth()->user()->role_id == 1)
                                        <a href="{{ route('admin.home') }}"
                                            class="dropdown-item px-7 d-flex align-items-center py-6">
                                            <span class="btn px-3 py-2 bg-danger-subtle rounded-1 text-danger shadow-none">
                                                <iconify-icon icon="solar:card-2-line-duotone"
                                                    class="fs-7"></iconify-icon>
                                            </span>
                                            <div class="w-75 d-inline-block v-middle ps-3 ms-1">
                                                <h5 class="mb-0 mt-1 fs-4 fw-normal">Admin page</h5>
                                                <span class="fs-3 text-nowrap d-block fw-normal mt-1 text-muted">
                                                    Tính năng dành cho Admin</span>
                                            </div>
                                        </a>
                                    @endif
                                </div>
                                <div class="py-6 px-7 mb-1">
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <button class="btn btn-primary w-100" type="submit">Đăng xuất</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endauth
            </div>
            {{-- login icon end --}}
        </nav>
    </div>
</header>


<!-- Menu dưới -->
<nav class="navbar navbar-expand-lg navbar-dark bg-color-xam d-none d-lg-block">
    <div class="container">
        <div id="navbarNav">
            <ul class="navbar-nav ms-auto mainmenu">
                <li class="menu-item-has-children">
                    <a href="{{ route('home') }}" class="active">Trang chủ</a>
                </li>
                <li class="menu-item-has-children">
                    <a href="#Pages" class="dropdown-toggle" id="pages" data-bs-toggle="dropdown"
                        data-bs-auto-close="outside" aria-expanded="false">Thể loại
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                            <path
                                d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                        </svg>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="pages" style="width: 60vw">
                        @foreach (\DB::table('categories')->get() as $category)
                            <li class="d-inline-block w-18 my-2">
                                <a href="{{ route('comic.search', ['genre' => [$category->category_id]]) }}"
                                    class="{{ isset($_GET['genre']) && in_array($category->category_id, $_GET['genre']) ? 'active' : '' }}">{{ Str::limit($category->name, 18) }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="{{ route('list-comics') }}">Truyện</a>
                </li>
                <li class="menu-item-has-children">
                    <a href="{{ route('comic.topday') }}"
                        class="{{ isset($_GET['sort']) && $_GET['sort'] == 'view' ? 'active' : '' }}">Top
                        ngày
                    </a>
                </li>
                <li class="menu-item-has-children">
                    <a href="{{ route('comic.topweek') }}"
                        class="{{ isset($_GET['sort']) && $_GET['sort'] == 'rate' ? 'active' : '' }}">Top
                        tuần
                    </a>
                </li>
                <li class="menu-item-has-children">
                    <a href="{{ route('comic.topmonth') }}"
                        class="{{ isset($_GET['sort']) && $_GET['sort'] == 'rate' ? 'active' : '' }}">Top
                        tháng
                    </a>
                </li>
                <li class="menu-item-has-children">
                    <a href="{{ route('comic.topviews') }}"
                        class="{{ isset($_GET['sort']) && $_GET['sort'] == 'rate' ? 'active' : '' }}">Top
                        views
                    </a>
                </li>
                <li class="menu-item-has-children">
                    <a href="{{ route('comic.history') }}"
                        class="">Lịch sử
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<script src="{{ asset('js/showHiddenMenu.js') }}"></script>
