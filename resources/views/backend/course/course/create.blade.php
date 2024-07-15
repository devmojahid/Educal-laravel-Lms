@extends('backend.layouts.master')
@section('title', 'Create Blog')
@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/duration/bootstrap-duration-picker.css') }}">
@endpush

@section('content')
    {{-- Content Header (Page header)  --}}
    <section class="content-header info-box p-3 rounded">
        <div class="container-fluid">
            <div class="row mb-2 mt-2">
                <div class="col-sm-6">
                    <h3 class="card-title">{{ __('dashboard.create') }} {{ __('dashboard.course') }}</h3>
                </div>
                @can('course-list')
                    <div class="col-sm-6">
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('course.index') }}">
                                <i class="fas fa-plus"></i>
                                </i> {{ __('dashboard.all') }} {{ __('dashboard.course') }}
                            </a>
                        </div>
                    </div>
                @endcan
            </div>
        </div>
    </section>
    @include('frontend.layouts.message')
    <form id="course-form" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="BlogTitle">{{ __('dashboard.title') }}</label>
                    <input type="text" name="course_title" class="form-control focuas_out_change" id="BlogTitle"
                        placeholder="Enter Title" required>
                </div>
                <div class="form-group">
                    <label for="description">{{ __('dashboard.description') }}</label>
                    <textarea name="course_description" id="description" class="focuas_out_change form-control"></textarea>
                </div>

                <div class="row">
                    {{-- Parent Category --}}
                    <div class="col-6">
                        <div class="form-group">
                            <label>{{ __('dashboard.parent_category') }}</label>
                            <select name="category_id" id="category_id" class="custom-select" required>
                                <option selected disabled>{{ __('dashboard.select_category') }}</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- Child Category --}}
                    <div class="col-6">
                        <div class="form-group">
                            <label>{{ __('dashboard.child_category') }}</label>
                            <select name="subcategory_id" id="subcategory_id" class="custom-select">
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                {{ __('dashboard.course_setting') }}
            </div>
            <div class="card-body tp-dashboard-bg">
                <div class="row">
                    <div class="col-2 col-sm-3">
                        <div class="tp-course-settings">
                            <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist"
                                aria-orientation="vertical">
                                <a class="nav-link active" id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-home"
                                    role="tab" aria-controls="vert-tabs-home" aria-selected="true">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-video">
                                            <polygon points="23 7 16 12 23 17 23 7"></polygon>
                                            <rect x="1" y="5" width="15" height="14" rx="2" ry="2">
                                            </rect>
                                        </svg>
                                    </span>
                                    {{ __('dashboard.image_video') }}
                                </a>
                                <a class="nav-link" id="vert-tabs-profile-tab" data-toggle="pill" href="#vert-tabs-profile"
                                    role="tab" aria-controls="vert-tabs-profile" aria-selected="false">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-dollar-sign">
                                            <line x1="12" y1="1" x2="12" y2="23"></line>
                                            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                        </svg>
                                    </span>
                                    {{ __('dashboard.pricing') }}
                                </a>
                                <a class="nav-link" id="vert-tabs-messages-tab" data-toggle="pill"
                                    href="#vert-tabs-messages" role="tab" aria-controls="vert-tabs-messages"
                                    aria-selected="false">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-settings">
                                            <circle cx="12" cy="12" r="3"></circle>
                                            <path
                                                d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                                            </path>
                                        </svg>
                                    </span>
                                    {{ __('dashboard.general_setting') }}
                                </a>
                                <a class="nav-link" id="vert-tabs-settings-tab" data-toggle="pill"
                                    href="#vert-tabs-settings" role="tab" aria-controls="vert-tabs-settings"
                                    aria-selected="false">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-search">
                                            <circle cx="11" cy="11" r="8"></circle>
                                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                        </svg>
                                    </span>
                                    {{ __('dashboard.meta_section') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-10 col-sm-9">
                        <div class="tab-content" id="vert-tabs-tabContent">
                            <div class="tab-pane text-left fade show active" id="vert-tabs-home" role="tabpanel"
                                aria-labelledby="vert-tabs-home-tab">
                                {{-- Image --}}
                                <div class="form-group">
                                    <div class="col-6">
                                        <img id="image_preview" width="100" height="100">
                                    </div>
                                    <label for="courseImage">{{ __('dashboard.course_thumbnail') }}</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="course_image" class="custom-file-input"
                                                id="courseImage" required>
                                            <label class="custom-file-label"
                                                for="exampleInputFile">{{ __('dashboard.choose_file') }}</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">{{ __('dashboard.upload') }}</span>
                                        </div>
                                    </div>
                                </div>
                                {{-- Video --}}
                                <div class="form-group">
                                    <label for="exampleInputFile">{{ __('dashboard.course_intro_video') }}</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="text" name="course_video" class="form-control"
                                                id="exampleInputFile">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="vert-tabs-profile" role="tabpanel"
                                aria-labelledby="vert-tabs-profile-tab">

                                <div class="col-sm-6">
                                    <div class="form-group clearfix tp-course-price">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary1" name="r1" checked
                                                value="free">
                                            <label for="radioPrimary1">
                                                {{ __('dashboard.price_free') }}
                                            </label>
                                        </div>
                                        <div class="icheck-primary d-inline ml-4">
                                            <input type="radio" id="radioPrimary2" name="r1" value="paid">
                                            <label for="radioPrimary2">
                                                {{ __('dashboard.price_paid') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" id="pricesection" style="display: none">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputFile">{{ __('dashboard.price') }}</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="text" name="price" class="form-control"
                                                        id="exampleInputFile">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputFile">{{ __('dashboard.discount_price') }}</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="text" name="discount_price" class="form-control"
                                                        id="exampleInputFile">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="vert-tabs-messages" role="tabpanel"
                                aria-labelledby="vert-tabs-messages-tab">
                                <div class="form-group">
                                    <label>{{ __('dashboard.course_duration') }}</label>
                                    <input type="text" name="duration" class="form-control" id="duration">
                                </div>
                                <div class="form-group">
                                    <label>{{ __('dashboard.course_level') }}</label>
                                    <select name="level" class="custom-select">
                                        <option value="beginner">{{ __('dashboard.beginner') }}</option>
                                        <option value="intermediate">{{ __('dashboard.intermediate') }}</option>
                                        <option value="advanced">{{ __('dashboard.advance') }}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>{{ __('dashboard.course_language') }}</label>
                                    <select name="language_id" class="custom-select">
                                        @forelse ($languages as $language)
                                            <option value="{{ $language->id }}">{{ $language->title }}</option>
                                        @empty
                                            <option value="">{{ __('dashboard.no_language_found') }}</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="vert-tabs-settings" role="tabpanel"
                                aria-labelledby="vert-tabs-settings-tab">
                                <div class="form-group">
                                    <label for="meta_title">{{ __('dashboard.meta_title') }}</label>
                                    <input type="text" name="meta_title" class="form-control" id="meta_title"
                                        placeholder="Enter Meta Title">
                                </div>

                                <div class="form-group">
                                    <label for="meta_description">{{ __('dashboard.meta_description') }}</label>
                                    <textarea class="form-control" name="meta_description" rows="3" id="meta_description"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="meta_description">{{ __('dashboard.meta_keywords') }} </label>
                                    <textarea class="form-control" name="meta_keywords" rows="3" id="meta_description"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                {{ __('dashboard.course_curriculum') }}
            </div>
            <div class="card-body">
                <button type="button" id="add-topic-btn" class="tp-add-course-btn">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-plus-square">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="12" y1="8" x2="12" y2="16"></line>
                            <line x1="8" y1="12" x2="16" y2="12"></line>
                        </svg>
                    </span>
                    {{ __('dashboard.add_new_topic') }}
                </button>
                <!-- Curriculum section -->
                <div id="curriculum" class="tp-course-box">
                    <!-- Topics, lessons, quizzes will be added here -->

                </div>
            </div>
        </div>

        <!-- Topic Modal -->
        <div id="topic-modal" class="modal fade topic-model">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{ __('dashboard.add_topic') }}</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="meta_title">{{ __('dashboard.topic_title') }}</label>
                            <input type="text" name="title" class="form-control" id="topic_title"
                                placeholder="Enter Topic Title">
                            <div class="tp-educal-feedback d-flex mt-10">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17"
                                        viewBox="0 0 17 17" fill="none">
                                        <path
                                            d="M8.5 16C12.6421 16 16 12.6421 16 8.5C16 4.35786 12.6421 1 8.5 1C4.35786 1 1 4.35786 1 8.5C1 12.6421 4.35786 16 8.5 16Z"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M8.5 5.5V8.5" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M8.5 11.5H8.507" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                                <p>{{ __('dashboard.add_topic_title_are_required') }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="meta_description">{{ __('dashboard.topic_description') }}</label>
                            <textarea class="form-control" name="description" rows="3" id="topic_description"></textarea>
                            <div class="tp-educal-feedback d-flex mt-10">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17"
                                        viewBox="0 0 17 17" fill="none">
                                        <path
                                            d="M8.5 16C12.6421 16 16 12.6421 16 8.5C16 4.35786 12.6421 1 8.5 1C4.35786 1 1 4.35786 1 8.5C1 12.6421 4.35786 16 8.5 16Z"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M8.5 5.5V8.5" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M8.5 11.5H8.507" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                                <p>{{ __('dashboard.add_topic_description_are_required') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ __('dashboard.close') }}</button>
                        <button type="button" class="btn btn-primary"
                            id="submit-topic-btn">{{ __('dashboard.submit') }}</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="edit-topic-modal" class="modal fade topic-model">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{ __('dashboard.edit_topic') }}</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="meta_title">{{ __('dashboard.topic_title') }}</label>
                            <input type="text" name="title" class="form-control" id="topic_title"
                                placeholder="Edit Topic Title">
                            <div class="tp-educal-feedback d-flex mt-10">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17"
                                        viewBox="0 0 17 17" fill="none">
                                        <path
                                            d="M8.5 16C12.6421 16 16 12.6421 16 8.5C16 4.35786 12.6421 1 8.5 1C4.35786 1 1 4.35786 1 8.5C1 12.6421 4.35786 16 8.5 16Z"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M8.5 5.5V8.5" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M8.5 11.5H8.507" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                                <p>{{ __('dashboard.add_topic_title_are_required') }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="meta_description">{{ __('dashboard.topic_description') }}</label>
                            <textarea class="form-control" name="description" rows="3" id="topic_description"></textarea>
                            <div class="tp-educal-feedback d-flex mt-10">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17"
                                        viewBox="0 0 17 17" fill="none">
                                        <path
                                            d="M8.5 16C12.6421 16 16 12.6421 16 8.5C16 4.35786 12.6421 1 8.5 1C4.35786 1 1 4.35786 1 8.5C1 12.6421 4.35786 16 8.5 16Z"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M8.5 5.5V8.5" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M8.5 11.5H8.507" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                                <p>{{ __('dashboard.add_topic_description_are_required') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary"
                            id="update-topic-btn">{{ __('dashboard.update') }}</button>
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ __('dashboard.close') }}</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Lesson Modal -->
        <div class="card">
            <div class="card-body">
                <button type="submit" class="btn btn-primary">{{ __('dashboard.submit') }}</button>
            </div>
        </div>
    </form>
    <form id="lessonStore" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="is_update" value="false">
        <div id="lesson-modal" class="modal fade lesson-model">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{ __('dashboard.add_lession') }}</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="meta_title">{{ __('dashboard.lession_title') }}</label>
                            <input type="text" name="title" class="form-control" id="lesson_title"
                                placeholder="Enter Lesson Title">
                        </div>
                        <div class="form-group">
                            <label for="lesson_description">{{ __('dashboard.lession_description') }}</label>
                            <textarea class="form-control" name="description" rows="3" id="lesson_description"></textarea>
                        </div>

                        <div class="form-group clearfix">
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="uploadVideo" name="course_lesson" checked>
                                <label for="uploadVideo">
                                    {{ __('dashboard.upload_video') }}
                                </label>
                            </div>
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="youtube" name="course_lesson">
                                <label for="youtube">
                                    {{ __('dashboard.youtube_video') }}
                                </label>
                            </div>
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="audio" name="course_lesson">
                                <label for="audio">
                                    {{ __('dashboard.audio') }}
                                </label>
                            </div>
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="ppt" name="course_lesson">
                                <label for="ppt">
                                    {{ __('dashboard.ppt') }}
                                </label>
                            </div>
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="pdf" name="course_lesson">
                                <label for="pdf">
                                    {{ __('dashboard.pdf') }}
                                </label>
                            </div>
                        </div>
                        <div class="upload-video">
                            <div class="form-group">
                                <label
                                    for="lessonVideoThumbnailImage">{{ __('dashboard.lesson_video_thumbnail') }}</label>
                                <img id="image_preview_video_thumbnail" class="d-none my-3" width="100"
                                    height="100">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="video_thumbnail" class="custom-file-input"
                                            id="lessonVideoThumbnailImage">
                                        <label class="custom-file-label"
                                            for="lessonVideoThumbnailImage">{{ __('dashboard.choose_file') }}</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">{{ __('dashboard.upload') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="lesson_video_url">{{ __('dashboard.lesson_video_file') }}</label>
                                <video width="100" height="100" id="video_preview_video_thumbnail"
                                    style="display:none" controls autoplay>
                                    {{ __('dashboard.lesson_video_note') }}
                                </video>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="courseVideo">
                                    <label class="custom-file-label"
                                        for="courseVideo">{{ __('dashboard.upload_course_video') }}</label>
                                </div>
                            </div>
                        </div>

                        <div class="youtube-video">
                            <div class="form-group">
                                <label for="lesson_video_url">{{ __('dashboard.lesson_video_url') }}</label>
                                <input type="text" name="video_url" class="form-control" id="lesson_video_url"
                                    placeholder="Enter Video Lesson Url From Youtube">
                            </div>
                        </div>

                        <div class="audio">
                            <div class="form-group">
                                <label for="lesson_video_url">{{ __('dashboard.lesson_audio_file') }}</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="audio_file" id="courseAudio">
                                    <label class="custom-file-label"
                                        for="courseAudio">{{ __('dashboard.upload_course_audio') }}</label>
                                </div>
                            </div>
                        </div>

                        <div class="ppt">
                            <div class="form-group">
                                <label for="lesson_video_url">{{ __('dashboard.lesson_ppt_file') }}</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="ppt_file" id="coursePpt">
                                    <label class="custom-file-label"
                                        for="coursePpt">{{ __('dashboard.upload_course_ppt') }}</label>
                                </div>
                            </div>
                        </div>

                        <div class="pdf">
                            <div class="form-group">
                                <label for="lesson_video_url">{{ __('dashboard.lesson_pdf_file') }}</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="pdf_file" id="coursePdf">
                                    <label class="custom-file-label"
                                        for="coursePdf">{{ __('dashboard.upload_course_pdf') }}</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>{{ __('dashboard.select_student_visibility') }}</label>
                            <select name="visibility" id="visibility" class="custom-select">
                                <option value="">{{ __('dashboard.select_visibility') }}</option>
                                <option value="lock">{{ __('dashboard.lock') }}</option>
                                <option value="unlock">{{ __('dashboard.unlock') }}</option>
                            </select>
                        </div>

                        {{-- Lesson duration --}}
                        <div class="form-group">
                            <label>Lesson Duration</label>
                            <input type="text" name="duration" class="form-control" id="duration_lesson">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ __('dashboard.close') }}</button>
                        <button type="submit" class="btn btn-primary"
                            id="submit-lesson-btn">{{ __('dashboard.submit') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@push('scripts')
    <script src="{{ asset('backend/assets/plugins/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/duration/bootstrap-duration-picker.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/jquery-ui/jquery-ui-1.12.1.min.js') }}"></script>
    <script>
        (function($) {
            "use strict";
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
            $(document).ready(function() {
                tinymce.init({
                    selector: '#description'
                });
                const priceOptions = document.querySelectorAll('input[name="r1"]');
                const priceForm = document.querySelector('#pricesection');

                priceOptions.forEach(option => {
                    option.addEventListener('change', function() {
                        if (this.value === 'paid') {
                            priceForm.style.display = 'block';
                        } else {
                            priceForm.style.display = 'none';
                        }
                    });
                });

                $("#course-form").on("submit", function() {
                    var discount_price = parseInt($("input[name='discount_price']").val())
                    var price = parseInt($("input[name='price']").val());
                    if (discount_price > price) {
                        Toast.fire({
                            icon: 'error',
                            title: "Discount price can't be greater than price"
                        });
                        return false;
                    }
                });
                $("#image_preview").hide();
                $("#courseImage").on('change', function() {
                    $("#image_preview").show();
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $("#image_preview").attr("src", e.target.result);
                    }
                    reader.readAsDataURL($(this)[0].files[0]);
                });

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                });

                let course_id = null;
                if (course_id == null) {
                    $.ajax({
                        url: "{{ route('course.store') }}",
                        type: "POST",
                        data: {
                            course_title: "auto draft",
                        },
                        success: function(data) {
                            Toast.fire({
                                icon: 'success',
                                title: data.message
                            });
                            if (data.status == "success") {
                                course_id = data.id;
                                $("#course-form").attr("action",
                                    `{{ url('/admin/course/make/update') }}/${data.id}`);
                                $("#course-form").attr("method", "POST");
                            }
                        }
                    });
                }

                $(document).on("focusout", ".focuas_out_change", function() {
                    var course_title = $("#BlogTitle").val();

                    courseCreateAjax({
                        course_title: course_title,
                    });
                });

                // add course image 
                function courseCreateAjax(data) {
                    $.ajax({
                        url: "{{ url('/admin/course/make/update') }}/" + course_id,
                        type: "POST",
                        method: "PUT",
                        data: {
                            data
                        },
                        success: function(data) {
                            if (data.status == "success") {
                                Toast.fire({
                                    icon: 'success',
                                    title: data.message
                                });
                            }
                        }
                    });
                }

                // topic add 
                $(document).on("click", "#add-topic-btn", function(e) {
                    e.preventDefault();
                    $("#topic-modal").modal("show");
                });
                $(document).on("click", "#submit-topic-btn", function(e) {
                    e.preventDefault();
                    var title = $("#topic_title").val();
                    var description = $("#topic_description").val();
                    var topic = {
                        course_id: course_id,
                        title: title,
                        description: description,
                    };
                    $.ajax({
                        url: "{{ route('admin.course.storeTopicData') }}",
                        type: "POST",
                        data: {
                            topic
                        },
                        success: function(data) {
                            Toast.fire({
                                icon: 'success',
                                title: data.message
                            });
                            let topic = data.topic;
                            let show = topic.id == 1 ? "show" : "";
                            var topicRaw = `<div id="accordion-${topic.id}" data-topic-id="${topic.id}">
                            <div class="card card-primary">
                            <div class="card-header">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="topicTitlw">
                                        <h4 class="card-title w-100"><a class="d-block w-100" data-toggle="collapse" href="#collapseOne-${topic.id}">${topic.title}</a></h4>
                                    </div>
                                    
                                    <div class="topicAction">
                                        <button class="tp-edit-btn edit-topic-btn" data-topic-id="${topic.id}">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                            </span>
                                        </button>
                                        <button class="tp-delet-btn delete-topic-btn" data-topic-id="${topic.id}">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div id="collapseOne-${topic.id}" class="collapse ${show}" data-parent="#accordion-${topic.id}">
                                <div class="card-body">
                                    <ul class="lesson-list" data-topic-id="${topic.id}">
                                        
                                    </ul>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button class="tp-add-lesson-btn add-lesson-btn" data-topic-id="${topic.id}">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                                </span>             
                                                {{ __('dashboard.add_lession') }}    
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>`;
                            $("#curriculum").append(topicRaw);
                            $("#topic-modal").modal("hide");
                            $("#topic_title").val("");
                            $("#topic_description").val("");

                        }
                    });
                });
                // edit topic
                $(document).on("click", ".edit-topic-btn", function(e) {
                    e.preventDefault();
                    var topicId = $(this).data("topic-id");
                    $.ajax({
                        url: "{{ route('admin.course.editTopicData') }}",
                        type: "POST",
                        data: {
                            id: topicId
                        },
                        success: function(data) {
                            $("#edit-topic-modal").modal("show");
                            $("#edit-topic-modal #topic_title").val(data.topic.title);
                            $("#edit-topic-modal #topic_description").val(data.topic
                                .description);
                            $("#edit-topic-modal #update-topic-btn").data("topic-id", data
                                .topic.id);
                        }
                    });
                });

                // update topic
                $(document).on("click", "#update-topic-btn", function(e) {
                    e.preventDefault();
                    var topicId = $(this).data("topic-id");
                    var title = $("#edit-topic-modal #topic_title").val();
                    var description = $("#edit-topic-modal #topic_description").val();
                    var topic = {
                        id: topicId,
                        title: title,
                        description: description,
                    };
                    $.ajax({
                        url: "{{ route('admin.course.updateTopicData') }}",
                        type: "POST",
                        data: {
                            topic
                        },
                        success: function(data) {
                            Toast.fire({
                                icon: 'success',
                                title: data.message
                            });
                            $(`#accordion-${topicId} .card-title a`).text(data.topic.title);
                            $("#edit-topic-modal").modal("hide");

                        }
                    });
                });

                // delete topic
                $(document).on("click", ".delete-topic-btn", function(e) {
                    e.preventDefault();
                    var topicId = $(this).data("topic-id");
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
                            $.ajax({
                                url: "{{ route('admin.course.deleteTopicData') }}",
                                type: "POST",
                                data: {
                                    id: topicId
                                },
                                success: function(data) {
                                    Toast.fire({
                                        icon: 'success',
                                        title: data.message
                                    });
                                    $(`#accordion-${topicId}`).remove();
                                    Swal.fire(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success'
                                    )
                                },
                            });
                        }
                    });
                });


                // add lesson
                $(document).on("click", ".add-lesson-btn", function(e) {
                    e.preventDefault();
                    var topicId = $(this).data("topic-id");

                    //add hidden input field in form
                    $("#lessonStore").append(
                        `<input type="hidden" name="topic_id" value="${topicId}">`);

                    $("#lesson-modal").modal("show");
                });

                $(document).on("submit", "#lessonStore", function(e) {
                    e.preventDefault();
                    var topicId = $(this).find("input[name='topic_id']").val();
                    var is_update = $(this).find("input[name='is_update']").val();
                    // add topic id in form data
                    var formData = new FormData(this);
                    var formData = new FormData(this);
                    var courseVideo = $("#courseVideo").prop("files")[0];
                    var courseAudio = $("#courseAudio").prop("files")[0];
                    var coursePpt = $("#coursePpt").prop("files")[0];
                    var coursePdf = $("#coursePdf").prop("files")[0];
                    if (courseVideo && courseVideo.size > 20971520) {
                        Toast.fire({
                            icon: 'error',
                            title: "File size is too large!"
                        });
                        return;
                    } else {
                        formData.append("video_file", courseVideo);
                    }


                    formData.append("topic_id", topicId);
                    formData.append("audio_file", courseAudio);
                    formData.append("ppt_file", coursePpt);
                    formData.append("pdf_file", coursePdf);
                    formData.append("course_id", course_id);
                    // check is update or not and update lesson

                    if (is_update == "true") {
                        var lessonId = $(this).find("input[name='lesson_id']").val();
                        formData.append("lesson_id", lessonId);
                        $.ajax({
                            url: "{{ route('admin.course.storeLessonData') }}",
                            type: "POST",
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function(data) {
                                Toast.fire({
                                    icon: 'success',
                                    title: data.message
                                });
                                $(`#accordion-${data.lesson.topic_id} .lesson-item[data-lesson-id="${data.lesson.id}"] h5`)
                                    .text(data.lesson.title);
                                $("#lesson-modal").modal("hide");
                                //reset form
                                $("#lessonStore")[0].reset();
                            },
                            error: function(err) {
                                let error = err.responseJSON;
                                $.each(error.errors, function(index, value) {
                                    $('.errorMassage').append(
                                        '<span class="text-danger">' + value +
                                        '<span>' + '<br>');
                                });
                            }
                        });
                        return;
                    }



                    //insert lesson 
                    $.ajax({
                        url: "{{ route('admin.course.storeLessonData') }}",
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(data) {
                            Toast.fire({
                                icon: 'success',
                                title: data.message
                            });
                            let lessonShow = `<li class="lesson-item" data-lesson-id="${data.lesson.id}">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="lessonTitle">
                            <h5 class="mb-0">${data.lesson.title}</h5>
                        </div>
                        <div class="lessonAction">
                            <button class="tp-edit-btn edit-lesson-btn" data-lesson-id="${data.lesson.id}" data-topic-id="${topicId}">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                </span>
                            </button>
                            <button class="tp-delet-btn delete-lesson-btn" data-lesson-id="${data.lesson.id}">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                </span>
                            </button>
                        </div>
                    </div>
                </li>`;
                            $(`#accordion-${topicId} .lesson-list`).append(lessonShow);
                            $(this).find("input[name='topic_id']").val("");
                            $("#lessonStore").find("input[name='topic_id']").remove();
                            $("#lesson-modal").modal("hide");
                            $("#lessonStore")[0].reset();
                        },
                        error: function(err) {
                            let error = err.responseJSON;
                            $.each(error.errors, function(index, value) {
                                $('.errorMassage').append(
                                    '<span class="text-danger">' + value +
                                    '<span>' + '<br>');
                            });
                        }
                    });
                });

                // edit lesson
                $(document).on("click", ".edit-lesson-btn", function(e) {
                    e.preventDefault();
                    var lessonId = $(this).data("lesson-id");
                    var topicId = $(this).data("topic-id");
                    $.ajax({
                        url: "{{ route('admin.course.editLessonData') }}",
                        type: "POST",
                        data: {
                            id: lessonId,
                        },
                        success: function(data) {
                            $("#lesson-modal").modal("show");
                            $("#lessonStore").find("input[name='is_update']").val("true");
                            $("#lesson-modal").append(
                                `<input type="hidden" name="lesson_id" id="lesson_id" value="${data.lesson.id}">`
                            );
                            $("#lesson-modal").append(
                                `<input type="hidden" name="topic_id" id="topic_id" value="${data.lesson.topic_id}">`
                            );
                            $("#lesson-modal #lesson_title").val(data.lesson.title);
                            $("#lesson-modal #lesson_description").val(data.lesson
                                .description);
                            if (data.lesson.video_url != null) {
                                $("#lesson-modal #lesson_video_url").val(data.lesson
                                    .video_url);
                            }
                            if (data.lesson.video != null) {
                                $("#lesson-modal #courseVideo").attr('src', data.lesson
                                    .video);
                            }
                            if (data.lesson.audio != null) {
                                $("#lesson-modal #courseAudio").attr('src', data.lesson
                                    .audio);
                            }
                            if (data.lesson.ppt != null) {
                                $("#lesson-modal #coursePpt").attr('src', data.lesson
                                    .ppt);
                            }
                            if (data.lesson.pdf != null) {
                                $("#lesson-modal #coursePdf").attr('src', data.lesson
                                    .pdf);
                            }
                            $("#lesson-modal #visibility").val(data.lesson.visibility);
                            $("#lesson-modal .duration_value_show").val(data.lesson
                                .duration);

                            let duration = data.lesson.duration;
                            let day = Math.floor(duration / (24 * 3600));
                            duration = duration % (24 * 3600);
                            let hour = Math.floor(duration / 3600);
                            duration %= 3600;
                            let minute = Math.floor(duration / 60);
                            duration %= 60;
                            let second = Math.floor(duration);

                            $("#lesson-modal .duration_value_show_now").text(
                                `${day}d ${hour}h ${minute}m ${second}s`);

                            if (data.lesson.type == "video") {
                                $("#lesson-modal #uploadVideo").prop("checked", true);
                                $("#lesson-modal #uploadVideo").click();
                            } else if (data.lesson.type == "url") {
                                $("#lesson-modal #youtube").prop("checked", true);
                                $("#lesson-modal #youtube").click();
                            } else if (data.lesson.type == "audio") {
                                $("#lesson-modal #audio").prop("checked", true);
                                $("#lesson-modal #audio").click();
                            } else if (data.lesson.type == "ppt") {
                                $("#lesson-modal #ppt").prop("checked", true);
                                $("#lesson-modal #ppt").click();
                            } else if (data.lesson.type == "pdf") {
                                $("#lesson-modal #pdf").prop("checked", true);
                                $("#lesson-modal #pdf").click();
                            } else {
                                $("#lesson-modal #uploadVideo").prop("checked", true);
                                $("#lesson-modal #uploadVideo").click();
                            }
                            $("#lesson-modal #video_preview_video_thumbnail").attr("src",
                                data.lesson.video_thumbnail);
                        }
                    });
                });

                // update lesson
                $(document).on("click", "#update-lesson-btn", function(e) {
                    e.preventDefault();
                    var lessonId = $("#lesson-modal #lesson_id").val();
                    var topicId = $("#lesson-modal #topic_id").val();
                    var title = $("#lesson-modal #lesson_title").val();
                    var description = $("#lesson-modal #lesson_description").val();
                    var video_url = $("#lesson-modal #lesson_video_url").val();
                    var courseAudio = $("#courseAudio")[0].files[0];
                    var coursePpt = $("#coursePpt")[0].files[0];
                    var coursePdf = $("#coursePdf")[0].files[0];
                    var courseVideo = $("#courseVideo")[0].files[0];
                    var visibility = $("#lesson-modal #visibility").val();
                    var duration = $("#lesson-modal .duration_value_show").val();

                    var lesson = {
                        id: lessonId,
                        title: title,
                        description: description,
                        video_url: video_url,
                        topic_id: topicId,
                        visibility: visibility,
                        duration: duration,
                        audio_file: courseAudio,
                        ppt_file: coursePpt,
                        pdf_file: coursePdf,
                        video_file: courseVideo,
                    };
                    $.ajax({
                        url: "{{ route('admin.course.updateLessonData') }}",
                        type: "POST",
                        data: {
                            lesson
                        },
                        success: function(data) {
                            Toast.fire({
                                icon: 'success',
                                title: data.message
                            });
                            location.reload();
                            $(`#accordion-${data.lesson.topic_id} .lesson-item[data-lesson-id="${data.lesson.id}"] h5`)
                                .text(data.lesson.title);
                            $("#lesson-modal").modal("hide");
                        },
                        error: function(err) {
                            let error = err.responseJSON;
                            $.each(error.errors, function(index, value) {
                                $('.errorMassage').append(
                                    '<span class="text-danger">' + value +
                                    '<span>' + '<br>');
                            });
                        }
                    });
                });

                // delete lesson
                $(document).on("click", ".delete-lesson-btn", function(e) {
                    e.preventDefault();
                    var lessonId = $(this).data("lesson-id");
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "Once Delete, This will be Permanently Delete!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: "{{ route('admin.course.deleteLessonData') }}",
                                type: "POST",
                                data: {
                                    id: lessonId
                                },
                                success: function(data) {
                                    Toast.fire({
                                        icon: 'success',
                                        title: data.message
                                    });
                                    $(`#accordion-${data.lesson.topic_id} .lesson-item[data-lesson-id="${data.lesson.id}"]`)
                                        .remove();
                                    Swal.fire(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success'
                                    )
                                },
                            });
                        }
                    });
                });


                //radio button wise show hide
                $(".upload-video").show();
                $(".youtube-video").hide();
                $(".audio").hide();
                $(".ppt").hide();
                $(".pdf").hide();
                $('input[type="radio"]').on("click", function() {
                    if ($(this).attr('id') == 'uploadVideo') {
                        $(".upload-video").show();
                        $(".youtube-video").hide();
                        $(".audio").hide();
                        $(".ppt").hide();
                        $(".pdf").hide();
                    } else if ($(this).attr('id') == 'youtube') {
                        $(".upload-video").hide();
                        $(".youtube-video").show();
                        $(".audio").hide();
                        $(".ppt").hide();
                        $(".pdf").hide();
                    } else if ($(this).attr('id') == 'audio') {
                        $(".upload-video").hide();
                        $(".youtube-video").hide();
                        $(".audio").show();
                        $(".ppt").hide();
                        $(".pdf").hide();
                    } else if ($(this).attr('id') == 'ppt') {
                        $(".upload-video").hide();
                        $(".youtube-video").hide();
                        $(".audio").hide();
                        $(".ppt").show();
                        $(".pdf").hide();
                    } else if ($(this).attr('id') == 'pdf') {
                        $(".upload-video").hide();
                        $(".youtube-video").hide();
                        $(".audio").hide();
                        $(".ppt").hide();
                        $(".pdf").show();
                    } else {
                        $(".upload-video").show();
                        $(".youtube-video").hide();
                        $(".audio").hide();
                        $(".ppt").hide();
                        $(".pdf").hide();
                    }
                });


                $('#duration').durationPicker({
                    showSeconds: true
                });

                $('#duration_lesson').durationPicker({
                    showSeconds: true
                });


                //category wise subcategory
                $('#category_id').on('change', function() {
                    var categoryId = $(this).val();
                    if (categoryId) {
                        $.ajax({
                            url: '/admin/course/subcategories/' + categoryId,
                            type: 'GET',
                            dataType: 'json',
                            success: function(data) {
                                $('#subcategory_id').empty();
                                $('#subcategory_id').append(
                                    '<option value="">Select Subcategory</option>');
                                $.each(data, function(index, subcategory) {
                                    $('#subcategory_id').append('<option value="' +
                                        subcategory.id + '">' + subcategory
                                        .title + '</option>');
                                });
                            }
                        });
                    } else {
                        $('#subcategory_id').empty();
                        $('#subcategory_id').append('<option value="">Select Subcategory</option>');
                    }
                });
                // price section hide show

            });
        })(jQuery);
    </script>
@endpush
