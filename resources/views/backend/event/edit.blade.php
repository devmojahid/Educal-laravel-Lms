@extends('backend.layouts.master')
@section('title', __('dashboard.edit_events'))
@section('content')
    {{-- Content Header (Page header)  --}}
    <section class="content-header info-box p-3 rounded">
        <div class="container-fluid">
            <div class="row mb-2 mt-2">
                <div class="col-sm-6">
                    <h3 class="card-title">{{ __('dashboard.edit_events') }}</h3>
                </div>
                <div class="col-sm-6">
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('admin.events.index') }}">
                            <i class="fas fa-plus"></i>{{ __('dashboard.all_events') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <form id="eventForm" action="{{ route('admin.events.update', $event->id) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="eventTitle">{{ __('dashboard.title') }}</label>
                    <input type="text" name="title" value="{{ $event->title }}" class="form-control" id="eventTitle"
                        placeholder="Enter Title" required>
                </div>
                <div class="form-group">
                    <label for="eventDesc">{{ __('dashboard.description') }}</label>
                    <textarea name="description" id="description" class="form-control">{{ sanitizeInput($event->description) }}</textarea>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-6">
                            <label>{{ __('dashboard.start_date') }}</label>
                            <input type="date" name="start_date" class="form-control" value="{{ $event->start_date }}"
                                required>
                        </div>
                        <div class="col-6">
                            <label>{{ __('dashboard.end_date') }}</label>
                            <input type="date" name="end_date" class="form-control" value="{{ $event->end_date }}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-6">
                            <label>{{ __('dashboard.start_time') }}</label>
                            <input type="time" name="start_time" class="form-control" required
                                value="{{ $event->start_time }}">
                        </div>
                        <div class="col-6">
                            <label>{{ __('dashboard.end_time') }}</label>
                            <input type="time" name="end_time" class="form-control" value="{{ $event->end_time }}">
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="row">
                        <div class="col-6">
                            <label for="eventImage">{{ __('dashboard.image') }}</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="eventImage">
                                    <label class="custom-file-label"
                                        for="eventImage">{{ __('dashboard.choose_file') }}</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">{{ __('dashboard.upload') }}</span>
                                </div>
                            </div>
                            <div class="image_preview my-2">
                                <img id="eventImage_preview" alt="Event Image" width="50" height="50"
                                    src="{{ asset($event->image) }}" />
                            </div>
                        </div>
                        <div class="col-6">
                            <label>{{ __('dashboard.location') }}</label>
                            <input type="text" name="location" class="form-control" value="{{ $event->location }}"
                                required>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-6">
                            <label>{{ __('dashboard.price') }}</label>
                            <input type="number" name="ticket_price" min="0" class="form-control" required
                                value="{{ $event->ticket_price }}">
                        </div>
                        <div class="col-6">
                            <label>{{ __('dashboard.discount_price') }}</label>
                            <input type="number" name="ticket_discount_price" min="0" class="form-control"
                                value="{{ $event->ticket_discount_price }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- speaker section  --}}
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-6">
                            <label>{{ __('dashboard.speaker_name') }}</label>
                            <input type="text" name="speaker_name" class="form-control"
                                value="{{ $event->speaker_name }}">
                        </div>
                        <div class="col-6">
                            <label>{{ __('dashboard.speaker_designation') }}</label>
                            <input type="text" name="speaker_designation" class="form-control"
                                value="{{ $event->speaker_designation }}">
                        </div>
                        <div class="col-10 m-auto pt-4">
                            <label>{{ __('dashboard.speaker_image') }}</label>
                            
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="speaker_image" class="custom-file-input"
                                        id="speakerImage">
                                    <label class="custom-file-label"
                                        for="speakerImage">{{ __('dashboard.choose_file') }}</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">{{ __('dashboard.upload') }}</span>
                                </div>
                            </div>
                            <div class="image_preview my-2">
                                <img id="speakerImage_preview" alt="Speaker Image" width="50" height="50"
                                    src="{{ asset($event->speaker_image) }}" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- sponsor Section  --}}
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-6">
                            <label>{{ __('dashboard.sponsor_name') }}</label>
                            <input type="text" name="sponsor_name" class="form-control"
                                value="{{ $event->sponsor_name }}">
                        </div>
                        <div class="col-6">
                            <label>{{ __('dashboard.sponsor_logo') }}</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="sponsor_logo" class="custom-file-input"
                                        id="sponsorLogo">
                                    <label class="custom-file-label"
                                        for="sponsorLogo">{{ __('dashboard.choose_file') }}</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">{{ __('dashboard.upload') }}</span>
                                </div>
                            </div>
                            <div class="image_preview my-2">
                                <img id="sponsorLogo_preview" alt="Sponsor Logo" width="50" height="50"
                                    src="{{ asset($event->sponsor_logo) }}" />
                            </div>
                        </div>
                        <div class="col-6">
                            <label>{{ __('dashboard.sponsor_website') }}</label>
                            <input type="text" name="sponsor_website" class="form-control"
                                value="{{ $event->sponsor_website }}">
                        </div>
                        <div class="col-6">
                            <label>{{ __('dashboard.sponsor_email') }}</label>
                            <input type="email" name="sponsor_email" class="form-control"
                                value="{{ $event->sponsor_email }}">
                        </div>
                        {{-- sponsor_phone , sponsor_facebook,sponsor_twitter,sponsor_pinterest --}}
                        <div class="col-6">
                            <label>{{ __('dashboard.sponsor_phone') }}</label>
                            <input type="text" name="sponsor_phone" class="form-control"
                                value="{{ $event->sponsor_phone }}">
                        </div>
                        <div class="col-6">
                            <label>{{ __('dashboard.sponsor_facebook') }}</label>
                            <input type="text" name="sponsor_facebook" class="form-control"
                                value="{{ $event->sponsor_facebook }}">
                        </div>
                        <div class="col-6">
                            <label>{{ __('dashboard.sponsor_twitter') }}</label>
                            <input type="text" name="sponsor_twitter" class="form-control"
                                value="{{ $event->sponsor_twitter }}">
                        </div>
                        <div class="col-6">
                            <label>{{ __('dashboard.sponsor_pinterest') }}</label>
                            <input type="text" name="sponsor_pinterest" class="form-control"
                                value="{{ $event->sponsor_pinterest }}">
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <button type="submit" class="btn btn-primary">{{ __('dashboard.update') }}</button>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
    <script src="{{ asset('backend/assets/plugins/tinymce/tinymce.min.js') }}"></script>
    <script>
        "use strict";
        $(document).ready(function() {

            tinymce.init({
                selector: '#description'
            });
        
            if ($("#eventImage_preview").attr('src') == '') {
                $("#eventImage_preview").hide();
            }
            $('#eventImage').on('change',function(e) {
                $("#eventImage_preview").show();
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#eventImage_preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            });

            if ($("#speakerImage_preview").attr('src') == '') {
                $("#speakerImage_preview").hide();
            }
            $('#speakerImage').on('change',function(e) {
                $("#speakerImage_preview").show();
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#speakerImage_preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            });
            if ($("#sponsorLogo_preview").attr('src') == '') {
                $("#sponsorLogo_preview").hide();
            }
            $('#sponsorLogo').on('change',function(e) {
                $("#sponsorLogo_preview").show();
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#sponsorLogo_preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            });
        });
    </script>
@endpush
