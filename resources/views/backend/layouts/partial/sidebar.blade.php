<aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <span class="brand-text font-weight-light">
            <img src="{{ asset('frontend/assets/img/logo/logo-2.png') }}" alt="Logo">
        </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column tp-main-sidebar" data-widget="treeview" role="menu"
                data-accordion="false">
                @can('dashboard')
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}"
                            class="nav-link {{ request()->is('admin/dashboard') || request()->is('admin/dashboard/*') ? 'active' : '' }} ">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                {{ __('dashboard.dashboard') }}
                            </p>
                        </a>
                    </li>
                @endcan
                {{-- Blog  --}}
                @canany(['blog-category-list', 'blog-category-create', 'blog-category-edit', 'blog-category-delete',
                    'blog-sub-category-list', 'blog-sub-category-create', 'blog-sub-category-edit',
                    'blog-sub-category-delete', 'blog-tag-list', 'blog-tag-create', 'blog-tag-edit', 'blog-tag-delete',
                    'blog-list', 'blog-create', 'blog-edit', 'blog-delete'])
                    <li class="nav-item {{ request()->is('admin/blog*') ? 'menu-open' : 'menu-close' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/blog*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-blog"></i>
                            <p>
                                {{ __('dashboard.blog') }}
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @canany(['blog-category-list', 'blog-category-create', 'blog-category-edit',
                                'blog-category-delete'])
                                <li class="nav-item">

                                    <a href="{{ route('blog-categories.index') }}"
                                        class="nav-link {{ request()->is('admin/blog-categories') || request()->is('admin/blog-categories/*') ? 'active' : '' }}">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-chevron-right">
                                                <polyline points="9 18 15 12 9 6"></polyline>
                                            </svg>
                                        </span>
                                        <p>{{ __('dashboard.cetagory') }}</p>
                                    </a>
                                </li>
                            @endcanany
                            @canany(['blog-sub-category-list', 'blog-sub-category-create', 'blog-sub-category-edit',
                                'blog-sub-category-delete'])
                                <li class="nav-item">
                                    <a href="{{ route('blog-sub-categories.index') }}"
                                        class="nav-link {{ request()->is('admin/blog-sub-categories') || request()->is('admin/blog-sub-categories/*') ? 'active' : '' }}">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-chevron-right">
                                                <polyline points="9 18 15 12 9 6"></polyline>
                                            </svg>
                                        </span>
                                        <p>{{ __('dashboard.subcetagory') }}</p>
                                    </a>
                                </li>
                            @endcanany
                            @canany(['blog-list', 'blog-create', 'blog-edit', 'blog-delete'])
                                <li class="nav-item">
                                    <a href="{{ route('blog.index') }}"
                                        class="nav-link {{ request()->is('admin/blog') || request()->is('admin/blog/*') ? 'active' : '' }}">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-chevron-right">
                                                <polyline points="9 18 15 12 9 6"></polyline>
                                            </svg>
                                        </span>
                                        <p>{{ __('dashboard.blog') }}</p>
                                    </a>
                                </li>
                            @endcanany
                            <li class="nav-item">
                                <a href="{{ route('admin.blog.comments') }}"
                                    class="nav-link {{ request()->is('admin/blog-comments') || request()->is('admin/blog-comments/*') ? 'active' : '' }}">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-chevron-right">
                                            <polyline points="9 18 15 12 9 6"></polyline>
                                        </svg>
                                    </span>
                                    <p>{{ __('dashboard.comment') }}</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcanany
                {{-- Pages  --}}
                {{-- Course  --}}
                @canany(['course-category-list', 'course-category-create', 'course-category-edit',
                    'course-category-delete', 'course-sub-category-list', 'course-sub-category-create',
                    'course-sub-category-edit', 'course-sub-category-delete', 'course-language-list',
                    'course-language-create', 'course-language-edit', 'course-language-delete', 'course-list',
                    'course-create', 'course-edit', 'course-delete', 'course-coupon-list', 'course-coupon-create',
                    'course-coupon-edit', 'course-coupon-delete', 'course-review-list', 'course-review-create',
                    'course-review-edit', 'course-review-delete', 'course-resourse-list', 'course-resourse-create',
                    'course-resourse-edit', 'course-resourse-delete', 'course-quiz-list', 'course-quiz-create',
                    'course-quiz-edit', 'course-quiz-delete', 'course-assignment-list', 'course-assignment-create',
                    'course-assignment-edit', 'course-assignment-delete'])
                    <li
                        class="nav-item {{ request()->is('admin/course*') || request()->is('admin/coupon*') ? 'menu-open' : 'menu-close' }}">
                        <a href="#"
                            class="nav-link {{ request()->is('admin/course*') || request()->is('admin/coupon*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-graduation-cap"></i>
                            <p>
                                {{ __('dashboard.course') }}
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @canany(['course-category-list', 'course-category-create', 'course-category-edit',
                                'course-category-delete'])
                                <li class="nav-item">

                                    <a href="{{ route('course-categories.index') }}"
                                        class="nav-link {{ request()->is('admin/course-categories') || request()->is('admin/course-categories/*') ? 'active' : '' }}">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-chevron-right">
                                                <polyline points="9 18 15 12 9 6"></polyline>
                                            </svg>
                                        </span>
                                        <p>{{ __('dashboard.cetagory') }}</p>
                                    </a>
                                </li>
                            @endcanany
                            @canany(['course-sub-category-list', 'course-sub-category-create', 'course-sub-category-edit',
                                'course-sub-category-delete'])
                                <li class="nav-item">

                                    <a href="{{ route('course-sub-categories.index') }}"
                                        class="nav-link {{ request()->is('admin/course-sub-categories') || request()->is('admin/course-sub-categories/*') ? 'active' : '' }}">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-chevron-right">
                                                <polyline points="9 18 15 12 9 6"></polyline>
                                            </svg>
                                        </span>
                                        <p>{{ __('dashboard.subcetagory') }}</p>
                                    </a>
                                </li>
                            @endcanany
                            @canany(['course-language-list', 'course-language-create', 'course-language-edit',
                                'course-language-delete'])
                                <li class="nav-item">

                                    <a href="{{ route('course-languages.index') }}"
                                        class="nav-link {{ request()->is('admin/course-languages') || request()->is('admin/course-languages/*') ? 'active' : '' }}">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-chevron-right">
                                                <polyline points="9 18 15 12 9 6"></polyline>
                                            </svg>
                                        </span>
                                        <p>{{ __('dashboard.language') }}</p>
                                    </a>
                                </li>
                            @endcanany
                            @canany('course-list')
                                <li class="nav-item">

                                    <a href="{{ route('course.index') }}"
                                        class="nav-link {{ request()->is('admin/course') ? 'active' : '' }}">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-chevron-right">
                                                <polyline points="9 18 15 12 9 6"></polyline>
                                            </svg>
                                        </span>
                                        <p>{{ __('dashboard.all_course') }}</p>
                                    </a>
                                </li>
                            @endcan
                            @can('course-create')
                                <li class="nav-item">
                                    <a href="{{ route('course.create') }}"
                                        class="nav-link {{ request()->is('admin/course/create') || request()->is('admin/course/create/*') ? 'active' : '' }}">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-chevron-right">
                                                <polyline points="9 18 15 12 9 6"></polyline>
                                            </svg>
                                        </span>
                                        <p>{{ __('dashboard.add_course') }}</p>
                                    </a>
                                </li>
                            @endcan
                            @canany(['course-coupon-list', 'course-coupon-create', 'course-coupon-edit',
                                'course-coupon-delete'])
                                <li class="nav-item">
                                    <a href="{{ route('admin.coupon.index') }}"
                                        class="nav-link {{ request()->is('admin/coupon') || request()->is('admin/coupon/*') ? 'active' : '' }}">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-chevron-right">
                                                <polyline points="9 18 15 12 9 6"></polyline>
                                            </svg>
                                        </span>
                                        <p>{{ __('dashboard.coupon') }}</p>
                                    </a>
                                </li>
                            @endcanany
                            {{-- prendin course  --}}
                            @canany(['course-pending', 'course-approve', 'course-reject'])
                                <li class="nav-item">

                                    <a href="{{ route('admin.course.pending') }}"
                                        class="nav-link {{ request()->is('admin/course/status/pending') || request()->is('admin/course/status/pending/*') ? 'active' : '' }}">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-chevron-right">
                                                <polyline points="9 18 15 12 9 6"></polyline>
                                            </svg>
                                        </span>
                                        <p>{{ __('dashboard.pending_course') }}</p>
                                    </a>
                                </li>
                            @endcanany
                            {{-- course review  --}}
                            @canany(['course-review-list', 'course-review-create', 'course-review-edit',
                                'course-review-delete'])
                                <li class="nav-item">

                                    <a href="{{ route('admin.course.review') }}"
                                        class="nav-link {{ request()->is('admin/course-review') || request()->is('admin/course-review/*') ? 'active' : '' }}">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-chevron-right">
                                                <polyline points="9 18 15 12 9 6"></polyline>
                                            </svg>
                                        </span>
                                        <p>{{ __('dashboard.review') }}</p>
                                    </a>
                                </li>
                            @endcanany

                        </ul>
                    </li>
                @endcanany
                {{-- Quiz  --}}
                {{-- Order  --}}
                @canany(['order-list', 'order-edit', 'order-delete'])
                    <li
                        class="nav-item {{ request()->is('admin/order*') || request()->is('admin/order') ? 'menu-open' : 'menu-close' }}">
                        <a href="#"
                            class="nav-link {{ request()->is('admin/order*') || request()->is('admin/order') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-shopping-cart"></i>
                            <p>
                                {{ __('dashboard.order') }}
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @canany(['order-list', 'order-edit', 'order-delete'])
                                <li class="nav-item">
                                    <a href="{{ route('admin.order.index') }}"
                                        class="nav-link {{ request()->is('admin/orders') || request()->is('admin/orders/*') ? 'active' : '' }}">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-chevron-right">
                                                <polyline points="9 18 15 12 9 6"></polyline>
                                            </svg>
                                        </span>
                                        <p>{{ __('dashboard.all_order') }}</p>
                                    </a>
                                </li>
                            @endcanany
                        </ul>
                    </li>
                @endcanany
                {{-- End Order  --}}
                {{-- Books  --}}
                @if (auth()->user()->usertype == 'admin')
                    <li
                        class="nav-item {{ request()->is('admin/books*') ||
                        request()->is('admin/books') ||
                        request()->is('admin/book-categories') ||
                        request()->is('admin/book-categories/*') ||
                        request()->is('admin/book-genres') ||
                        request()->is('admin/book-genres/*') ||
                        request()->is('admin/book-review') ||
                        request()->is('admin/book-review/*')
                            ? 'menu-open'
                            : 'menu-close' }}">
                        <a href="#"
                            class="nav-link {{ request()->is('admin/books*') || request()->is('admin/books') || request()->is('admin/book-categories') || request()->is('admin/book-categories/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                {{ __('dashboard.book') }}
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.book-categories.index') }}"
                                    class="nav-link {{ request()->is('admin/book-categories') || request()->is('admin/book-categories/*') ? 'active' : '' }}">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-chevron-right">
                                            <polyline points="9 18 15 12 9 6"></polyline>
                                        </svg>
                                    </span>
                                    <p>{{ __('dashboard.cetagory') }}</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('admin.book-genres.index') }}"
                                    class="nav-link {{ request()->is('admin/book-genres') || request()->is('admin/book-genres/*') ? 'active' : '' }}">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-chevron-right">
                                            <polyline points="9 18 15 12 9 6"></polyline>
                                        </svg>
                                    </span>
                                    <p>{{ __('dashboard.genre') }}</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('admin.books.index') }}"
                                    class="nav-link {{ request()->is('admin/books') ? 'active' : '' }}">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-chevron-right">
                                            <polyline points="9 18 15 12 9 6"></polyline>
                                        </svg>
                                    </span>
                                    <p>{{ __('dashboard.all_book') }}</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('admin.books.create') }}"
                                    class="nav-link {{ request()->is('admin/books/create') || request()->is('admin/books/create/*') ? 'active' : '' }}">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-chevron-right">
                                            <polyline points="9 18 15 12 9 6"></polyline>
                                        </svg>
                                    </span>
                                    <p>{{ __('dashboard.add_book') }}</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('admin.book.review') }}"
                                    class="nav-link {{ request()->is('admin/book-review') || request()->is('admin/book-review/*') ? 'active' : '' }}">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-chevron-right">
                                            <polyline points="9 18 15 12 9 6"></polyline>
                                        </svg>
                                    </span>
                                    <p>Book Review</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                @endif
                {{-- End Books  --}}
                @if (auth()->user()->usertype == 'admin')
                    <li
                        class="nav-item {{ request()->is('admin/book-orders*') || request()->is('admin/book-orders') ? 'menu-open' : 'menu-close' }}">
                        <a href="{{ route('admin.book-orders.index') }}"
                            class="nav-link {{ request()->is('admin/book-orders*') || request()->is('admin/book-orders') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-cart-plus"></i>
                            <p>
                                {{ __('dashboard.orderd_books') }}
                            </p>
                        </a>
                    </li>
                @endif
                {{-- Users  --}}
                @canany(['user-list', 'user-create', 'user-edit', 'user-delete', 'role-list', 'role-create',
                    'role-edit', 'role-delete'])
                    <li
                        class="nav-item {{ request()->is('admin/user') || request()->is('admin/user/*') || request()->is('admin/role') || request()->is('admin/role/*') ? 'menu-open' : 'menu-close' }} ">
                        <a href="#"
                            class="nav-link {{ request()->is('admin/user') || request()->is('admin/user/*') || request()->is('admin/role') || request()->is('admin/role/*') ? 'active' : '' }} ">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                {{ __('dashboard.user') }}
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @canany(['user-list', 'user-create', 'user-edit', 'user-delete'])
                                <li class="nav-item">
                                    <a href="{{ route('user.index') }}"
                                        class="nav-link {{ request()->is('admin/user') || request()->is('admin/user/*') ? 'active' : '' }} ">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-chevron-right">
                                                <polyline points="9 18 15 12 9 6"></polyline>
                                            </svg>
                                        </span>
                                        <p>{{ __('dashboard.user') }}</p>
                                    </a>
                                </li>
                            @endcanany
                            @canany(['role-list', 'role-create', 'role-edit', 'role-delete'])
                                <li class="nav-item">
                                    <a href="{{ route('role.index') }}"
                                        class="nav-link {{ request()->is('admin/role') || request()->is('admin/role/*') ? 'active' : '' }}  ">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-chevron-right">
                                                <polyline points="9 18 15 12 9 6"></polyline>
                                            </svg>
                                        </span>
                                        <p>{{ __('dashboard.role') }}</p>
                                    </a>
                                </li>
                            @endcanany
                        </ul>
                    </li>
                @endcanany

                @canany(['instructor-list', 'instructor-edit', 'instructor-delete', 'instructor-create'])
                    {{-- All Instructor  --}}
                    <li
                        class="nav-item {{ request()->is('admin/instructor') || request()->is('admin/instructor/*') || request()->is('admin/teacher/pending') || request()->is('admin/teacher/all') || request()->is('admin/teacher/pending') || request()->is('admin/wihdraw/pending-list') ? 'menu-open' : 'menu-close' }}">
                        <a href="#"
                            class="nav-link {{ request()->is('admin/instructor') || request()->is('admin/instructor/*') || request()->is('admin/teacher/pending') || request()->is('admin/teacher/all') || request()->is('admin/teacher/pending') || request()->is('admin/wihdraw/pending-list') ? 'active' : '' }} ">
                            <i class="nav-icon fas fa-user-graduate"></i>
                            <p>
                                {{ __('dashboard.instructor') }}
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('all.instructor') }}"
                                    class="nav-link {{ request()->is('admin/teacher/all') || request()->is('admin/teacher/all/*') ? 'active' : '' }}">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-chevron-right">
                                            <polyline points="9 18 15 12 9 6"></polyline>
                                        </svg>
                                    </span>
                                    <i class="far fa-chalkboard-user"></i>
                                    <p>{{ __('dashboard.all_instructor') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('pending.instructor') }}"
                                    class="nav-link {{ request()->is('admin/teacher/pending') || request()->is('admin/teacher/pending/*') ? 'active' : '' }} ">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-chevron-right">
                                            <polyline points="9 18 15 12 9 6"></polyline>
                                        </svg>
                                    </span>
                                    <p>{{ __('dashboard.pending_instructor') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.withdraw.pending.list') }}"
                                    class="nav-link {{ request()->is('admin/wihdraw/pending-list') || request()->is('admin/teacher/pending/*') ? 'active' : '' }}">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-chevron-right">
                                            <polyline points="9 18 15 12 9 6"></polyline>
                                        </svg>
                                    </span>
                                    <p>{{ __('dashboard.withdraw_pending_list') }}</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcanany

                @canany(['page-list', 'page-create', 'page-edit', 'page-delete', 'page-show'])
                    <li
                        class="nav-item {{ request()->is('admin/pages') || request()->is('admin/pages/*') ? 'menu-open' : 'menu-close' }} ">
                        <a href="#"
                            class="nav-link {{ request()->is('admin/pages') || request()->is('admin/pages/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-file"></i>
                            <p>
                                {{ __('dashboard.page') }}
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            @can('page-list')
                                <li class="nav-item">
                                    <a href="{{ route('admin.pages.index') }}"
                                        class="nav-link {{ request()->is('admin/pages') || request()->is('admin/pages') ? 'active' : '' }}">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-chevron-right">
                                                <polyline points="9 18 15 12 9 6"></polyline>
                                            </svg>
                                        </span>
                                        <p>{{ __('dashboard.all_page') }}</p>
                                    </a>
                                </li>
                            @endcan
                            @can('page-create')
                                <li class="nav-item">
                                    <a href="{{ route('admin.pages.create') }}"
                                        class="nav-link {{ request()->is('admin/pages/create') || request()->is('admin/pages/create/*') ? 'active' : '' }}">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-chevron-right">
                                                <polyline points="9 18 15 12 9 6"></polyline>
                                            </svg>
                                        </span>
                                        <p>{{ __('dashboard.add_page') }}</p>
                                    </a>
                                </li>
                            </ul>
                        @endcan
                    </li>
                @endcanany
                {{-- appearance --}}
                @canany(['home-page', 'hero-section', 'category-section', 'banner-section', 'find-course-section',
                    'event-section', 'price-section', 'about-page', 'about-section', 'brand-section', 'testimonial-section',
                    'menu-list', 'menu-create', 'menu-edit', 'menu-delete'])
                    <li
                        class="nav-item {{ request()->is('admin/appearance') || request()->is('admin/appearance/*') || request()->is('admin/about/*') || request()->is('admin/about') || request()->is('admin/home/*') || request()->is('admin/custom/*') ? 'menu-open' : 'menu-close' }}">
                        <a href="#"
                            class="nav-link {{ request()->is('admin/appearance') || request()->is('admin/appearance/*') || request()->is('admin/about/*') || request()->is('admin/about') || request()->is('admin/home/*') || request()->is('admin/custom/instructor/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-palette"></i>
                            <p>
                                {{ __('dashboard.appearance') }}
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @canany(['home-page', 'hero-section', 'category-section', 'banner-section',
                                'find-course-section', 'event-section', 'price-section'])
                                <li class="nav-item">

                                    <a href="{{ route('admin.pages.homepage.hero') }}"
                                        class="nav-link {{ request()->is('admin/home') || request()->is('admin/home/*') ? 'active' : '' }}">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-chevron-right">
                                                <polyline points="9 18 15 12 9 6"></polyline>
                                            </svg>
                                        </span>
                                        <p>{{ __('dashboard.home_page') }}</p>
                                    </a>
                                </li>
                            @endcanany
                            @canany(['about-page', 'about-section', 'brand-section', 'testimonial-section'])
                                <li class="nav-item">

                                    <a href="{{ route('admin.pages.about') }}"
                                        class="nav-link {{ request()->is('admin/about') || request()->is('admin/about/*') ? 'active' : '' }}">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-chevron-right">
                                                <polyline points="9 18 15 12 9 6"></polyline>
                                            </svg>
                                        </span>
                                        <p>{{ __('dashboard.about_page') }}</p>
                                    </a>
                                </li>
                            @endcanany

                            @canany(['about-page', 'about-section', 'brand-section', 'testimonial-section'])
                                <li class="nav-item">
                                    <a href="{{ route('admin.pages.instructor') }}"
                                        class="nav-link {{ request()->is('admin/custom/instructor') || request()->is('admin/custom/instructor/*') ? 'active' : '' }}">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-chevron-right">
                                                <polyline points="9 18 15 12 9 6"></polyline>
                                            </svg>
                                        </span>
                                        <p>{{ __('dashboard.instructor_page') }}</p>
                                    </a>
                                </li>
                            @endcanany

                            @canany(['menu-list', 'menu-create', 'menu-edit', 'menu-delete'])
                                <li class="nav-item">
                                    <a href="{{ route('admin.appearance.menu') }}"
                                        class="nav-link {{ request()->is('admin/appearance/menu') || request()->is('admin/appearance/menu/*') ? 'active' : '' }}">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-chevron-right">
                                                <polyline points="9 18 15 12 9 6"></polyline>
                                            </svg>
                                        </span>
                                        <p>{{ __('dashboard.menu') }}</p>
                                    </a>
                                </li>
                            @endcanany
                        </ul>
                    </li>
                @endcanany

                {{-- End Pages  --}}

                {{-- News Letter  --}}
                @canany(['subscriber-list', 'subscriber-delete', 'bulk-email-list', 'bulk-email-create'])
                    <li
                        class="nav-item {{ request()->is('admin/newsletter') || request()->is('admin/newsletter/*') || request()->is('admin/bulk-email') ? 'menu-open' : 'menu-close' }}">
                        <a href="#"
                            class="nav-link {{ request()->is('admin/newsletter') || request()->is('admin/newsletter/*') || request()->is('admin/bulk-email') ? 'active' : '' }} ">
                            <i class="nav-icon fas fa-envelope"></i>
                            <p>
                                {{ __('dashboard.newsletter') }}
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{ route('admin.newsletter.index') }}"
                                    class="nav-link {{ request()->is('admin/newsletter') || request()->is('admin/newsletter/*') ? 'active' : '' }}">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-chevron-right">
                                            <polyline points="9 18 15 12 9 6"></polyline>
                                        </svg>
                                    </span>

                                    <p>{{ __('dashboard.all_subscriber') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.bulk.email') }}"
                                    class="nav-link {{ request()->is('admin/bulk-email') || request()->is('admin/bulk-email/*') ? 'active' : '' }}">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-chevron-right">
                                            <polyline points="9 18 15 12 9 6"></polyline>
                                        </svg>
                                    </span>
                                    <p>{{ __('dashboard.bulk_emails') }}</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcanany
                {{-- End News Letter  --}}

                {{-- Events  --}}
                @canany(['event-list', 'event-create', 'event-edit', 'event-delete'])
                    <li
                        class="nav-item {{ request()->is('admin/event') || request()->is('admin/event/*') ? 'menu-open' : 'menu-close' }}">
                        <a href="#"
                            class="nav-link {{ request()->is('admin/event') || request()->is('admin/event/*') ? 'active' : '' }} ">
                            <i class="nav-icon fas fa-calendar-alt"></i>
                            <p>
                                {{ __('dashboard.events') }}
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">

                                <a href="{{ route('admin.events.index') }}"
                                    class="nav-link {{ request()->is('admin/event') || request()->is('admin/event') ? 'active' : '' }}">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-chevron-right">
                                            <polyline points="9 18 15 12 9 6"></polyline>
                                        </svg>
                                    </span>
                                    <p>{{ __('dashboard.all_events') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">

                                <a href="{{ route('admin.events.create') }}"
                                    class="nav-link {{ request()->is('admin/event/create') || request()->is('admin/event/create/*') ? 'active' : '' }}">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-chevron-right">
                                            <polyline points="9 18 15 12 9 6"></polyline>
                                        </svg>
                                    </span>
                                    <p>{{ __('dashboard.add_events') }}</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcanany

                {{-- End Events --}}

                {{-- settings  --}}
                @canany(['profile', 'general-setting', 'smtp-setting', 'sidebar-setting', 'payout-setting',
                    'withdraw-list', 'withdrow-create'])
                    <li
                        class="nav-item {{ request()->is('admin/setting') || request()->is('admin/setting/*') ? 'menu-open' : 'menu-close' }}">
                        <a href="#"
                            class="nav-link {{ request()->is('admin/setting') || request()->is('admin/setting/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>
                                {{ __('dashboard.setting') }}
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('profile')
                                <li class="nav-item">
                                    <a href="{{ route('admin.profile') }}"
                                        class="nav-link {{ request()->is('admin/setting/admin-profile') || request()->is('admin/setting/admin-profile/*') || request()->is('admin/setting/profile/password') ? 'active' : '' }} ">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-chevron-right">
                                                <polyline points="9 18 15 12 9 6"></polyline>
                                            </svg>
                                        </span>
                                        <p>{{ __('dashboard.profile') }}</p>
                                    </a>
                                </li>
                            @endcan
                            @can('general-setting')
                                <li class="nav-item">

                                    <a href="{{ route('admin.general.setting') }}"
                                        class="nav-link {{ request()->is('admin/setting/general-setting') || request()->is('admin/setting/general-setting/*') ? 'active' : '' }} ">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-chevron-right">
                                                <polyline points="9 18 15 12 9 6"></polyline>
                                            </svg>
                                        </span>
                                        <p>{{ __('dashboard.general_setting') }}</p>
                                    </a>
                                </li>
                            @endcan
                            @can('smtp-setting')
                                <li class="nav-item">

                                    <a href="{{ route('admin.smtp.setting') }}"
                                        class="nav-link {{ request()->is('admin/setting/smtp-setting') || request()->is('admin/setting/smtp-setting/*') ? 'active' : '' }} ">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-chevron-right">
                                                <polyline points="9 18 15 12 9 6"></polyline>
                                            </svg>
                                        </span>
                                        <p>{{ __('dashboard.smtp_setting') }}</p>
                                    </a>
                                </li>
                            @endcan
                            @can('sidebar-setting')
                                <li class="nav-item">

                                    <a href="{{ route('admin.sidebar.setting') }}"
                                        class="nav-link {{ request()->is('admin/setting/sidebar-setting') || request()->is('admin/setting/sidebar-setting/*') ? 'active' : '' }}">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-chevron-right">
                                                <polyline points="9 18 15 12 9 6"></polyline>
                                            </svg>
                                        </span>
                                        <p>{{ __('dashboard.sidebar_setting') }}</p>
                                    </a>
                                </li>
                            @endcan
                            @can('payout-setting')
                                <li class="nav-item">

                                    <a href="{{ route('admin.payout.setting') }}"
                                        class="nav-link {{ request()->is('admin/setting/payout-info') || request()->is('admin/setting/payout-info/*') ? 'active' : '' }}">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-chevron-right">
                                                <polyline points="9 18 15 12 9 6"></polyline>
                                            </svg>
                                        </span>
                                        <p>{{ __('dashboard.payout_setting') }}</p>
                                    </a>
                                </li>
                            @endcan
                            @can('withdraw-list')
                                <li class="nav-item">

                                    <a href="{{ route('admin.withdraw.list') }}"
                                        class="nav-link {{ request()->is('admin/setting/withdraw-list') || request()->is('admin/setting/withdraw-list/*') ? 'active' : '' }}">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-chevron-right">
                                                <polyline points="9 18 15 12 9 6"></polyline>
                                            </svg>
                                        </span>
                                        <p>{{ __('dashboard.withdraw') }}</p>
                                    </a>
                                </li>
                            @endcan
                            @can('commission-setting')
                                <li class="nav-item">
                                    <a href="{{ route('admin.admin.commission') }}"
                                        class="nav-link {{ request()->is('admin/setting/admin-commission') || request()->is('admin/setting/admin-commission/*') ? 'active' : '' }}">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-chevron-right">
                                                <polyline points="9 18 15 12 9 6"></polyline>
                                            </svg>
                                        </span>
                                        <p>{{ __('dashboard.commission_setting') }}</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcanany

                {{-- End settings  --}}

                {{-- paymet  --}}
                @can('smtp-setting')
                    <li
                        class="nav-item {{ request()->is('admin/payment-method') || request()->is('admin/payment-method/*') ? 'menu-open' : 'menu-close' }}">
                        <a href="#"
                            class="nav-link {{ request()->is('admin/payment-method') || request()->is('admin/payment-method/*') ? 'active' : '' }} ">
                            <i class="nav-icon fas fa-money-check-alt"></i>
                            <p>
                                {{ __('dashboard.payment_method') }}
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.payment.index') }}"
                                    class="nav-link {{ request()->is('admin/payment-method') || request()->is('admin/payment-method') ? 'active' : '' }}">
                                    <span>
                                        <i class="fas fa-money-check-alt"></i>
                                    </span>
                                    <p>{{ __('dashboard.payment_method') }}</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan

                @if (auth()->user()->usertype == 'admin')
                    <li class="nav-item">
                        <a href="{{ route('admin.updtae') }}"
                            class="nav-link {{ request()->is('admin/update') || request()->is('admin/update/*') ? 'active' : '' }} ">
                            <i class="nav-icon fas fa-sync"></i>
                            <p>
                                {{ __('dashboard.update_system') }}
                            </p>
                        </a>
                    </li>
                @endif

                @if (auth()->user()->usertype == 'admin')
                    <li class="nav-item">
                        <a href="{{ route('admin.backup') }}"
                            class="nav-link {{ request()->is('admin/backup') || request()->is('admin/backup/*') ? 'active' : '' }} ">
                            <i class="nav-icon fas fa-undo"></i>
                            <p>
                                {{ __('dashboard.update_system') }}
                            </p>
                        </a>
                    </li>
                @endif



            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
</aside>
