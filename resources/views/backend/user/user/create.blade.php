@extends('backend.layouts.master')
@section('title', 'Create user')
@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/select2/css/select2.min.css') }}">
@endpush
@section('content')

    <section class="content-header info-box p-3 rounded">
        <div class="container-fluid">
            <div class="row mb-2 mt-2">
                <div class="col-sm-6">
                    <h3 class="card-title">{{ __('dashboard.create') }} {{ __('dashboard.user') }}</h3>
                </div>
                @can('user-list')
                    <div class="col-sm-6">
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('user.index') }}">
                                <i class="fas fa-plus"></i>
                                </i> {{ __('dashboard.all') }} {{ __('dashboard.user') }}
                            </a>
                        </div>
                    </div>
                @endcan
            </div>
        </div>
    </section>

    <form id="userForm" action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                {{-- user Name --}}
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="first_name">{{ __('dashboard.first_name') }} <span
                                    class="text-danger">{{ __('dashboard.*') }}</span></label>
                            <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control"
                                id="first_name" placeholder="{{ __('dashboard.enter_first_name') }} " required>
                            @error('first_name')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="last_name">{{ __('dashboard.last_name') }} <span
                                    class="text-danger">{{ __('dashboard.*') }}</span></label>
                            <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control"
                                id="last_name" placeholder="{{ __('dashboard.enter_last_name') }}" required>
                            @error('last_name')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Email And Password --}}
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="email">{{ __('dashboard.email') }} <span
                                    class="text-danger">{{ __('dashboard.*') }}</span></label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                                id="email" placeholder="{{ __('dashboard.enter_email') }}" required>
                            @error('email')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="password">{{ __('dashboard.password') }}<span
                                    class="text-danger">{{ __('dashboard.*') }}</span></label>
                            <input type="password" name="password" class="form-control" id="password"
                                placeholder="{{ __('dashboard.enter_password') }}" required>
                            @error('password')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- user type and roles section  --}}
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>{{ __('dashboard.user_type') }} <span
                                    class="text-danger">{{ __('dashboard.*') }}</span></label>
                            <select name="usertype" class="custom-select" id="userType">
                                <option selected disabled>{{ __('dashboard.select_user_type') }}</option>
                                <option value="user">{{ __('dashboard.user') }}</option>
                                <option value="admin">{{ __('dashboard.admin') }}</option>
                                <option value="instructor">{{ __('dashboard.instructor') }}</option>
                            </select>
                            @error('usertype')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>{{ __('dashboard.admin_role') }}</label>
                            <select name="roles[]" class="form-control select2" id="userRole" multiple></select>
                        </div>
                    </div>


                </div>

                <div class="mt-2 mb-2">
                    <h4>{{ __('dashboard.optional_and_personal_info') }}</h4>
                    <hr>
                </div>

                {{-- user Phone & Website --}}
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="phone">{{ __('dashboard.phone') }}</label>
                            <input type="text" name="phone" value="{{ old('phone') }}" class="form-control"
                                id="phone" placeholder="{{ __('dashboard.enter_phone') }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="website">{{ __('dashboard.website') }}</label>
                            <input type="text" name="website" value="{{ old('website') }}" class="form-control"
                                id="website" placeholder="{{ __('dashboard.enter_website') }}">
                        </div>
                    </div>
                </div>

                {{-- user Country & City --}}
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="country">{{ __('dashboard.country') }}</label>
                            <input type="text" name="country" value="{{ old('country') }}" class="form-control"
                                id="country" placeholder="{{ __('dashboard.enter_country') }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="city">{{ __('dashboard.city') }}</label>
                            <input type="text" name="city" value="{{ old('city') }}" class="form-control"
                                id="city" placeholder="{{ __('dashboard.enter_city') }}">
                        </div>
                    </div>
                </div>
                {{-- user address & City --}}
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="address">{{ __('dashboard.address') }}</label>
                            <input type="text" name="address" value="{{ old('address') }}" class="form-control"
                                id="address" placeholder="{{ __('dashboard.enter_address') }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="postal_code">{{ __('dashboard.postal_code') }}</label>
                            <input type="text" name="postal_code" value="{{ old('postal_code') }}"
                                class="form-control" id="postal_code"
                                placeholder="{{ __('dashboard.enter_postal_code') }}">
                        </div>
                    </div>
                </div>

                {{-- Facebook & Twitter --}}
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="facebook">{{ __('dashboard.facebook') }}</label>
                            <input type="text" name="facebook" value="{{ old('facebook') }}" class="form-control"
                                id="facebook" placeholder="{{ __('dashboard.enter_facebook') }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="twitter">{{ __('dashboard.twitter') }}</label>
                            <input type="text" name="twitter" value="{{ old('twitter') }}" class="form-control"
                                id="twitter" placeholder="{{ __('dashboard.enter_twitter') }}">
                        </div>
                    </div>
                </div>
                {{-- Linkedin & Instagram --}}
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="linkedin">{{ __('dashboard.linkedin') }}</label>
                            <input type="text" name="linkedin" value="{{ old('linkedin') }}" class="form-control"
                                id="linkedin" placeholder="{{ __('dashboard.enter_linkedin') }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="instagram">{{ __('dashboard.instagram') }}</label>
                            <input type="text" name="instagram" value="{{ old('instagram') }}" class="form-control"
                                id="instagram" placeholder="{{ __('dashboard.enter_instagram') }}">
                        </div>
                    </div>
                </div>
                {{-- youtube & vimeo --}}
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="youtube">{{ __('dashboard.youtube') }}</label>
                            <input type="text" name="youtube" value="{{ old('youtube') }}" class="form-control"
                                id="youtube" placeholder="{{ __('dashboard.enter_youtube') }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="vimeo">{{ __('dashboard.vimeo') }}</label>
                            <input type="text" name="vimeo" value="{{ old('vimeo') }}" class="form-control"
                                id="vimeo" placeholder="{{ __('dashboard.enter_vimeo') }}">
                        </div>
                    </div>
                </div>

                {{-- designation & experience --}}
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="designation">{{ __('dashboard.designation') }}</label>
                            <input type="text" name="designation" value="{{ old('designation') }}"
                                class="form-control" id="designation"
                                placeholder="{{ __('dashboard.enter_designation') }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="experience">{{ __('dashboard.experience') }}</label>
                            <input type="text" name="experience" value="{{ old('experience') }}"
                                class="form-control" id="experience"
                                placeholder="{{ __('dashboard.enter_experience') }}">
                        </div>
                    </div>
                </div>
                {{-- Bio Section --}}
                <div class="form-group">
                    <label for="bio">{{ __('dashboard.bio') }}</label>
                    <textarea type="text" name="bio" class="form-control" id="bio" rows="5">{{ old('bio') }}</textarea>
                </div>
                {{-- Image --}}
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="exampleInputFile">{{ __('dashboard.user_avatar') }}</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input"
                                        id="exampleInputFile">
                                    <label class="custom-file-label"
                                        for="exampleInputFile">{{ __('dashboard.choose_file') }}</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">{{ __('dashboard.upload') }}</span>
                                </div>
                            </div>
                            @error('image')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <img id="image_preview" width="100" height="100">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">{{ __('dashboard.submit') }}</button>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
    <script src="{{ asset('backend/assets/plugins/select2/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            "use strict";
            $('.select2').select2();

            $("#image_preview").hide();
            $("#exampleInputFile").on("change", function() {
                $("#image_preview").show();
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#image_preview").attr("src", e.target.result);
                }
                reader.readAsDataURL($(this)[0].files[0]);
            });

            $("#userType").on("change", function() {
                var userType = $(this).val();
                if (userType == "admin") {
                    $("#userRole").val("admin");
                    $.ajax({
                        url: "{{ route('all.roles') }}",
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $("#userRole").empty();
                            $.each(data, function(key, value) {
                                $("#userRole").append('<option value="' + value.id +
                                    '">' + value.name + '</option>');
                            });
                        }
                    });
                } else if (userType == "instructor") {
                    $("#userRole").empty();
                } else {
                    $("#userRole").empty();
                }
            });
        });
    </script>
@endpush
