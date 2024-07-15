@extends('backend.layouts.master')
@section('title', __('dashboard.sidebar_setting'))
@section('content')
    <section class="content-header info-box p-3 rounded">
        <div class="container-fluid">
            <div class="row mb-2 mt-2">
                <div class="col-sm-6">
                    <h3 class="card-title">{{ __('dashboard.sidebar_setting') }}</h3>
                </div>
            </div>
        </div>
    </section>
    <form action="{{ route('admin.sidebar.setting.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                {{-- search setting --}}
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="search">{{ __('dashboard.search_on_off') }}</label><br>

                            <input type="checkbox" name="search" id="search" class="form-control"
                                @isset($sidebarInfo['search']) @if ($sidebarInfo['search'] == 'on') checked @endif @endisset
                                data-bootstrap-switch data-on-color="success" data-off-color="danger">

                            @error('search')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                {{-- recent post setting --}}
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="recent_post">{{ __('dashboard.recent_post_on_off') }}</label><br>

                            <input type="checkbox" name="recent_post" id="recent_post" class="form-control"
                                @isset($sidebarInfo['recent_post']) @if ($sidebarInfo['recent_post'] == 'on') checked @endif @endisset
                                data-bootstrap-switch data-on-color="success" data-off-color="danger">

                            @error('recent_post')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="recent_post_title">{{ __('dashboard.recent_post_title') }}</label>
                            <input type="text" name="recent_post_title" class="form-control" id="recent_post_title"
                                value="{{ $sidebarInfo['recent_post_title'] ?? '' }}">
                            @error('recent_post_title')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="recent_post_count">{{ __('dashboard.recent_post_count') }}</label>
                            <input type="text" name="recent_post_count" class="form-control" id="recent_post_count"
                                value="{{ $sidebarInfo['recent_post_count'] ?? '' }}">
                            @error('recent_post_count')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                {{-- category setting --}}
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="category">{{ __('dashboard.category_on_off') }}</label><br>

                            <input type="checkbox" name="category" id="category" class="form-control"
                                @isset($sidebarInfo['category']) @if ($sidebarInfo['category'] == 'on') checked @endif @endisset
                                data-bootstrap-switch data-on-color="success" data-off-color="danger">

                            @error('category')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="category_title">{{ __('dashboard.category_title') }}</label>
                            <input type="text" name="category_title" class="form-control" id="category_title"
                                value="{{ $sidebarInfo['category_title'] ?? '' }}">
                            @error('category_title')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="category_count">{{ __('dashboard.category_count') }}</label>
                            <input type="text" name="category_count" class="form-control" id="category_count"
                                value="{{ $sidebarInfo['category_count'] ?? '' }}">
                            @error('category_count')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                {{-- Tag setting --}}
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="tag">{{ __('dashboard.tag_on_off') }}</label><br>
                            <input type="checkbox" name="tag" id="tag" class="form-control"
                                @isset($sidebarInfo['tag'])@if ($sidebarInfo['tag'] == 'on') checked @endif @endisset
                                data-bootstrap-switch data-on-color="success" data-off-color="danger">
                            @error('tag')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="tag_title">{{ __('dashboard.tag_title') }}</label>
                            <input type="text" name="tag_title" class="form-control" id="tag_title"
                                value="{{ $sidebarInfo['tag_title'] ?? '' }}">
                            @error('tag_title')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="tag_count">{{ __('dashboard.tag_count') }}</label>
                            <input type="text" name="tag_count" class="form-control" id="tag_count"
                                value="{{ $sidebarInfo['tag_count'] ?? '' }}">
                            @error('tag_count')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                {{-- popular post setting --}}
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="popular_post">{{ __('dashboard.popular_post_on_off') }}</label><br>
                            <input type="checkbox" name="popular_post" id="popular_post" class="form-control"
                                @isset($sidebarInfo['popular_post']) @if ($sidebarInfo['popular_post'] == 'on') checked @endif @endisset
                                data-bootstrap-switch data-on-color="success" data-off-color="danger">
                            @error('popular_post')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="popular_post_title">{{ __('dashboard.popular_post_title') }}</label>
                            <input type="text" name="popular_post_title" class="form-control" id="popular_post_title"
                                value="{{ $sidebarInfo['popular_post_title'] ?? '' }}">
                            @error('popular_post_title')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="popular_post_count">{{ __('dashboard.popular_post_count') }}</label>
                            <input type="text" name="popular_post_count" class="form-control" id="popular_post_count"
                                value="{{ $sidebarInfo['popular_post_count'] ?? '' }}">
                            @error('popular_post_count')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                {{-- Recent comment setting --}}
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="recent_comment">{{ __('dashboard.recent_comment_on_off') }}</label><br>
                            <input type="checkbox" name="recent_comment" id="recent_comment" class="form-control"
                                @isset($sidebarInfo['recent_comment']) @if ($sidebarInfo['recent_comment'] == 'on') checked @endif @endisset
                                data-bootstrap-switch data-on-color="success" data-off-color="danger">
                            @error('recent_comment')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="recent_comment_title">{{ __('dashboard.recent_comment_title') }}</label>
                            <input type="text" name="recent_comment_title" class="form-control"
                                id="recent_comment_title" value="{{ $sidebarInfo['recent_comment_title'] ?? '' }}">
                            @error('recent_comment_title')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="recent_comment_count">{{ __('dashboard.recent_comment_count') }}</label>
                            <input type="text" name="recent_comment_count" class="form-control"
                                id="recent_comment_count" value="{{ $sidebarInfo['recent_comment_count'] ?? '' }}">
                            @error('recent_comment_count')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                {{-- Banner setting --}}
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="banner">{{ __('dashboard.banner_on_off') }}</label><br>
                            <input type="checkbox" name="banner" id="banner" class="form-control"
                                @isset($sidebarInfo['banner']) @if ($sidebarInfo['banner'] == 'on') checked @endif @endisset
                                data-bootstrap-switch data-on-color="success" data-off-color="danger">
                            @error('banner')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="banner_title">{{ __('dashboard.banner_title') }}</label>
                            <input type="text" name="banner_title" class="form-control" id="banner_title"
                                value="{{ $sidebarInfo['banner_title'] ?? '' }}">
                            @error('banner_title')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="banner_image">{{ __('dashboard.banner_image') }}</label><br>
                            
                            <div class="input-group mb-2">
                                <div class="custom-file">
                                    <input type="file" name="banner_image" class="custom-file-input"
                                        id="exampleInputFile">
                                    <label class="custom-file-label"
                                        for="exampleInputFile">{{ __('dashboard.choose_file') }}</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">{{ __('dashboard.upload') }}</span>
                                </div>
                            </div>
                            @isset($sidebarInfo['banner_image'])
                                <img id="image_preview" src="{{ asset($sidebarInfo['banner_image']) }}" width="50"
                                    height="50">
                            @endisset
                            @error('image')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                            @error('banner_image')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">{{ __('dashboard.update') }}</button>
            </div>
        </div>
    </form>

@endsection

@push('scripts')
    <script src="{{ asset('backend/assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            "use strict";

            $("input[data-bootstrap-switch]").each(function() {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            });

            $("#exampleInputFile").on("change", function() {
                $("#image_preview").show();
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#image_preview").attr("src", e.target.result);
                }
                reader.readAsDataURL($(this)[0].files[0]);
            });
        });
    </script>
@endpush
