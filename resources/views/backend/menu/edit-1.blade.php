@extends('backend.layouts.master')
@section('title', __('dashboard.menu_builder'))
@section('content')
    {{-- Content Header (Page header)  --}}
    <section class="content-header info-box p-3 rounded">
        <div class="container-fluid">
            <div class="row mb-2 mt-2">
                <div class="col-sm-6">
                    <h3 class="card-title">{{ __('dashboard.menu_builder') }}</h3>
                </div>

            </div>
        </div>
    </section>
    <form id="eventForm">
        @include('frontend.layouts.message')
        <div class="row mb-4 align-items-center">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="menuTitle">{{ __('dashboard.edit_menu') }}</label>
                            <input type="text" name="title" class="form-control" id="menuTitle"
                                value="{{ $menu->title }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">

                            <div class="form-group">
                                <label for="menuTitle">{{ __('dashboard.edit_menu_location') }}</label>
                                <select class="form-control" name="location" id="menuLocation">
                                    <option value="" disabled>{{ __('dashboard.select_location') }}</option>
                                    <option value="header" {{ $menu->location == 'header' ? 'selected' : '' }}>
                                        {{ __('dashboard.header') }}</option>
                                    <option value="footer_1" {{ $menu->location == 'footer_1' ? 'selected' : '' }}>
                                        {{ __('dashboard.footer_1') }}</option>
                                    <option value="footer_2" {{ $menu->location == 'footer_2' ? 'selected' : '' }}>
                                        {{ __('dashboard.footer_2') }}</option>
                                </select>
                                <small id="menuLocation"
                                    class="form-text text-muted">{{ __('dashboard.menu_note_location') }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 mt-2">
                <div class="form-group">
                    <button class="btn btn-primary" id="update_menu">Update Menu</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card tp-appe-menu">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('dashboard.all_menu') }}</h3>
                    </div>
                    <!-- page -->
                    <div class="card-body p-2">
                        <div id="accordion">
                            <div class="card">
                                <div class="card-header tp-card-menu-single">
                                    <h4 class="card-title w-100">
                                        <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseOne"
                                            aria-expanded="false">
                                            Pages
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-chevron-down">
                                                    <polyline points="6 9 12 15 18 9"></polyline>
                                                </svg>
                                            </span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="collapse" data-parent="#accordion">
                                    <div class="card-body"
                                        style="height:300px; overflow-y: scroll background-color: #e9e0e0d7;">
                                        <div class="pages-list">
                                            <div class="form-group">
                                                @if (isset($pages))
                                                    @foreach ($pages as $page)
                                                        <div class="custom-control custom-checkbox my-1">
                                                            <input class="custom-control-input page_checkbox_value"
                                                                type="checkbox"
                                                                id="customCheckbox-pages-{{ $page->id }}"
                                                                value="{{ $page->id }}">
                                                            <label for="customCheckbox-pages-{{ $page->id }}"
                                                                class="custom-control-label">{{ $page->title }}</label>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn tp-add-lesson-btn btn-primary" id="add_pages_in_field">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-plus-square">
                                                    <rect x="3" y="3" width="18" height="18" rx="2"
                                                        ry="2"></rect>
                                                    <line x1="12" y1="8" x2="12" y2="16">
                                                    </line>
                                                    <line x1="8" y1="12" x2="16" y2="12">
                                                    </line>
                                                </svg>
                                            </span>
                                            add to menu
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- course  -->
                            <div class="card">
                                <div class="card-header tp-card-menu-single">
                                    <h4 class="card-title w-100">
                                        <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseTwo"
                                            aria-expanded="false">
                                            Courses
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-chevron-down">
                                                    <polyline points="6 9 12 15 18 9"></polyline>
                                                </svg>
                                            </span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                    <div class="card-body"
                                        style="height:300px; overflow-y: scroll background-color: #e9e0e0d7;">
                                        <div class="pages-list">
                                            <div class="form-group">
                                                @if (isset($courses))
                                                    @foreach ($courses as $course)
                                                        <div class="custom-control custom-checkbox my-1">
                                                            <input class="custom-control-input course_checkbox_value"
                                                                type="checkbox" id="customCheckbox-{{ $course->id }}"
                                                                value="{{ $course->id }}">
                                                            <label for="customCheckbox-{{ $course->id }}"
                                                                class="custom-control-label">{{ $course->title }}</label>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="custom-control custom-checkbox my-1">
                                                        <label for="customCheckbox1" class="custom-control-label">No
                                                            Course Found</label>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn tp-add-lesson-btn btn-primary" id="add_courses_in_field">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-plus-square">
                                                    <rect x="3" y="3" width="18" height="18" rx="2"
                                                        ry="2"></rect>
                                                    <line x1="12" y1="8" x2="12" y2="16">
                                                    </line>
                                                    <line x1="8" y1="12" x2="16" y2="12">
                                                    </line>
                                                </svg>
                                            </span>
                                            add to menu
                                        </button>
                                    </div>
                                </div>
                            </div>
                            {{-- castom link  --}}
                            <div class="card">
                                <div class="card-header tp-card-menu-single">
                                    <h4 class="card-title w-100">
                                        <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseThree"
                                            aria-expanded="false">
                                            Custom Link
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-chevron-down">
                                                    <polyline points="6 9 12 15 18 9"></polyline>
                                                </svg>
                                            </span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="collapse" data-parent="#accordion">
                                    <div class="card-body"
                                        style="height:300px; overflow-y: scroll background-color: #e9e0e0d7;">
                                        <div class="pages-list">
                                            <div class="form-group row">
                                                <label for="custom_url" class="col-sm-2 col-form-label">Url:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="custom_url"
                                                        placeholder="https://">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="link_text" class="col-sm-2 col-form-label">Link Text</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="link_text">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn tp-add-lesson-btn btn-primary" id="add_custom_link_in_field">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-plus-square">
                                                    <rect x="3" y="3" width="18" height="18" rx="2"
                                                        ry="2"></rect>
                                                    <line x1="12" y1="8" x2="12" y2="16">
                                                    </line>
                                                    <line x1="8" y1="12" x2="16" y2="12">
                                                    </line>
                                                </svg>
                                            </span>
                                            add to menu
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card tp-appe-menu-list">
                    <div class="card-body">
                        <textarea class="d-none" id="nestable2-output"></textarea>

                        <div class="cf nestable-lists">
                            <div class="dd" id="nestable2">
                                @if (isset($menu_items))
                                    <ol class="dd-list tp-menu-list-wrap">
                                        @foreach ($menu_items as $menuitem)
                                            <li class="dd-item dd3-item" data-type="{{ $menuitem['type'] }}"
                                                data-id="{{ $menuitem['id'] }}" data-name="{{ $menuitem['name'] }}"
                                                data-target="{{ $menuitem['target'] }}">
                                                <div class="dd-handle dd3-handle"></div>
                                                <div class="tp-course-box dd3-content">
                                                    <div class="card card-primary" data-menu-id="{{ $menuitem['id'] }}">
                                                        <div class="card-header">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                                <div class="topicTitlw">
                                                                    <h4 class="card-title w-100"><a class="d-block w-100"
                                                                            data-toggle=""
                                                                            href="#collapseOne-2">{{ $menuitem['name'] }}</a>
                                                                    </h4>
                                                                </div>
                                                                <div class="topicAction">
                                                                    <button class="tp-edit-btn edit-menu-item"
                                                                        data-menu-id="{{ $menuitem['id'] }}"
                                                                        data-toggle="modal" data-target="#menu-modal"
                                                                        data-id="{{ $menuitem['id'] }}"
                                                                        data-name="{{ $menuitem['name'] }}"
                                                                        data-type="{{ $menuitem['type'] }}"
                                                                        data-target="{{ $menuitem['target'] }}">
                                                                        <span>
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="16" height="16"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                stroke="currentColor" stroke-width="2"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                class="feather feather-edit">
                                                                                <path
                                                                                    d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                                </path>
                                                                                <path
                                                                                    d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                                </path>
                                                                            </svg>
                                                                        </span>
                                                                    </button>
                                                                    <button class="tp-delet-btn delete-menu-btn"
                                                                        data-menu-id="{{ $menuitem['id'] }}"
                                                                        data-toggle="modal" data-target="#deleteMenuModal"
                                                                        data-id="{{ $menuitem['id'] }}"
                                                                        data-name="{{ $menuitem['name'] }}"
                                                                        data-type="{{ $menuitem['type'] }}"
                                                                        data-target="{{ $menuitem['target'] }}">
                                                                        <span>
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="16" height="16"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                stroke="currentColor" stroke-width="2"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                class="feather feather-trash-2">
                                                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                                                <path
                                                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                                </path>
                                                                                <line x1="10" y1="11"
                                                                                    x2="10" y2="17"></line>
                                                                                <line x1="14" y1="11"
                                                                                    x2="14" y2="17"></line>
                                                                            </svg>
                                                                        </span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                @if (isset($menuitem['children']))
                                                    <div class="dd-handle dd3-handle"></div>

                                                    <ol class="dd-list">
                                                        @foreach ($menuitem['children'] as $menuitem2)
                                                            <li class="dd-item dd3-item"
                                                                data-type="{{ $menuitem2['type'] }}"
                                                                data-id="{{ $menuitem2['id'] }}"
                                                                data-name="{{ $menuitem2['name'] }}"
                                                                data-target="{{ $menuitem2['target'] }}">
                                                                <div class="dd-handle dd3-handle"></div>
                                                                <div class="tp-course-box dd3-content">
                                                                    <div class="card card-primary"
                                                                        data-menu-id="{{ $menuitem2['id'] }}">
                                                                        <div class="card-header">
                                                                            <div
                                                                                class="d-flex align-items-center justify-content-between">
                                                                                <div class="topicTitlw">
                                                                                    <h4 class="card-title w-100"><a
                                                                                            class="d-block w-100"
                                                                                            data-toggle="collapse"
                                                                                            href="#collapseOne-2">{{ $menuitem2['name'] }}</a>
                                                                                    </h4>
                                                                                </div>
                                                                                <div class="topicAction">
                                                                                    <button
                                                                                        class="tp-edit-btn edit-menu-item"
                                                                                        data-menu-id="{{ $menuitem2['id'] }}"
                                                                                        data-toggle="modal"
                                                                                        data-target="#menu-modal"
                                                                                        data-id="{{ $menuitem2['id'] }}"
                                                                                        data-name="{{ $menuitem2['name'] }}"
                                                                                        data-type="{{ $menuitem2['type'] }}"
                                                                                        data-target="{{ $menuitem2['target'] }}">
                                                                                        <span>
                                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                width="16"
                                                                                                height="16"
                                                                                                viewBox="0 0 24 24"
                                                                                                fill="none"
                                                                                                stroke="currentColor"
                                                                                                stroke-width="2"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round"
                                                                                                class="feather feather-edit">
                                                                                                <path
                                                                                                    d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                                                </path>
                                                                                                <path
                                                                                                    d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                                                </path>
                                                                                            </svg>
                                                                                        </span>
                                                                                    </button>
                                                                                    <button
                                                                                        class="tp-delet-btn delete-menu-btn">
                                                                                        <span>
                                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                width="16"
                                                                                                height="16"
                                                                                                viewBox="0 0 24 24"
                                                                                                fill="none"
                                                                                                stroke="currentColor"
                                                                                                stroke-width="2"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round"
                                                                                                class="feather feather-trash-2">
                                                                                                <polyline
                                                                                                    points="3 6 5 6 21 6">
                                                                                                </polyline>
                                                                                                <path
                                                                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                                                </path>
                                                                                                <line x1="10"
                                                                                                    y1="11"
                                                                                                    x2="10"
                                                                                                    y2="17"></line>
                                                                                                <line x1="14"
                                                                                                    y1="11"
                                                                                                    x2="14"
                                                                                                    y2="17"></line>
                                                                                            </svg>
                                                                                        </span>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ol>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ol>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </form>

    <div id="menu-modal" class="modal fade menu-model">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('dashboard.edit_menu_title') }}</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="meta_title">{{ __('dashboard.edit_menu_title') }}</label>
                        <input type="text" name="title" class="form-control" id="menuNameEdit"
                            placeholder="Enter Menu Title">
                        <input type="hidden" id="menuId">
                        <input type="hidden" id="menuType">
                        <input type="hidden" id="menuTarget">
                        <input type="hidden" id="oldMenuName">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{ __('dashboard.close') }}</button>
                    <button type="button" class="btn btn-primary"
                        id="submit-menu-btn">{{ __('dashboard.submit') }}</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('backend/assets/plugins/nestable/jquery.nestable.js') }}"></script>
    <script>
        $(document).ready(function() {
            var updateOutput = function(e) {
                var list = e.length ? e : $(e.target),
                    output = list.data('output');
                if (window.JSON) {
                    output.val(window.JSON.stringify(list.nestable('serialize')));
                } else {
                    output.val('JSON browser support required for this demo.');
                }
            };
            $('#nestable2').nestable({
                maxDepth: 2
            }).on('change', updateOutput);
            updateOutput($('#nestable2').data('output', $('#nestable2-output')));
        });

        $(document).ready(function() {
            $("#add_pages_in_field").on('click', function(e) {
                e.preventDefault();
                $(".page_checkbox_value").each(function() {
                    if ($(this).is(":checked")) {
                        var page_id = $(this).val();
                        var page_title = $(this).next().text();
                        var page_checkbox = $(this);
                        var type = "page";
                        var target = "_self";
                        var html = `<li class="dd-item dd3-item" 
                            data-type="${type}"
                            data-id="${page_id}" 
                            data-name="${page_title}"
                            data-target="${target}">

                            <div class="dd-handle dd3-handle"></div>
                            <div class="tp-course-box dd3-content">
                                <div class="card card-primary" data-menu-id="${page_id}">
                                    <div class="card-header">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="topicTitlw">
                                                <h4 class="card-title w-100"><a class="d-block w-100" data-toggle="collapse" href="#collapseOne-2">${page_title}</a></h4>
                                            </div>
                                            <div class="topicAction">
                                                <button class="tp-edit-btn edit-menu-item"
                                                    data-menu-id="${page_id}"
                                                    data-toggle="modal" 
                                                    data-target="#menu-modal"
                                                    data-id="${page_id}"
                                                    data-name="${page_title}"
                                                    data-type="${type}"
                                                    data-target="${target}">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                                </span>
                                                </button>
                                                <button class="tp-delet-btn delete-menu-btn" 
                                                    data-menu-id="${page_id}"
                                                    data-toggle="modal" data-target="#deleteMenuModal"
                                                    data-id="${page_id}"
                                                    data-name="${page_title}"
                                                    data-type="${type}"
                                                    data-target="${target}">
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>`;

                        $("#nestable2 > .dd-list").append(html);
                    }
                });
                // uncheck all checkbox
                $(".page_checkbox_value").prop("checked", false);
                let list = $('#nestable2').data('output', $('#nestable2-output'));
                $('#nestable2-output').val(window.JSON.stringify(list.nestable('serialize')));
            });

            $("#add_courses_in_field").on('click', function(e) {
                e.preventDefault();
                $(".course_checkbox_value").each(function() {
                    if ($(this).is(":checked")) {
                        var course_id = $(this).val();
                        var course_title = $(this).next().text();
                        var course_checkbox = $(this);
                        var type = "course";
                        var target = "_self";
                        var html = `
                        <li class="dd-item dd3-item" 
                            data-type="${type}"
                            data-id="${course_id}" 
                            data-name="${course_title}"
                            data-target="${target}">

                            <div class="dd-handle dd3-handle"></div>
                            <div class="tp-course-box dd3-content">
                                <div class="card card-primary" data-menu-id="${course_id}">
                                    <div class="card-header">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="topicTitlw">
                                                <h4 class="card-title w-100"><a class="d-block w-100" data-toggle="collapse" href="#collapseOne-2">${course_title}</a></h4>
                                            </div>
                                            <div class="topicAction">
                                                <button class="tp-edit-btn edit-menu-item"
                                                    data-menu-id="${course_id}"
                                                    data-toggle="modal" 
                                                    data-target="#menu-modal"
                                                    data-id="${course_id}"
                                                    data-name="${course_title}"
                                                    data-type="${type}"
                                                    data-target="${target}">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                                </span>
                                                </button>
                                                <button class="tp-delet-btn delete-menu-btn" 
                                                    data-menu-id="${course_id}"
                                                    data-toggle="modal" 
                                                    data-target="#deleteMenuModal"
                                                    data-id="${course_id}"
                                                    data-name="${course_title}"
                                                    data-type="${type}"
                                                    data-target="${target}">
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>`;
                        $("#nestable2 > .dd-list").append(html);
                    }
                });
                // uncheck all checkbox
                $(".course_checkbox_value").prop("checked", false);
                let list = $('#nestable2').data('output', $('#nestable2-output'));
                $('#nestable2-output').val(window.JSON.stringify(list.nestable('serialize')));
            });

            $("#add_custom_link_in_field").on('click', function(e) {
                e.preventDefault();
                var custom_url = $("#custom_url").val();
                var link_text = $("#link_text").val();
                var type = "custom_link";
                var target = "_self";
                //link text purify
                if (link_text == "") {
                    link_text = "Custom Link";
                }
                // if link_text with script tag remove it
                var link_text = link_text.replace(/<script[^>]*>([\S\s]*?)<\/script>/gmi, "");

                var html = `
                <li class="dd-item dd3-item" 
                            data-type="${type}"
                            data-id="${custom_url}"
                            data-url="${custom_url}"
                            data-name="${link_text}"
                            data-target="${target}">

                            <div class="dd-handle dd3-handle"></div>
                            <div class="tp-course-box dd3-content">
                                <div class="card card-primary" data-menu-id="${custom_url}">
                                    <div class="card-header">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="topicTitlw">
                                                <h4 class="card-title w-100"><a class="d-block w-100" data-toggle="collapse" href="#collapseOne-2">${link_text}</a></h4>
                                            </div>
                                            <div class="topicAction">
                                                <button class="tp-edit-btn edit-menu-item"
                                                    data-menu-id="${custom_url}"
                                                    data-toggle="modal" 
                                                    data-target="#menu-modal"
                                                    data-id="${custom_url}"
                                                    data-name="${link_text}"
                                                    data-type="${type}"
                                                    data-target="${target}">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                                </span>
                                                </button>
                                                <button class="tp-delet-btn delete-menu-btn" 
                                                    data-menu-id="${custom_url}"
                                                    data-toggle="modal" data-target="#deleteMenuModal"
                                                    data-id="${custom_url}"
                                                    data-name="${link_text}"
                                                    data-type="${type}"
                                                    data-target="${target}">
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>`;
                $("#nestable2 > .dd-list").append(html);
                // uncheck all checkbox
                $(".course_checkbox_value").prop("checked", false);
                let list = $('#nestable2').data('output', $('#nestable2-output'));
                $('#nestable2-output').val(window.JSON.stringify(list.nestable('serialize')));

                $("#custom_url").val("");
                $("#link_text").val("");
            });

            $("#submit-menu-btn").on("click", function(e) {
                e.preventDefault();
                var menu_id = $("#menuId").val();
                var menu_name = $("#menuNameEdit").val();
                var menu_type = $("#menuType").val();
                var menu_target = $("#menuTarget").val();
                $("#nestable2 li").each(function() {
                    if ($(this).data("name") == $("#oldMenuName").val()) {
                        $(this).data("id", menu_id);
                        $(this).data("name", menu_name);
                        $(this).data("type", menu_type);
                        $(this).data("target", menu_target);
                        $(this).find(".card-title > a").first().text(menu_name);
                        let list = $('#nestable2').data('output', $('#nestable2-output'));
                        $('#nestable2-output').val(window.JSON.stringify(list.nestable(
                            'serialize')));
                    }
                });
                $("#menu-modal").modal("hide");
            });

            $(".edit-menu-item").on("click", function(e) {
                e.preventDefault();
                var menu_name = $(this).data("name");
                var menu_id = $(this).data("id");
                var menu_type = $(this).data("type");
                var menu_target = $(this).data("target");
                $("#menuNameEdit").val(menu_name);
                $("#menuId").val(menu_id);
                $("#menuType").val(menu_type);
                $("#menuTarget").val(menu_target);
                $("#oldMenuName").val(menu_name);
                $("#menu-modal").modal("show");
            })

            $("#update_menu").on('click', function(e) {
                e.preventDefault();
                var menu_id = "{{ $menu->id }}";
                var menu_title = $("#menuTitle").val();
                var menu_location = $("#menuLocation").val();
                var menu_items_set = $('#nestable2').data('output', $('#nestable2-output'));
                var menu_items_get = $('#nestable2-output').val();
                $.ajax({
                    url: "{{ route('admin.appearance.menu.update') }}",
                    type: "POST",
                    data: {
                        id: menu_id,
                        title: menu_title,
                        location: menu_location,
                        content: menu_items_get,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        if (response.status == "success") {
                            toastr.success(response.message);
                        } else {
                            toastr.error(response.message);
                        }
                    }
                });
            });



            $(".delete-menu-btn").on('click', function(e) {
                e.preventDefault();
                //sawl alart
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Once Delete, This will be Permanently Delete!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // remove from menu .dd-list 
                        $(this).parent().parent().parent().parent().parent().parent().remove();
                        let list = $('#nestable2').data('output', $('#nestable2-output'));
                        $('#nestable2-output').val(window.JSON.stringify(list.nestable(
                            'serialize')));
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                });

            });

        });
    </script>
@endpush
