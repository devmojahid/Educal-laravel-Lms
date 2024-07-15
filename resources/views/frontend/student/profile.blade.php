@extends("frontend.layouts.master")
@section("title","Profile Page")
@section("content")
    @include("frontend.layouts.breadcrumb",["title"=>"Profile"])
<section class="error__area pt-200 pb-200">
    <div class="container">
        <div class="row">
            <div class="col-xl-4">
                @include("frontend.student.dashboard-menu")
            </div>
            <div class="col-xl-8">
                <div class="tp-dashboard-body My Profile ">
                    <h3 class="dashboard-title mb-20">{{ __("dashboard.my_profile") }}</h3>
                    <div class="row mb-20">
                        <div class="col-md-4">
                            <div class="tp-profile-label">
                                <span class="tp-color-secondary">{{ __("dashboard.register_date") }}</span>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="tp-profile-value">
                                <span class="tp-color-black ">{{monthDayYear($user->created_at) }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-20">
                        <div class="col-md-4">
                            <div class="tp-profile-label">
                                <span class="tp-color-secondary">{{ __("dashboard.first_name") }}</span>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="tp-profile-value">
                                <span class="tp-color-black ">{{ $user->first_name }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-20">
                        <div class="col-md-4">
                            <div class="tp-profile-label">
                                <span class="tp-color-secondary">{{ __("dashboard.last_name") }}</span>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="tp-profile-value">
                                <span class="tp-color-black ">{{ $user->last_name }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-20">
                        <div class="col-md-4">
                            <div class="tp-profile-label">
                                <span class="tp-color-secondary">{{ __("dashboard.email") }}</span>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="tp-profile-value">
                                <span class="tp-color-black ">{{ $user->email }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-20">
                        <div class="col-md-4">
                            <div class="tp-profile-label">
                                <span class="tp-color-secondary">{{ __("dashboard.phone") }}</span>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="tp-profile-value">
                                <span class="tp-color-black ">{{ $user->phone ?? __("dashboard.--") }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-20">
                        <div class="col-md-4">
                            <div class="tp-profile-label">
                                <span class="tp-color-secondary">{{ __("dashboard.designation") }}</span>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="tp-profile-value">
                                <span class="tp-color-black ">{{ $user->designation ?? __("dashboard.--") }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-20">
                        <div class="col-md-4">
                            <div class="tp-profile-label">
                                <span class="tp-color-secondary">{{ __("dashboard.status") }}</span>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="tp-profile-value">
                                <span class="tp-color-black ">{{ $user->status ?? __("dashboard.--") }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-20">
                        <div class="col-md-4">
                            <div class="tp-profile-label">
                                <span class="tp-color-secondary">{{ __("dashboard.country") }}</span>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="tp-profile-value">
                                <span class="tp-color-black ">{{ $user->country ?? __("dashboard.--") }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-20">
                        <div class="col-md-4">
                            <div class="tp-profile-label">
                                <span class="tp-color-secondary">{{ __("dashboard.city") }}</span>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="tp-profile-value">
                                <span class="tp-color-black ">{{ $user->city ?? __("dashboard.--") }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-20">
                        <div class="col-md-4">
                            <div class="tp-profile-label">
                                <span class="tp-color-secondary">{{ __("dashboard.address") }}</span>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="tp-profile-value">
                                <span class="tp-color-black ">{{ $user->address ?? __("dashboard.--") }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-20">
                        <div class="col-md-4">
                            <div class="tp-profile-label">
                                <span class="tp-color-secondary">{{ __("dashboard.postal_code") }}</span>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="tp-profile-value">
                                <span class="tp-color-black ">{{ $user->postal_code ?? __("dashboard.--") }}</span>
                            </div>
                        </div>
                    </div>
                    {{-- social  --}}
                    <div class="row mb-20">
                        <div class="col-md-4">
                            <div class="tp-profile-label">
                                <span class="tp-color-secondary">{{ __("dashboard.facebook") }}</span>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="tp-profile-value">
                                <span class="tp-color-black ">{{ $user->facebook ?? __("dashboard.--") }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-20">
                        <div class="col-md-4">
                            <div class="tp-profile-label">
                                <span class="tp-color-secondary">{{ __("dashboard.twitter") }}</span>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="tp-profile-value">
                                <span class="tp-color-black ">{{ $user->twitter ?? __("dashboard.--") }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-20">
                        <div class="col-md-4">
                            <div class="tp-profile-label">
                                <span class="tp-color-secondary">{{ __("dashboard.linkedin") }}</span>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="tp-profile-value">
                                <span class="tp-color-black ">{{ $user->linkedin ?? __("dashboard.--") }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-20">
                        <div class="col-md-4">
                            <div class="tp-profile-label">
                                <span class="tp-color-secondary">{{ __("dashboard.youtube") }}</span>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="tp-profile-value">
                                <span class="tp-color-black ">{{ $user->youtube ?? __("dashboard.--") }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-20">
                        <div class="col-md-4">
                            <div class="tp-profile-label">
                                <span class="tp-color-secondary">{{ __("dashboard.instagram") }}</span>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="tp-profile-value">
                                <span class="tp-color-black ">{{ $user->instagram ?? __("dashboard.--") }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-20">
                        <div class="col-md-4">
                            <div class="tp-profile-label">
                                <span class="tp-color-secondary">{{ __("dashboard.website") }}</span>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="tp-profile-value">
                                <span class="tp-color-black ">{{ $user->website ?? __("dashboard.--") }}</span>
                            </div>
                        </div>
                    </div>
                    {{-- End social  --}}
                    <div class="row mb-20">
                        <div class="col-md-4">
                            <div class="tp-profile-label">
                                <span class="tp-color-secondary">{{ __("dashboard.bio") }}</span>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="tp-profile-value">
                                <span class="tp-color-black ">{{ $user->bio ?? __("dashboard.--") }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection