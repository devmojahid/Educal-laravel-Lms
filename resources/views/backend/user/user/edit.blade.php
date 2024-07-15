@extends('backend.layouts.master')
@section('title', 'Edit user')
@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/select2/css/select2.min.css') }}">
@endpush
@section('content')
    <section class="content-header info-box p-3 rounded">
        <div class="container-fluid">
            <div class="row mb-2 mt-2">
                <div class="col-sm-6">
                    <h3 class="card-title">{{ __('dashboard.edit') }} {{ __('dashboard.user') }}</h3>
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

    <form id="userForm" action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-body">
                {{-- user Name --}}
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="first_name">First Name <span class="text-danger">*</span></label>
                            <input type="text" value="{{ $user->first_name }}" name="first_name" class="form-control"
                                id="first_name" placeholder="Enter First name" required>
                            @error('first_name')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="last_name">Last Name <span class="text-danger">*</span></label>
                            <input type="text" name="last_name" value="{{ $user->last_name }}" class="form-control"
                                id="last_name" placeholder="Enter Last name" required>
                            @error('last_name')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Email And Password --}}
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="email">Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" value="{{ $user->email }}" class="form-control"
                                id="email" placeholder="Enter Email" required>
                            @error('email')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- user type and roles section  --}}
                @if (auth()->user()->usertype == 'instructor')
                    <input type="hidden" name="usertype" value="instructor">
                    <input type="hidden" name="roles[]" value="instructor">
                @endif
                @if (auth()->user()->usertype == 'admin')
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>{{ __('dashboard.user_type') }} <span
                                        class="text-danger">{{ __('dashboard.*') }}</span></label>
                                <select name="usertype" class="custom-select" id="userType">
                                    <option selected disabled>{{ __('dashboard.select_user_type') }}</option>
                                    <option @if ($user->usertype == 'user') selected @endif value="user">
                                        {{ __('dashboard.user') }}</option>
                                    <option @if ($user->usertype == 'admin') selected @endif value="admin">
                                        {{ __('dashboard.admin') }}</option>
                                    <option @if ($user->usertype == 'instructor') selected @endif value="instructor">
                                        {{ __('dashboard.instructor') }}</option>
                                </select>
                                @error('usertype')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>{{ __('dashboard.admin_role') }}</label>
                                <select name="roles[]" class="form-control select2" id="userRole" multiple>
                                    @foreach ($roles as $role)
                                        <option @if ($user->hasRole($role->name)) selected @endif
                                            value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="mt-2 mb-2">
                    <h4>Optional And Personal Info</h4>
                    <hr>
                </div>

                {{-- user Phone & Website --}}
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" value="{{ $user->phone }}" class="form-control"
                                id="phone" placeholder="+880174533***">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="website">Website</label>
                            <input type="text" name="website" value="{{ $user->website }}" class="form-control"
                                id="website" placeholder="https://yourwebsite.com">
                        </div>
                    </div>
                </div>

                {{-- user Country & City --}}
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="country">Country</label>
                            <input type="text" name="country" value="{{ $user->country }}" class="form-control"
                                id="country" placeholder="Bangladesh">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" name="city" value="{{ $user->city }}" class="form-control"
                                id="city" placeholder="comilla">
                        </div>
                    </div>
                </div>
                {{-- user address & City --}}
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" value="{{ $user->address }}" class="form-control"
                                id="address" placeholder="devidwer,mohanpur">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="postal_code">Postal Code</label>
                            <input type="text" name="postal_code" value="{{ $user->postal_code }}"
                                class="form-control" id="postal_code" placeholder="3510">
                        </div>
                    </div>
                </div>

                {{-- Facebook & Twitter --}}
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="facebook">Facebook</label>
                            <input type="text" name="facebook" value="{{ $user->facebook }}" class="form-control"
                                id="facebook" placeholder="https://www.facebook.com/">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="twitter">Twitter</label>
                            <input type="text" name="twitter" value="{{ $user->twitter }}" class="form-control"
                                id="twitter" placeholder="https://twitter.com/">
                        </div>
                    </div>
                </div>
                {{-- Linkedin & Instagram --}}
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="linkedin">Linkedin</label>
                            <input type="text" name="linkedin" value="{{ $user->linkedin }}" class="form-control"
                                id="linkedin" placeholder="https://www.linkedin.com/">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="instagram">Instagram</label>
                            <input type="text" name="instagram" value="{{ $user->instagram }}" class="form-control"
                                id="instagram" placeholder="https://instagram.com/">
                        </div>
                    </div>
                </div>
                {{-- youtube & vimeo --}}
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="youtube">Youtube</label>
                            <input type="text" name="youtube" value="{{ $user->youtube }}" class="form-control"
                                id="youtube" placeholder="https://www.youtube.com/">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="vimeo">Vimeo</label>
                            <input type="text" name="vimeo" value="{{ $user->vimeo }}" class="form-control"
                                id="vimeo" placeholder="https://vimeo.com/">
                        </div>
                    </div>
                </div>

                {{-- designation & experience --}}
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="designation">Designation</label>
                            <input type="text" name="designation" value="{{ $user->designation }}"
                                class="form-control" id="designation" placeholder="CO Founder">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="experience">Experience</label>
                            <input type="text" name="experience" value="{{ $user->experience }}"
                                class="form-control" id="experience" placeholder="7 years">
                        </div>
                    </div>
                </div>
                {{-- Bio Section --}}
                <div class="form-group">
                    <label for="bio">Bio</label>
                    <textarea type="text" name="bio" class="form-control" id="bio" rows="5">{{ $user->bio }}</textarea>
                </div>
                {{-- Image --}}
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="exampleInputFile">User Avatar</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input"
                                        id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                            @error('image')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <img id="image_preview" src="{{ asset($user->image) }}" width="100" height="100">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
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

            $("#exampleInputFile").on('change', function() {
                $("#image_preview").show();
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#image_preview").attr("src", e.target.result);
                }
                reader.readAsDataURL($(this)[0].files[0]);
            });

            var userType = $("#userType").val();
            if (userType == "instructor") {
                $("#userRole").empty();
            } else if (userType == "user") {
                $("#userRole").empty();
            }


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
