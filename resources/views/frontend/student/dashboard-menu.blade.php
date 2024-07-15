<div class="tp-dashboard-menu">
    <ul>
        <li class="@if (url()->current() == route('dashboard.')) active @endif "><a href="{{ route('dashboard.') }}"> <i
                    class="fas fa-chart-line"></i> Dashboard</a></li>
        <li class="@if (url()->current() == route('dashboard.profile')) active @endif "><a href="{{ route('dashboard.profile') }}"> <i
                    class="fas fa-user"></i> My Profile</a></li>
        <li class="@if (url()->current() == route('dashboard.enrolled.course')) active @endif "><a href="{{ route('dashboard.enrolled.course') }}"><i
                    class="fas fa-graduation-cap"></i> {{ __('frontend.enrolled_course') }} </a></li>

        <li class="@if (url()->current() == route('dashboard.enrolled.book')) active @endif "><a href="{{ route('dashboard.enrolled.book') }}"><i
                    class="fas fa-store"></i>
                {{ __('frontend.shop') }} </a></li>

        <li class=" @if (url()->current() == route('dashboard.order.history')) active @endif "><a href="{{ route('dashboard.order.history') }}">
                <i class="fas fa-shopping-cart"></i> Order History</a></li>
        <li class="@if (url()->current() == route('dashboard.settings') || url()->current() == route('student.user.update.password.get')) active @endif "><a href="{{ route('dashboard.settings') }}"><i
                    class="fas fa-cogs"></i> Settings</a></li>
        <li><a href="{{ route('dashboard.instructor.apply') }}"><i class="fas fa-chalkboard-teacher"></i> Apply As
                Teacher</a></li>
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="student-logout"><i class="fas fa-sign-out-alt"></i>
                    {{ __('dashboard.logout') }}</button>
            </form>
        </li>
        <li class="tp-dashboard-menu-divider"></li>
    </ul>
</div>
