@extends('backend.layouts.master')
@section('title', 'Dashboard')
@section('content')
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8 mt-5">
            <div class="card card-primary card-outline">
                <div class="container">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="{{ asset($admin->image) }}">
                        </div>
                        <h3 class="profile-username text-center">{{ $admin->first_name }}</h3>

                        <p class="text-muted text-center p-5">{{ $admin->bio }}</p>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>{{ __('dashboard.first_name') }}</b> <a class="float-right">{{ $admin->first_name }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>{{ __('dashboard.last_name') }}</b> <a class="float-right">{{ $admin->last_name }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>{{ __('dashboard.email') }}</b> <a class="float-right">{{ $admin->email }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>{{ __('dashboard.phone') }}</b> <a class="float-right">{{ $admin->phone }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>{{ __('dashboard.website') }}</b> <a class="float-right">{{ $admin->website }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>{{ __('dashboard.country') }}</b> <a class="float-right">{{ $admin->country }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>{{ __('dashboard.city') }}</b> <a class="float-right">{{ $admin->city }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>{{ __('dashboard.postal_code') }}</b> <a
                                    class="float-right">{{ $admin->postal_code }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>{{ __('dashboard.facebook') }}</b> <a class="float-right">{{ $admin->facebook }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>{{ __('dashboard.twitter') }}</b> <a class="float-right">{{ $admin->twitter }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>{{ __('dashboard.linkedin') }}</b> <a class="float-right">{{ $admin->linkedin }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>{{ __('dashboard.instagram') }}</b> <a class="float-right">{{ $admin->instagram }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>{{ __('dashboard.youtube') }}</b> <a class="float-right">{{ $admin->youtube }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>{{ __('dashboard.vimeo') }}</b> <a class="float-right">{{ $admin->vimeo }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>{{ __('dashboard.experience') }}</b> <a
                                    class="float-right">{{ $admin->experience }}</a>
                            </li>

                        </ul>
                        @if (Request::is('admin/teacher/pending/*'))
                            @if ($pendingInstructor)
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="{{ asset($admin->cv) }}" class="btn btn-primary btn-block"><b>Download The
                                                Cv</b></a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('approve.instructor', $admin->id) }}"
                                            class="btn btn-success btn-block"><b>Approve Instructor</b></a>
                                    </div>
                                </div>
                            @endif
                        @else
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{{ route('user.edit', $admin->id) }}"
                                        class="btn btn-primary btn-block"><b>{{ __('dashboard.update_your_info') }}</b></a>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('admin.profile.password.get') }}"
                                        class="btn btn-success btn-block"><b>{{ __('dashboard.update_your_password') }}</b></a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <div class="col-md-2">
        </div>
    </div>
@endsection
