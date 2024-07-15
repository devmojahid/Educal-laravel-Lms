@extends('backend.layouts.master')
@section('title', __('dashboard.send_emails'))
@push("styles")
    <link rel="stylesheet" href="{{ asset("backend/assets/plugins/select2/css/select2.min.css") }}">
@endpush
@section('content')
    {{-- Content Header (Page header)  --}}
    <section class="content-header info-box p-3 rounded">
        <div class="container-fluid">
            <div class="row mb-2 mt-2">
                <div class="col-sm-6">
                    <h3 class="card-title">{{ __('dashboard.send_emails') }}</h3>
                </div>
               
            </div>
        </div>
    </section>

    <form id="eventForm" action="{{ route('admin.send.bulk.email') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <div class="d-flex align-items-center justify-content-between my-3">
                        <label for="subsriverSelect">{{ __('dashboard.seclect_subscriber') }}</label>
                        <button id="all_subscriber" class="btn btn-primary">{{ __('dashboard.select_all') }}</button>
                    </div>
                    <select name="subscriberes[]" class="form-control select2" id="allSubscribers" multiple>
                        @foreach ($subscribers as $subscriber)
                            <option value="{{ $subscriber->email }}">{{ $subscriber->email }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="emailSubject">{{ __('dashboard.email_subject') }}</label>
                    <input type="text" name="subject" class="form-control" id="emailSubject" placeholder="Enter subject" required>
                </div>
                <div class="form-group">
                    <label for="emailBody">{{ __('dashboard.email_body') }}</label>
                    <textarea name="body" class="form-control" id="emailBody"></textarea>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <button type="submit" class="btn btn-primary">{{ __('dashboard.submit') }}</button>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
<script src="{{ asset("backend/assets/plugins/select2/js/select2.min.js") }}"></script>
    <script src="{{ asset('backend/assets/plugins/tinymce/tinymce.min.js') }}"></script>
    <script>
        "use strict";
        $(document).ready(function() {
                tinymce.init({
                selector: '#emailBody'
            });

            $('.select2').select2();
            $('#all_subscriber').on("click",function(e) {
                e.preventDefault();
                $('#allSubscribers > option').prop('selected', true);
                $('#allSubscribers').trigger('change');
            });

        });
    </script>
@endpush
