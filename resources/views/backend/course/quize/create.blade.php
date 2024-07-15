@extends("backend.layouts.master")
@section("title",__("dashboard.create") . " " . __("dashboard.quiz"))
@section("content")
@push("styles")
    <link rel="stylesheet" href="{{ asset("backend/assets/plugins/duration/bootstrap-duration-picker.css") }}">
@endpush
     {{-- Content Header (Page header)  --}}
<section class="content-header info-box p-3 rounded">
    <div class="container-fluid">
        <div class="row mb-2 mt-2">
            <div class="col-sm-6">
                <h3 class="card-title">{{ __("dashboard.create") }} {{ __("dashboard.quiz") }}</h3>
            </div>
            <div class="col-sm-6">
                <div class="float-right">
                    <a class="btn btn-primary" href="{{ route("admin.course.getQuizData",$courseId) }}">
                        <i class="fas fa-plus"></i>
                        </i> {{ __("dashboard.all_quiz") }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<form id="quizForm" action="{{ route("admin.course.storeQuizData",$courseId) }}" method="POST">
    @csrf
    <input type="hidden" name="course_id" value="{{ $courseId }}">
   <div class="card">
        <div class="card-body">
            <div class="form-group">
                <label for="quizTitle">Quiz Title</label>
                <input type="text" name="title" class="form-control" id="quizTitle" placeholder="Enter Title" required>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Quiz Status</label>
                        <select name="quiz_type" class="custom-select">
                            <option value="multiple">Multiple Choise</option>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Quiz Status</label>
                        <select name="quiz_status" class="custom-select">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Course Duration</label>
                        <input type="text" name="quiz_duration" class="form-control" id="duration">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>marks per question</label>
                        <input type="number" name="marks_per_question" class="form-control" id="marks_per_question" placeholder="Enter marks per question" required>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
   </div>
</form>
@endsection

@push("scripts")
    <script src="{{ asset("backend/assets/plugins/duration/bootstrap-duration-picker.js") }}"></script>
    <script src="{{ asset("backend/assets/plugins/tinymce/tinymce.min.js") }}"></script>
<script>
    "use strict";
    $(document).ready(function() {
        tinymce.init({
            selector: '#description'
        });
        $('#duration').durationPicker({
            showSeconds: true
        });
    });

</script>
@endpush