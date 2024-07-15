@extends('backend.layouts.master')
@section('title', __('dashboard.create') . ' ' . __('dashboard.question'))
@section('content')
    @push('styles')
        <link rel="stylesheet" href="{{ asset('backend/assets/plugins/duration/bootstrap-duration-picker.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    @endpush
    {{-- Content Header (Page header)  --}}
    <section class="content-header info-box p-3 rounded">
        <div class="container-fluid">
            <div class="row mb-2 mt-2">
                <div class="col-sm-6">
                    <h3 class="card-title">{{ __('dashboard.create') }} {{ __('dashboard.question') }}</h3>
                </div>
                <div class="col-sm-6">
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('admin.course.getQuizData', $quizId) }}">
                            <i class="fas fa-plus"></i>
                            </i> {{ __('dashboard.all_quiz') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <form id="quizForm" action="{{ route('admin.course.storeQuizQuestionData', $quizId) }}" method="POST">
        @csrf
        <input type="hidden" name="quiz_id" value="{{ $quizId }}">
        <div class="card">
            <div class="card-body">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title w-100">
                            <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseOne" aria-expanded="false">
                                Add Your Question Hear
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="collapse show" data-parent="#accordion">

                        <div class="card-body">
                            <div class="form-group">
                                <label for="quizTitle">Question</label>
                                <input type="text" name="question[]" class="form-control" id="quizTitle" placeholder="Enter Title" required>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="option[]" class="form-control" id="quizTitle" placeholder="Enter Title" required>
                                    </div>
                                </div>
                                <div class="icheck-primary d-inline ml-3">
                                    <input type="radio" id="radioPrimary1" name="answer[]" value="1">
                                    <label for="radioPrimary1">
                                        Correct Answer
                                    </label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="option[]" class="form-control" id="quizTitle" placeholder="Enter Title" required>
                                    </div>
                                </div>
                                <div class="icheck-primary d-inline ml-3">
                                    <input type="radio" id="radioPrimary2" name="answer[]" value="2">
                                    <label for="radioPrimary2">
                                        Correct Answer
                                    </label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="option[]" class="form-control" id="quizTitle" placeholder="Enter Title" required>
                                    </div>
                                </div>
                                <div class="icheck-primary d-inline ml-3">
                                    {{-- if checked return on or off --}}
                                    <input type="radio" id="radioPrimary3" name="answer[]" value="3">
                                    <label for="radioPrimary3">
                                        Correct Answer
                                    </label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="option[]" class="form-control" id="quizTitle" placeholder="Enter Title" required>
                                    </div>
                                </div>
                                <div class="icheck-primary d-inline ml-3">
                                    {{-- if checked return on or off --}}
                                    <input type="radio" id="radioPrimary4" name="answer[]" value="4">
                                    <label for="radioPrimary4">
                                        Correct Answer
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

@endsection
@push("scripts")
<script>
    "use strict";
    $(document).ready(function() {
        $("#quizForm").submit(function(event) {
            const radioButtons = $("input[type='radio'][name='answer[]']");
            let atLeastOneChecked = false;

            radioButtons.each(function() {
                if ($(this).is(":checked")) {
                    atLeastOneChecked = true;
                    return false; 
                }
            });
            if (!atLeastOneChecked) {
                alert("Please select a correct answer");
                event.preventDefault();
            }
        });
    });
</script>
@endpush