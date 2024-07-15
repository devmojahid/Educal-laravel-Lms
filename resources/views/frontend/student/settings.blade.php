@extends("frontend.layouts.master")
@section("title","Dashboard Page")
@section("content")
    @include("frontend.layouts.breadcrumb",["title"=>"Dashboard"])
<section class="error__area pt-200 pb-200">
    <div class="container">
        <div class="row">
            <div class="col-xl-4">
                @include("frontend.student.dashboard-menu")
            </div>
            <div class="col-xl-8">
                <form action="{{ route("student.user.update",auth()->user()->id) }}" method="POST" enctype="multipart/form-data">
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
                    <div class="course__thumb w-img p-relative fix mb-4">
                        <label for="userphoto">
                            <img src="
                            @if (Auth::user()->image != null)
                                {{ asset(Auth::user()->image) }}
                            @else
                                {{ asset("uploads/users/default.png") }} @endif " 
                            id="clickeble">
                        </label>
                                <input type="file" name="image" id="userphoto" hidden>
                                @error('image')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                        </div> 
                        <div class="row my-3">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="first_name">{{ __("dashboard.first_name") }} <span class="text-danger">{{ __("dashboard.*") }}</span></label>
                                    <input type="text" name="first_name" value="{{ old("last_name") ?? auth()->user()->first_name }}" class="form-control" id="first_name" placeholder="{{ __("dashboard.enter_first_name") }} " required>
                                    @error('first_name')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="last_name">{{ __("dashboard.last_name") }} <span class="text-danger">{{ __("dashboard.*") }}</span></label>
                                    <input type="text" name="last_name" value="{{ old("last_name") ?? auth()->user()->last_name }}" class="form-control" id="last_name" placeholder="{{ __("dashboard.enter_last_name") }}" required>
                                    @error('last_name')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        {{-- Email And Password --}}
                        <div class="row my-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="email">{{ __("dashboard.email") }} <span class="text-danger">{{ __("dashboard.*") }}</span></label>
                                    <input type="email" name="email" value="{{ old("email") ?? auth()->user()->email }}" class="form-control" id="email" placeholder="{{ __("dashboard.enter_email") }}" required>
                                    @error('email')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- user Phone & Website --}}
                        <div class="row my-3">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="phone">{{ __("dashboard.phone") }}</label>
                                    <input type="text" name="phone" value="{{ old("phone") ?? auth()->user()->phone  }}" class="form-control" id="phone" placeholder="{{ __("dashboard.enter_phone") }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="website">{{ __("dashboard.website") }}</label>
                                    <input type="text" name="website" value="{{ old("website") ?? auth()->user()->website }}" class="form-control" id="website" placeholder="{{ __("dashboard.enter_website") }}">
                                </div>
                            </div>
                        </div>
                        {{-- user Country & City --}}
                        <div class="row my-3">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="country">{{ __("dashboard.country") }}</label>
                                    <input type="text" name="country" value="{{ old("country") ?? auth()->user()->country }}" class="form-control" id="country" placeholder="{{ __("dashboard.enter_country") }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="city">{{ __("dashboard.city") }}</label>
                                    <input type="text" name="city" value="{{ old("city") ?? auth()->user()->city }}" class="form-control" id="city" placeholder="{{ __("dashboard.enter_city") }}">
                                </div>
                            </div>
                        </div>
                        {{-- user address & City --}}
                        <div class="row my-3">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="address">{{ __("dashboard.address") }}</label>
                                    <input type="text" name="address" value="{{ old("address") ?? auth()->user()->address }}" class="form-control" id="address" placeholder="{{ __("dashboard.enter_address") }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="postal_code">{{ __("dashboard.postal_code") }}</label>
                                    <input type="text" name="postal_code" value="{{ old("postal_code") ?? auth()->user()->postal_code }}" class="form-control" id="postal_code" placeholder="{{ __("dashboard.enter_postal_code") }}">
                                </div>
                            </div>
                        </div>

                        {{-- Facebook & Twitter --}}
                        <div class="row my-3">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="facebook">{{ __("dashboard.facebook") }}</label>
                                    <input type="text" name="facebook" value="{{ old("facebook") ?? auth()->user()->facebook }}" class="form-control" id="facebook" placeholder="{{ __("dashboard.enter_facebook") }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="twitter">{{ __("dashboard.twitter") }}</label>
                                    <input type="text" name="twitter" value="{{ old("twitter") ?? auth()->user()->twitter }}" class="form-control" id="twitter" placeholder="{{ __("dashboard.enter_twitter") }}">
                                </div>
                            </div>
                        </div>
                        {{-- Linkedin & Instagram --}}
                        <div class="row my-3">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="linkedin">{{ __("dashboard.linkedin") }}</label>
                                    <input type="text" name="linkedin" value="{{ old("linkedin") ?? auth()->user()->linkedin }}" class="form-control" id="linkedin" placeholder="{{ __("dashboard.enter_linkedin") }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="instagram">{{ __("dashboard.instagram") }}</label>
                                    <input type="text" name="instagram" value="{{ old("instagram") ?? auth()->user()->instagram }}" class="form-control" id="instagram" placeholder="{{ __("dashboard.enter_instagram") }}">
                                </div>
                            </div>
                        </div>

                        {{-- youtube & vimeo --}}
                        <div class="row my-3">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="youtube">{{ __("dashboard.youtube") }}</label>
                                    <input type="text" name="youtube" value="{{ old("youtube") ?? auth()->user()->youtube  }}" class="form-control" id="youtube" placeholder="{{ __("dashboard.enter_youtube") }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="vimeo">{{ __("dashboard.vimeo") }}</label>
                                    <input type="text" name="vimeo" value="{{ old("vimeo") ?? auth()->user()->vimeo  }}" class="form-control" id="vimeo" placeholder="{{ __("dashboard.enter_vimeo") }}">
                                </div>
                            </div>
                        </div>

                        {{-- designation & experience --}}
                        <div class="row my-3">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="designation">{{ __("dashboard.designation") }}</label>
                                    <input type="text" name="designation" value="{{ old("designation") ?? auth()->user()->designation  }}" class="form-control" id="designation" placeholder="{{ __("dashboard.enter_designation") }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="experience">{{ __("dashboard.experience") }}</label>
                                    <input type="text" name="experience" value="{{ old("experience") ?? auth()->user()->experience  }}" class="form-control" id="experience" placeholder="{{ __("dashboard.enter_experience") }}">
                                </div>
                            </div>
                        </div>
                        {{-- Bio Section --}}
                        <div class="row my-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="bio">{{ __("dashboard.bio") }}</label>
                                    <textarea type="text" name="bio" class="form-control" id="bio" rows="5">{{ old("bio") ?? auth()->user()->bio }}</textarea>
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
@push("scripts")
<script>
    "use strict";
    $(document).ready(function() {
        $("#userphoto").on("change",function(){
            let file = $(this).prop("files")[0];
            let reader = new FileReader();
            reader.onloadend = function(){
                $("#clickeble").attr("src",reader.result);
            }
            reader.readAsDataURL(file);
        });
    });
</script>
@endpush