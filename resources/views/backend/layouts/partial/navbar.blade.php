<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ url('/') }}" target="_blank" class="nav-link">{{ __('dashboard.home') }}</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        @can('language-change')
            <!-- Navbar Search -->
        <li class="nav-item">
            <select class="form-control" id="change_language">
            <option value="">{{ __("dashboard.select_language") }}</option>
            <option value="en" {{ session()->get('lang_code')=='en' ? 'selected' : ''}}>{{ __("dashboard.english") }}</option>
            <option value="bn" {{ session()->get('lang_code')=='bn' ? 'selected' : ''}}>{{ __("dashboard.bangla") }}</option>
            <option value="ar" {{ session()->get('lang_code')=='ar' ? 'selected' : ''}}>{{ __("dashboard.arabic") }}</option>
            </select>
        </li>
        @endcan
        
        {{-- clear cache --}}
        @can('clear-cache')
            <li class="nav-item">
                <a class="btn edu-btn-header ml-1 mr-1" href="{{ route('admin.clear.cache') }}" role="button">
                    <i class="fas fa-sync-alt"></i> {{ __('dashboard.clear_cache') }}
                </a>
            </li>
        @endcan

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn edu-btn-header-red edu-header-logout ml-1 mr-1"><i class="fas fa-sign-out-alt"></i>
                {{ __('dashboard.logout') }}</button>
        </form>

        @php
            $notifications = Auth::user()->notifications;
            $unreadNotifications = Auth::user()->unreadNotifications;
            $readNotifications = Auth::user()->readNotifications;
        @endphp
        <li class="nav-item dropdown">
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">{{ $unreadNotifications->count() }} Notifications</span>

                <div class="dropdown-divider"></div>
                @foreach ($unreadNotifications as $notification)
                    <a href="" class="dropdown-item d-flex align-items-center justify-content-center mb-1">
                        <i class="fas fa-envelope mr-2"></i> {{ $notification['data']['data']['message'] }}
                        <span
                            class="float-right text-muted text-sm ml-3">{{ $notification->created_at->diffForHumans() }}</span>
                    </a>

                    @php
                        $notification->markAsRead();
                    @endphp
                @endforeach

                <div class="dropdown-divider"></div>
                @foreach ($readNotifications as $notification)
                    <a href="" class="dropdown-item read d-flex align-items-center justify-content-center mb-1">
                        <i class="fas fa-envelope mr-2"></i> {{ $notification['data']['data']['message'] }}
                        <span
                            class="float-right text-muted text-sm ml-3">{{ $notification->created_at->diffForHumans() }}</span>
                    </a>
                @endforeach
            </div>
        </li>
        <li class="nav-item tp-full-screen">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>
</nav>
