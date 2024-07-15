@extends("frontend.layouts.master")
@section("title","Password Change")
@section("content")
    @include("frontend.layouts.breadcrumb",["title"=>"Dashboard"])
<section class="error__area pt-200 pb-200">
    <div class="container">
        @include("frontend.layouts.message")
        <div class="row">
            <div class="col-xl-4">
                @include("frontend.student.dashboard-menu")
            </div>
            
            <div class="col-xl-8">
                <form action="{{ route("student.user.update.password.post",auth()->user()->id) }}" method="POST">
                    @csrf
                    @method("PUT")
                    <div class="tp-dashboard-body My Profile">
                        <h3 class="dashboard-title mb-20">{{ __("dashboard.setting") }}</h3>
                        <div class="tp-dashboard-nav mb-30">
                        <ul>
                            <li><a class="@if (request()->routeIs("dashboard.settings")) is-active @endif" href="{{ route("dashboard.settings") }}">{{ __("dashboard.profile") }}</a></li>
                            <li><a class="@if (request()->routeIs("student.user.update.password.get")) is-active @endif" href="{{ route("student.user.update.password.get") }}">{{ __("dashboard.change_password") }}</a></li>
                        </ul>
                        </div>
            
                        <div class="row my-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="old_password">{{ __("dashboard.old_password") }} <span class="text-danger">{{ __("dashboard.*") }}</span></label>
                                    <input type="password" name="old_password" class="form-control" id="old_password" placeholder="{{ __("dashboard.old_password") }}" value="{{ old("old_password")}}" required>
                                    @error('old_password')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="new_password">{{ __("dashboard.new_password") }} <span class="text-danger">{{ __("dashboard.*") }}</span></label>
                                    <input type="password" name="password" class="form-control" id="new_password" placeholder="{{ __("dashboard.new_password") }}" required>
                                    @error('new_password')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>            
                        <div class="row my-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="confirm_password">{{ __("dashboard.confirm_password") }} <span class="text-danger">{{ __("dashboard.*") }}</span></label>
                                    <input type="password" name="password_confirmation" class="form-control" id="confirm_password" placeholder="{{ __("dashboard.confirm_password") }}" required>
                                    @error('confirm_password')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <button type="submit" class="e-btn mt-15">{{ __("dashboard.update") }}</button>
                    </div>
                </form>  
            </div>
        </div>
    </div>
</section>
@endsection
