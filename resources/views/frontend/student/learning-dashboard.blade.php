@extends('frontend.layouts.master')
@section('title', 'Profile Page')
@section('content')
    <section class="dashboard-area p-relative">
        <div class="tp-board d-flex lesson-details-side">
            <div class="tp-board-sidebar">
                <div class="tp-board-content">
                    <h4 class="tp-board-title">Course Content</h4>
                    <a class="tp-course-close-btn d-lg-none" href="#"><i class="fal fa-times"></i></a>
                </div>
                <div class="tp-board-accordion-item">
                    <div class="accordion" id="courseTopics">
                        @foreach ($course->topics as $key => $topic)
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse-{{ $key }}" aria-expanded="true"
                                        aria-controls="collapse-{{ $key }}">
                                        {{ $topic->title }}
                                        </span>
                                    </button>
                                </h2>
                                <div id="collapse-{{ $key }}" class="accordion-collapse collapse show"
                                    data-bs-parent="#courseTopics">
                                    <div class="accordion-body">
                                        <div class="tp-board-accordion-list">
                                            <ul>
                                                @forelse ($topic->lessons as $lesson)
                                                    @php
                                                        $lessonId = $lesson->id ?? 0;
                                                    @endphp
                                                    <li class="@if ($lessonId == $lessonData->id) active @endif">
                                                        <a class="d-flex justify-content-between"
                                                            href="{{ route('dashboard.lesson', [$course->slug, $lesson->id]) }}">
                                                            <div class="course-left d-flex">
                                                                @if ($lesson->type == 'video')
                                                                    <i class="far fa-video"></i>
                                                                @elseif($lesson->type == 'url')
                                                                    <i class="fab fa-youtube"></i>
                                                                @elseif($lesson->type == 'audio')
                                                                    <i class="fas fa-headphones"></i>
                                                                @elseif($lesson->type == 'pdf')
                                                                    <i class="far fa-file-pdf"></i>
                                                                @elseif($lesson->type == 'ppt')
                                                                    <i class="far fa-file-powerpoint"></i>
                                                                @else
                                                                    <i class="far fa-file"></i>
                                                                @endif
                                                                <span>{{ $lesson->title }}</span>
                                                            </div>
                                                            <div class="course-right">
                                                                <p>
                                                                    {{-- duration minute  --}}
                                                                    @php
                                                                        // 90000 second
                                                                        $lessonDuration = $lesson->duration;
                                                                        if($lessonDuration == null){
                                                                            $lessonDuration = 0;
                                                                        }
                                                                        $duration = $lessonDuration;
                                                                        $days = floor($duration / 86400);
                                                                        $hours = floor(($duration - $days * 86400) / 3600);
                                                                        $minutes = floor(($duration - $days * 86400 - $hours * 3600) / 60);
                                                                        $seconds = floor($duration - $days * 86400 - $hours * 3600 - $minutes * 60);
                                                                    @endphp

                                                                    @if ($days > 0)
                                                                        {{ $days }}d : {{ $hours }}h :
                                                                        {{ $minutes }}m
                                                                    @elseif ($hours > 0)
                                                                        {{ $hours }}h : {{ $minutes }}m
                                                                    @elseif ($minutes > 0)
                                                                        {{ $minutes }}m
                                                                    @else
                                                                        {{ __('frontend.under_one_minute') }}
                                                                    @endif

                                                                </p>
                                                                @if ($lesson->visibility == 'lock')
                                                                    <span>
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="16" height="16"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            stroke="currentColor" stroke-width="2.5"
                                                                            stroke-linecap="round" stroke-linejoin="round"
                                                                            class="feather feather-lock">
                                                                            <rect x="3" y="11" width="18" height="11"
                                                                                rx="2" ry="2"></rect>
                                                                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                                                        </svg>
                                                                    </span>
                                                                @else
                                                                    <span>
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="16" height="16"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            stroke="currentColor" stroke-width="2.5"
                                                                            stroke-linecap="round" stroke-linejoin="round"
                                                                            class="feather feather-unlock">
                                                                            <rect x="3" y="11" width="18" height="11"
                                                                                rx="2" ry="2"></rect>
                                                                            <path d="M7 11V7a5 5 0 0 1 9.9-1"></path>
                                                                        </svg>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </a>
                                                    </li>
                                                @empty
                                                    <div
                                                        class="course__curriculum-content d-sm-flex justify-content-between align-items-center">
                                                        <div class="course__curriculum-info">

                                                            <h3>{{ __('frontend.no_lession_found') }}</h3>
                                                        </div>
                                                    </div>
                                                @endforelse
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="tp-board-main">

                @include('frontend.student.lesson')

                <div class="tp-board-main-tab mt-200">
                    <div class="course__tab-2 mb-45">
                        <ul class="nav nav-tabs" id="courseTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                    data-bs-target="#description" type="button" role="tab" aria-controls="description"
                                    aria-selected="true"> <i class="icon_ribbon_alt"></i> <span>Discription</span> </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="resources-tab" data-bs-toggle="tab" data-bs-target="#resources"
                                    type="button" role="tab" aria-controls="resources" aria-selected="false"> <i
                                        class="fal fa-user"></i> <span>Resources</span> </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="review-tab" data-bs-toggle="tab" data-bs-target="#review"
                                    type="button" role="tab" aria-controls="review" aria-selected="false"> <i
                                        class="icon_star_alt"></i> <span>Reviews</span> </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link " id="quiz-tab" data-bs-toggle="tab" data-bs-target="#quiz"
                                    type="button" role="tab" aria-controls="quiz" aria-selected="false"> <i
                                        class="icon_book_alt"></i> <span>Quiz</span> </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link " id="curriculum-tab" data-bs-toggle="tab"
                                    data-bs-target="#curriculum" type="button" role="tab"
                                    aria-controls="curriculum" aria-selected="false"> <i class="icon_book_alt"></i>
                                    <span>Assignment</span> </button>
                            </li>
                        </ul>
                    </div>
                    <div class="course__tab-content mb-95">
                        <div class="tab-content" id="courseTabContent">
                            <div class="tab-pane fade show active" id="description" role="tabpanel"
                                aria-labelledby="description-tab">
                                <div class="course__description">
                                    <h3>Course Overview</h3>
                                    {{ sanitizeInput($course->description) }}

                                </div>
                            </div>
                            <div class="tab-pane fade" id="resources" role="tabpanel" aria-labelledby="resources-tab">
                                <div class="tp-board-resources-content">
                                    <h4 class="tp-board-resources-title">{{ __('frontend.resources') }}(@if (isset($course->resources))
                                            {{ count($course->resources) }}
                                        @else
                                            {{ __('frontend.0') }}
                                        @endif)</h4>
                                    @if (isset($course->resources))
                                        @foreach ($course->resources as $resource)
                                            <div class="tp-board-resources-list">
                                                <a href="{{ asset($resource->file) }}"><i class="fal fa-link"></i>
                                                    {{ $resource->title }}</a>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                                @include('frontend.template-parts.review', [
                                    'from_page' => 'learning_dashboard',
                                ])
                            </div>
                            <div class="tab-pane fade" id="quiz" role="tabpanel" aria-labelledby="quiz-tab">
                                @if (!isset($quizQuestions->questions))
                                    @if (isset($course->activeQuizzes))
                                        <div class="row assingment_section_arera_table">
                                            <div class="col-12">
                                                <div class=" bg-white p-30 appendAssignment">
                                                    <div>
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">Quiz Topic</th>
                                                                        <th scope="col">Marks Per Question</th>
                                                                        <th scope="col">Quiz Type</th>
                                                                        <th scope="col">Quiz Status</th>
                                                                        <th scope="col">Question Count</th>
                                                                        <th scope="col">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                    @isset($lessonData->id)
                                                                        @foreach ($course->activeQuizzes as $quizze)
                                                                            <tr>
                                                                                <td>{{ $quizze->title }}</td>
                                                                                <td>{{ $quizze->marks_per_question }}</td>
                                                                                <td>{{ $quizze->quiz_type }}</td>
                                                                                <td>{{ $quizze->quiz_status }}</td>
                                                                                <td>{{ $quizze->questionCount() }}</td>

                                                                                <td>
                                                                                    <div class="notice-board-action-btns">
                                                                                        <a class="e-btn"
                                                                                            href="{{ route('dashboard.quiz.question', [$course->slug, $lessonData->id, $quizze->id]) }}">
                                                                                            @if (session()->has("quiz_result_{$quizze->id}") && session("quiz_result_{$quizze->id}")['quiz_id'] == $quizze->id)
                                                                                                View Result
                                                                                            @else
                                                                                                Attempt
                                                                                            @endif
                                                                                        </a>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    @endisset
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @else
                                    @include('frontend.template-parts.quiz')
                                @endif

                            </div>
                            <div class="tab-pane fade" id="curriculum" role="tabpanel" aria-labelledby="curriculum-tab">
                                @if (isset($course->activeAssignments))
                                    <div class="row assingment_section_arera_table">
                                        <div class="col-12">
                                            <div class=" bg-white p-30 appendAssignment">
                                                <div>
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">Assignment Topic</th>
                                                                    <th scope="col">Marks</th>
                                                                    <th scope="col">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($course->activeAssignments as $assignment)
                                                                    <tr>
                                                                        <td>{{ $assignment->title }}</td>
                                                                        <td>{{ $assignment->marks }}</td>
                                                                        <td>
                                                                            <div class="notice-board-action-btns">
                                                                                <a class="e-btn"
                                                                                    href="{{ $assignment->file }}">
                                                                                    Download Assignment <i
                                                                                        class="fas fa-download"></i>
                                                                                </a>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            let questionsAndAnswers = [];
            $('.answer').on('change', function() {
                var questionId = $(this).prev('input[name="question_id"]').val();
                let data_id_question = $(this).attr('question-id');
                $('input[name="answer[]"][question-id="' + data_id_question + '"]').not(this).prop(
                    'checked', false);
                let index = questionsAndAnswers.findIndex(item => item.questionId === questionId);
                if (index === -1) {
                    questionsAndAnswers.push({
                        questionId,
                        answer: $(this).data("answer-value")
                    });
                } else {
                    questionsAndAnswers[index].answer = $(this).data("answer-value");
                }
                $quiz_answer = $("#quiz_answer").val(JSON.stringify(questionsAndAnswers));
            });
        });
    </script>
@endpush
