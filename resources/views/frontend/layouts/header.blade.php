<header>
    <div id="header-sticky"
        class="header__area {{ request()->is('dashboard/learning-dashboard/*') ? 'header__padding-2 header__shadow' : 'header__transparent' }} header__padding {{ url()->current() == url('/') }} @if (!App\Models\Menu::where('status', 'active')->where('location', 'header')->count() > 0) pt-20 pb-20 @endif">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-2 col-sm-4 col-6">
                    <div class="header__left d-flex">
                        <div class="logo">
                            <a href="{{ url('/') }}">
                                @if (getOptions('header', 'header_logo') != null)
                                    <img src="{{ asset(getOptions('header', 'header_logo')) }}" alt="logo">
                                @endif
                            </a>
                        </div>
                        <div class="header__category d-none d-lg-block">
                            <nav>
                                <ul>
                                    <li>
                                        <a href="javascript:void(0)" class="cat-menu d-flex align-items-center">
                                            <div class="cat-dot-icon d-inline-block">
                                                <svg viewBox="0 0 276.2 276.2">
                                                    <g>
                                                        <g>
                                                            <path class="cat-dot"
                                                                d="M33.1,2.5C15.3,2.5,0.9,17,0.9,34.8s14.5,32.3,32.3,32.3s32.3-14.5,32.3-32.3S51,2.5,33.1,2.5z" />
                                                            <path class="cat-dot"
                                                                d="M137.7,2.5c-17.8,0-32.3,14.5-32.3,32.3s14.5,32.3,32.3,32.3c17.8,0,32.3-14.5,32.3-32.3S155.5,2.5,137.7,2.5    z" />
                                                            <path class="cat-dot"
                                                                d="M243.9,67.1c17.8,0,32.3-14.5,32.3-32.3S261.7,2.5,243.9,2.5S211.6,17,211.6,34.8S226.1,67.1,243.9,67.1z" />
                                                            <path class="cat-dot"
                                                                d="M32.3,170.5c17.8,0,32.3-14.5,32.3-32.3c0-17.8-14.5-32.3-32.3-32.3S0,120.4,0,138.2S14.5,170.5,32.3,170.5z" />
                                                            <path class="cat-dot"
                                                                d="M136.8,170.5c17.8,0,32.3-14.5,32.3-32.3c0-17.8-14.5-32.3-32.3-32.3c-17.8,0-32.3,14.5-32.3,32.3    C104.5,156.1,119,170.5,136.8,170.5z" />
                                                            <path class="cat-dot"
                                                                d="M243,170.5c17.8,0,32.3-14.5,32.3-32.3c0-17.8-14.5-32.3-32.3-32.3s-32.3,14.5-32.3,32.3    C210.7,156.1,225.2,170.5,243,170.5z" />
                                                            <path class="cat-dot"
                                                                d="M33,209.1c-17.8,0-32.3,14.5-32.3,32.3c0,17.8,14.5,32.3,32.3,32.3s32.3-14.5,32.3-32.3S50.8,209.1,33,209.1z    " />
                                                            <path class="cat-dot"
                                                                d="M137.6,209.1c-17.8,0-32.3,14.5-32.3,32.3c0,17.8,14.5,32.3,32.3,32.3c17.8,0,32.3-14.5,32.3-32.3    S155.4,209.1,137.6,209.1z" />
                                                            <path class="cat-dot"
                                                                d="M243.8,209.1c-17.8,0-32.3,14.5-32.3,32.3c0,17.8,14.5,32.3,32.3,32.3c17.8,0,32.3-14.5,32.3-32.3    S261.6,209.1,243.8,209.1z" />
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                            <span>{{ __('dashboard.cetagory') }}</span>
                                        </a>
                                        <ul class="cat-submenu">
                                            @if (getOptions('header', 'header_categories') != null)
                                                @foreach (getOptions('header', 'header_categories') as $cat)
                                                    @php
                                                        $category = App\Models\CourseCategory::where('status', 'active')->find($cat);
                                                    @endphp
                                                    @isset($category)
                                                        <li>
                                                            <a href="{{ route('course.category', $category->slug) }}">{{ $category->title }}
                                                            </a>
                                                        </li>
                                                    @endisset
                                                @endforeach
                                            @endif
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-9 col-xl-9 col-lg-8 col-md-10 col-sm-8 col-6">
                    <div class="header__right d-flex justify-content-end align-items-center">
                        <div class="main-menu">
                            <nav id="mobile-menu">
                                <ul>
                                    @if (App\Models\Menu::where('status', 'active')->where('location', 'header')->count() > 0)
                                        @php
                                            $menus = App\Models\Menu::where('status', 'active')->where('location', 'header')->get();

                                            $menu_content = [];
                                            if (count($menus) > 0) {
                                                $menu_content = json_decode($menus[0]->content);
                                            }
                                        @endphp

                                        @foreach ($menu_content as $menu)
                                            @if ($menu->type == 'page')
                                                @php
                                                    $page = App\Models\pages::find($menu->id);
                                                @endphp
                                                <li class="@if (isset($menu->children)) has-dropdown @endif">
                                                    <a
                                                        href="{{ route('pages.details', $page->slug) }}">{{ $menu->name }}</a>
                                                    @if (isset($menu->children))
                                                        <ul class="submenu">
                                                            @foreach ($menu->children as $child)
                                                                @if ($child->type == 'page')
                                                                    @php
                                                                        $page = App\Models\pages::find($child->id);
                                                                    @endphp
                                                                    <li>
                                                                        <a
                                                                            href="{{ route('pages.details', $page->slug) }}">{{ $menu->name }}</a>
                                                                    </li>
                                                                @elseif ($child->type == 'course')
                                                                    @php
                                                                        $course = App\Models\Course::find($child->id);
                                                                    @endphp
                                                                    <li><a
                                                                            href="{{ route('course.details', $course->slug) }}">{{ $menu->name }}</a>
                                                                    </li>
                                                                @elseif ($child->type == 'custom_link')
                                                                    <li><a
                                                                            href="{{ $child->id }}">{{ $child->name }}</a>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @elseif ($menu->type == 'course')
                                                @php
                                                    $course = App\Models\Course::find($menu->id);
                                                @endphp
                                                <li class="@if (isset($menu->children)) has-dropdown @endif"><a
                                                        href="{{ route('course.details', $course->slug) }}">{{ $menu->name }}</a>
                                                    @if (isset($menu->children))
                                                        <ul class="submenu">
                                                            @foreach ($menu->children as $child)
                                                                @if ($child->type == 'page')
                                                                    @php
                                                                        $page = App\Models\pages::find($child->id);
                                                                    @endphp
                                                                    <li><a
                                                                            href="{{ route('pages.details', $page->slug) }}">{{ $menu->name }}</a>
                                                                    </li>
                                                                @elseif ($child->type == 'course')
                                                                    @php
                                                                        $course = App\Models\Course::find($child->id);
                                                                    @endphp
                                                                    <li><a
                                                                            href="{{ route('course.details', $course->slug) }}">{{ $menu->name }}</a>
                                                                    </li>
                                                                @elseif ($child->type == 'custom_link')
                                                                    <li><a
                                                                            href="{{ $child->id }}">{{ $child->name }}</a>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @elseif ($menu->type == 'custom_link')
                                                <li class="@if (isset($menu->children)) has-dropdown @endif"><a
                                                        href="{{ $menu->id }}">{{ $menu->name }}</a>
                                                    @if (isset($menu->children))
                                                        <ul class="submenu">
                                                            @foreach ($menu->children as $child)
                                                                @if ($child->type == 'page')
                                                                    @php
                                                                        $page = App\Models\pages::find($child->id);
                                                                    @endphp
                                                                    <li><a
                                                                            href="{{ route('pages.details', $page->slug) }}">{{ $menu->name }}</a>
                                                                    </li>
                                                                @elseif ($child->type == 'course')
                                                                    @php
                                                                        $course = App\Models\Course::find($child->id);
                                                                    @endphp
                                                                    <li><a
                                                                            href="{{ route('course.details', $course->slug) }}">{{ $menu->name }}</a>
                                                                    </li>
                                                                @elseif ($child->type == 'custom_link')
                                                                    <li><a
                                                                            href="{{ $child->id }}">{{ $child->name }}</a>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @endif
                                        @endforeach
                                    @endif
                                </ul>
                            </nav>
                        </div>
                        @if (getOptions('header', 'header_shape') == 'on')
                            <div class="header__search p-relative ml-50 d-none d-md-block">
                                <form action="{{ route('course.search') }}" method="GET">
                                    @csrf
                                    <input type="text" name="search" placeholder="{{ __('frontend.search') }}">
                                    <button type="submit"><i class="fad fa-search"></i></button>
                                </form>
                                @include('frontend.layouts.mini-cart')
                            </div>
                        @endif

                        <div class="header__btn ml-20 d-none d-sm-block">
                            <div>
                                @if (Auth::check())
                                    @if (Auth::user()->usertype == 'admin')
                                        <a class="e-btn" href="{{ route('admin.dashboard') }}">Dashboard</a>
                                    @elseif (Auth::user()->usertype == 'instructor')
                                        <a class="e-btn" href="{{ route('admin.dashboard') }}">Dashboard</a>
                                    @else
                                        <a class="e-btn" href="{{ route('dashboard.') }}">Dashboard</a>
                                    @endif
                                @else
                                    <a class="e-btn" href="{{ route('login') }}">Login</a>
                                @endif
                            </div>
                        </div>
                        <div class="sidebar__menu d-xl-none">
                            <div class="sidebar-toggle-btn ml-30" id="sidebar-toggle">
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="line"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
