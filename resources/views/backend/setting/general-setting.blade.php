@extends('backend.layouts.master')
@section('title', __('dashboard.general_setting'))
@section('content')
    @push('styles')
        <link rel="stylesheet" href="{{ asset('backend/assets/plugins/bs-toggle/bootstrap-toggle.min.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/assets/plugins/select2/css/select2.min.css') }}">
    @endpush
    <section class="content-header info-box p-3 rounded">
        <div class="container-fluid">
            <div class="row mb-2 mt-2">
                <div class="col-sm-6">
                    <h3 class="card-title">{{ __('dashboard.general_setting') }}</h3>
                </div>
            </div>
        </div>
    </section>

    <div class="card-body tp-general-settings-bg">

        @include('frontend.layouts.message')
        <div class="card-body">
            <div class="row">
                <div class="col-5 col-sm-3">
                    <div class="nav flex-column tp-general-settings h-100" id="vert-tabs-tab" role="tablist"
                        aria-orientation="vertical">
                        <a class="nav-link active" id="vert-tabs-header-tab" data-toggle="pill" href="#vert-tabs-header"
                            role="tab" aria-controls="vert-tabs-header"
                            aria-selected="true">{{ __('dashboard.header') }}</a>
                        <a class="nav-link" id="vert-tabs-meta-section-tab" data-toggle="pill"
                            href="#vert-tabs-meta-section" role="tab" aria-controls="vert-tabs-meta-section"
                            aria-selected="false">{{ __('dashboard.meta_configaration') }}</a>
                        <a class="nav-link" id="vert-tabs-footer-tab" data-toggle="pill" href="#vert-tabs-footer"
                            role="tab" aria-controls="vert-tabs-footer"
                            aria-selected="false">{{ __('dashboard.footer') }}</a>
                        <a class="nav-link" id="vert-tabs-social-tab" data-toggle="pill" href="#vert-tabs-social"
                            role="tab" aria-controls="vert-tabs-social"
                            aria-selected="false">{{ __('dashboard.social') }}</a>
                        <a class="nav-link" id="vert-tabs-contact-tab" data-toggle="pill" href="#vert-tabs-contact"
                            role="tab" aria-controls="vert-tabs-contact"
                            aria-selected="false">{{ __('dashboard.contact') }}</a>
                        <a class="nav-link" id="vert-tabs-site-settings-tab" data-toggle="pill"
                            href="#vert-tabs-site-settings" role="tab" aria-controls="vert-tabs-site-settings"
                            aria-selected="false">{{ __('dashboard.site_settings') }}</a>
                        <a class="nav-link" id="vert-tabs-others-tab" data-toggle="pill" href="#vert-tabs-others"
                            role="tab" aria-controls="vert-tabs-others"
                            aria-selected="true">Others</a>
                    </div>
                </div>
                <div class="col-7 col-sm-9">
                    <div class="tab-content tp-general-settings-text" id="vert-tabs-tabContent">
                        <div class="tab-pane text-left fade show active" id="vert-tabs-header" role="tabpanel"
                            aria-labelledby="vert-tabs-header-tab">
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="mb-4">{{ __('dashboard.header') }}</h2>
                                    <form action="{{ route('admin.general.setting.update', ['key' => 'header']) }}"
                                        enctype="multipart/form-data" method="POST">
                                        @csrf
                                        {{-- Header Logo  --}}
                                        <div class="form-group">
                                            <div class="mb-3">
                                                @if (getOptions('header', 'header_logo') != null)
                                                    <div id="image_preview_header_logo">
                                                        <img src="{{ asset(getOptions('header', 'header_logo')) }}"
                                                            class="img-fluid" height="200" width="200" />
                                                    </div>
                                                @endif
                                                <label for="header_logo"
                                                    class="form-label">{{ __('dashboard.header_logo') }}</label>
                                                <input class="form-control dynamic-input" name="header_logo" type="file"
                                                    id="header_logo">
                                            </div>
                                        </div>
                                        {{-- Header Logo 2 --}}
                                        <div class="form-group">
                                            <div class="mb-3">
                                                @if (getOptions('header', 'header_logo_2') != null)
                                                    <div id="image_preview_header_logo_2">
                                                        <img src="{{ asset(getOptions('header', 'header_logo_2')) }}"
                                                            class="img-fluid" height="200" width="200" />
                                                    </div>
                                                @endif
                                                <label for="header_logo_2"
                                                    class="form-label">{{ __('dashboard.header_logo_2') }}</label>
                                                <input class="form-control dynamic-input" name="header_logo_2"
                                                    type="file" id="header_logo_2">
                                            </div>
                                        </div>
                                        {{-- Header FavIcon  --}}
                                        <div class="form-group">
                                            <div class="mb-3">
                                                @if (getOptions('header', 'header_favicon') != null)
                                                    <div id="image_preview_header_favicon">
                                                        <img src="{{ asset(getOptions('header', 'header_favicon')) }}"
                                                            class="img-fluid" height="200" width="200" />
                                                    </div>
                                                @endif
                                                <label for="favicon"
                                                    class="form-label">{{ __('dashboard.favicon') }}</label>
                                                <input class="form-control dynamic-input" name="header_favicon"
                                                    type="file" id="favicon">
                                            </div>
                                        </div>
                                        {{-- Header search on off  --}}
                                        <div class="form-group">
                                            <label for="heroDesc">{{ __('dashboard.search_on_off') }}</label><br>
                                            <input type="checkbox" name="header_shape" data-toggle="toggle"
                                                {{ getOptions('header', 'header_shape') == 'on' ? 'checked' : '' }}>
                                        </div>

                                        {{-- Header Category Select --}}

                                        <div class="form-group edu-header-category">
                                            <label for="categories">{{ __('dashboard.header_category_display') }}</label>
                                            <select
                                                class="form-control select2 select2-container select2-container--default select2-container--below"
                                                name="header_categories[]" id="categories" multiple>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ in_array($category->id, getOptions('header', 'header_categories') ?? []) ? 'selected' : '' }}>
                                                        {{ $category->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="card-footer edu-header-category">
                                            <button class="btn edu-btn-main">{{ __('dashboard.update') }}</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane text-left fade show" id="vert-tabs-meta-section" role="tabpanel"
                            aria-labelledby="vert-tabs-meta-section-tab">
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="mb-4">{{ __('dashboard.meta_configaration') }}</h2>
                                    <form action="{{ route('admin.general.setting.update', ['key' => 'meta']) }}"
                                        enctype="multipart/form-data" method="POST">
                                        @csrf
                                        {{-- Meta title  --}}
                                        <div class="form-group">
                                            <label for="meta_title"></label>
                                            <input name="meta_title" id="meta_title" class="form-control" rows="5"
                                                value="{{ getOptions('meta', 'meta_title') ?? ' ' }}" />
                                        </div>
                                        {{-- Meta description  --}}
                                        <div class="form-group">
                                            <label for="meta_description">{{ __('dashboard.meta_description') }}</label>
                                            <textarea name="meta_description" id="description" class="form-control" rows="5">{{ getOptions('meta', 'meta_description') }}</textarea>
                                        </div>
                                        <div class="card-footer">
                                            <button class="btn edu-btn-main">{{ __('dashboard.update') }}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane text-left fade show" id="vert-tabs-footer" role="tabpanel"
                            aria-labelledby="vert-tabs-footer-tab">
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="mb-4">{{ __('dashboard.footer') }}</h2>
                                    <form action="{{ route('admin.general.setting.update', ['key' => 'footer']) }}"
                                        enctype="multipart/form-data" method="POST">
                                        @csrf
                                        {{-- Cta Title  --}}
                                        <div class="form-group">
                                            <label for="footer_cta_title">{{ __('dashboard.cta_title') }}</label>
                                            <input name="footer_cta_title" id="footer_cta_title" class="form-control"
                                                value="{{ getOptions('footer', 'footer_cta_title') ?? ' ' }}" />
                                        </div>
                                        {{-- Cta Button  --}}
                                        <div class="form-group">
                                            <label for="footer_cta_btn_text">{{ __('dashboard.cta_button_text') }}</label>
                                            <input name="footer_cta_btn_text" id="footer_cta_btn_text"
                                                class="form-control"
                                                value="{{ getOptions('footer', 'footer_cta_btn_text') ?? ' ' }}" />
                                        </div>

                                        {{-- Cta Link  --}}
                                        <div class="form-group">
                                            <label for="footer_cta_btn_link">{{ __('dashboard.cta_button_link') }}</label>
                                            <input name="footer_cta_btn_link" id="footer_cta_btn_link"
                                                class="form-control"
                                                value="{{ getOptions('footer', 'footer_cta_btn_link') ?? ' ' }}" />
                                        </div>
                                        {{-- footer logo  --}}
                                        <div class="form-group">
                                            <div class="mb-3">
                                                @if (getOptions('footer', 'footer_main_logo') != null)
                                                    <div id="image_preview_footer_main_logo">
                                                        <img src="{{ asset(getOptions('footer', 'footer_main_logo')) }}"
                                                            class="img-fluid" height="200" width="200" />
                                                    </div>
                                                @endif
                                                <label for="footer_main_logo"
                                                    class="form-label">{{ __('dashboard.footer_logo') }}</label>
                                                <input class="form-control" name="footer_main_logo" type="file"
                                                    id="footer_main_logo">
                                            </div>
                                        </div>

                                        {{-- footer description  --}}
                                        <div class="form-group">
                                            <label for="footer_main_desc">{{ __('dashboard.footer_description') }}</label>
                                            <textarea name="footer_main_desc" id="footer_main_desc" class="form-control" rows="5">{{ getOptions('footer', 'footer_main_desc') ?? ' ' }}</textarea>
                                        </div>

                                        {{-- footer cope right  --}}
                                        <div class="form-group">
                                            <label for="footer_copy_right">{{ __('dashboard.footer_copy_right') }}</label>
                                            <input name="footer_copy_right" id="footer_copy_right" class="form-control"
                                                value="{{ getOptions('footer', 'footer_copy_right') ?? ' ' }}" />
                                        </div>

                                        <div class="card-footer">
                                            <button class="btn edu-btn-main">{{ __('dashboard.update') }}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane text-left fade show" id="vert-tabs-social" role="tabpanel"
                            aria-labelledby="vert-tabs-social-tab">
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="mb-4">{{ __('dashboard.social') }}</h2>
                                    <form action="{{ route('admin.general.setting.update', ['key' => 'social']) }}"
                                        enctype="multipart/form-data" method="POST">
                                        @csrf
                                        {{-- facebook  --}}
                                        <div class="form-group">
                                            <label for="social_facebook">{{ __('dashboard.facebook') }}</label>
                                            <input name="social_facebook" id="social_facebook" class="form-control"
                                                value="{{ getOptions('social', 'social_facebook') ?? ' ' }}" />
                                        </div>
                                        {{-- twitter  --}}
                                        <div class="form-group">
                                            <label for="social_twitter">{{ __('dashboard.twitter') }}</label>
                                            <input name="social_twitter" id="social_twitter" class="form-control"
                                                value="{{ getOptions('social', 'social_twitter') ?? ' ' }}" />
                                        </div>
                                        {{-- pinterest  --}}
                                        <div class="form-group">
                                            <label for="social_pinterest">{{ __('dashboard.pinterest') }}</label>
                                            <input name="social_pinterest" id="social_pinterest" class="form-control"
                                                value="{{ getOptions('social', 'social_pinterest') ?? ' ' }}" />
                                        </div>
                                        <div class="card-footer">
                                            <button class="btn edu-btn-main">{{ __('dashboard.update') }}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>

                        <div class="tab-pane text-left fade show" id="vert-tabs-contact" role="tabpanel"
                            aria-labelledby="vert-tabs-contact-tab">
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="mb-4">{{ __('dashboard.contact') }}</h2>
                                    <form action="{{ route('admin.general.setting.update', ['key' => 'contact']) }}"
                                        enctype="multipart/form-data" method="POST">
                                        @csrf
                                        {{-- Office Location  --}}
                                        <div class="form-group">
                                            <label for="office_address">{{ __('dashboard.office_address') }}</label>
                                            <textarea name="contact_office_address" id="description" class="form-control" rows="5">{{ getOptions('contact', 'contact_office_address') ?? ' ' }}</textarea>
                                        </div>
                                        {{-- Email One  --}}
                                        <div class="form-group">
                                            <label for="email_one">{{ __('dashboard.email_one') }}</label>
                                            <input type="email" name="contact_email_one" id="email_one"
                                                class="form-control"
                                                value="{{ getOptions('contact', 'contact_email_one') ?? ' ' }}" />
                                        </div>
                                        {{-- Email two  --}}
                                        <div class="form-group">
                                            <label for="email_two">{{ __('dashboard.email_two') }}</label>
                                            <input type="email" name="contact_email_two" id="email_two"
                                                class="form-control"
                                                value="{{ getOptions('contact', 'contact_email_two') ?? ' ' }}" />
                                        </div>

                                        {{-- Phone two  --}}
                                        <div class="form-group">
                                            <label for="phone_one">{{ __('dashboard.phone_one') }}</label>
                                            <input type="text" name="contact_phone_one" id="phone_one"
                                                class="form-control"
                                                value="{{ getOptions('contact', 'contact_phone_one') ?? ' ' }}" />
                                        </div>

                                        {{-- Phone two  --}}
                                        <div class="form-group">
                                            <label for="phone_two">{{ __('dashboard.phone_two') }}</label>
                                            <input type="text" name="contact_phone_two" id="phone_two"
                                                class="form-control"
                                                value="{{ getOptions('contact', 'contact_phone_two') ?? ' ' }}" />
                                        </div>

                                        <div class="card-footer">
                                            <button class="btn edu-btn-main">{{ __('dashboard.update') }}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane text-left fade show" id="vert-tabs-site-settings" role="tabpanel"
                            aria-labelledby="vert-tabs-site-settings-tab">
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="mb-4">{{ __('dashboard.site_settings') }}</h2>
                                    <form action="{{ route('admin.site.settings.update') }}" method="POST">
                                        @csrf
                                        {{-- App name --}}
                                        <div class="form-group">
                                            <label for="app_name">{{ __('dashboard.app_name') }}</label>
                                            <input type="text" name="APP_NAME" id="app_name" class="form-control"
                                                value="{{ env('APP_NAME') }}" />
                                            @error('app_name')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>{{ __('dashboard.debug_mode') }}</label>
                                            <select name="APP_DEBUG" id="status" class="custom-select">
                                                <option value="true" {{ env('APP_DEBUG') == '1' ? 'selected' : '' }}>
                                                    {{ __('dashboard.debug_mode_on') }}</option>
                                                <option value="false" {{ env('APP_DEBUG') == '0' ? 'selected' : '' }}>
                                                    {{ __('dashboard.debug_mode_off') }}</option>
                                            </select>
                                        </div>

                                        <div class="card-footer">
                                            <button class="btn edu-btn-main">{{ __('dashboard.update') }}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane text-left fade show" id="vert-tabs-others" role="tabpanel"
                            aria-labelledby="vert-tabs-others-tab">
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="mb-4">Others</h2>
                                        <form action="{{ route('admin.general.setting.update', ['key' => 'others']) }}"
                                            enctype="multipart/form-data" method="POST">
                                        @csrf
                                        {{-- Auth Template Image  --}}
                                        <div class="form-group">
                                            <div class="mb-3">
                                                @if (getOptions('others', 'others_auth_template_image') != null)
                                                    <div id="image_preview_others_auth_template_image">
                                                        <img src="{{ asset(getOptions('others', 'others_auth_template_image')) }}"
                                                            class="img-fluid" height="50" width="50" />
                                                    </div>
                                                @endif
                                                <label for="others_auth_template_image"
                                                    class="form-label">Auth Template Image</label>
                                                <input class="form-control dynamic-input" name="others_auth_template_image" type="file"
                                                    id="others_auth_template_image">
                                            </div>
                                        </div>

                                        {{-- Breadcrumb Image  --}}
                                        <div class="form-group">
                                            <div class="mb-3">
                                                @if (getOptions('others', 'others_breadcrumb_image') != null)
                                                    <div id="image_preview_others_breadcrumb_image">
                                                        <img src="{{ asset(getOptions('others', 'others_breadcrumb_image')) }}"
                                                            class="img-fluid" height="50" width="50" />
                                                    </div>
                                                @endif
                                                <label for="others_breadcrumb_image"
                                                    class="form-label">Breadcrumb Image</label>
                                                <input class="form-control dynamic-input" name="others_breadcrumb_image" type="file"
                                                    id="others_breadcrumb_image">
                                            </div>
                                        </div>
                                       
                                        <div class="card-footer">
                                            <button class="btn edu-btn-main">{{ __('dashboard.update') }}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endsection

    @push('scripts')
        <script src="{{ asset('backend/assets/plugins/bs-toggle/bootstrap-toggle.min.js') }}"></script>
        <script src="{{ asset('backend/assets/plugins/select2/js/select2.full.min.js') }}"></script>
        <script>
            $(function() {
                $('.select2').select2()
            });
        </script>
        <script>
            $(function() {
                $("#header_logo").on("change", function() {
                    $("#image_preview_header_logo").html("");
                    var total_file = document.getElementById("header_logo").files.length;
                    for (var i = 0; i < total_file; i++) {
                        $('#image_preview_header_logo').append("<img src='" + URL.createObjectURL(event.target
                            .files[i]) + "' class='img-fluid' height='200' width='200' />");
                    }
                });

                $("#header_logo_2").on("change", function() {
                    $("#image_preview_header_logo_2").html("");
                    var total_file = document.getElementById("header_logo_2").files.length;
                    for (var i = 0; i < total_file; i++) {
                        $('#image_preview_header_logo_2').append("<img src='" + URL.createObjectURL(event.target
                            .files[i]) + "' class='img-fluid' height='200' width='200' />");
                    }
                });

                $("#favicon").on("change", function() {
                    $("#image_preview_header_favicon").html("");
                    var total_file = document.getElementById("favicon").files.length;
                    for (var i = 0; i < total_file; i++) {
                        $('#image_preview_header_favicon').append("<img src='" + URL.createObjectURL(event
                            .target.files[i]) + "' class='img-fluid' height='200' width='200' />");
                    }
                });

                $("#footer_main_logo").on("change", function() {
                    $("#image_preview_footer_main_logo").html("");
                    var total_file = document.getElementById("footer_main_logo").files.length;
                    for (var i = 0; i < total_file; i++) {
                        $('#image_preview_footer_main_logo').append("<img src='" + URL.createObjectURL(event
                            .target.files[i]) + "' class='img-fluid' height='200' width='200' />");
                    }
                });

                $("#others_auth_template_image").on("change", function() {
                    $("#image_preview_others_auth_template_image").html("");
                    var total_file = document.getElementById("others_auth_template_image").files.length;
                    for (var i = 0; i < total_file; i++) {
                        $('#image_preview_others_auth_template_image').append("<img src='" + URL.createObjectURL(event
                            .target.files[i]) + "' class='img-fluid' height='50' width='50' />");
                    }
                });

                $("#others_breadcrumb_image").on("change", function() {
                    $("#image_preview_others_breadcrumb_image").html("");
                    var total_file = document.getElementById("others_breadcrumb_image").files.length;
                    for (var i = 0; i < total_file; i++) {
                        $('#image_preview_others_breadcrumb_image').append("<img src='" + URL.createObjectURL(event
                            .target.files[i]) + "' class='img-fluid' height='50' width='50' />");
                    }
                });
                
            });
        </script>
    @endpush
