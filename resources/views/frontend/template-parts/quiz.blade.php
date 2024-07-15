@if (session()->has("quiz_result_{$quizQuestions->id}"))
<div class="card">
    <div class="card-body">
        <h3>Quiz Result</h3>
        <div class="row">
            @php
                $total_questions = session("quiz_result_{$quizQuestions->id}")['totalQuestion'];
                $attempted_questions = session("quiz_result_{$quizQuestions->id}")['attemts'];
                $correct_answers = session("quiz_result_{$quizQuestions->id}")['correctAnswer'];
                $percentage = session("quiz_result_{$quizQuestions->id}")['percentage'];
            @endphp
            <div class="col-md-6">
                <p>Total Questions: {{ $total_questions }}</p>
                <p>Attempted Questions: {{ $attempted_questions }}</p>
                <p>Correct Answers: {{ $correct_answers }}</p>
                <p>Percentage: {{ $percentage }}%</p>
            </div>
        </div>
    </div>
</div>
@else
    @if ($quizQuestions->questions->count() > 0)
        <form id="quizForm" action="{{ route('dashboard.quiz.submit', [$course->slug, $lessonData->id, $quizQuestions->id]) }}"
            method="POST">
            @csrf
            <input type="hidden" name="quiz_answer" id="quiz_answer">
            <input type="hidden" name="total_questions" value="{{ $quizQuestions->questions->count() }}">
            <div class="row">
                @foreach ($quizQuestions->questions as $key => $questions)
                    @if (isset($questions))
                        @if ($key % 2 == 0)
                            <div class="col-md-6  mb-30">
                                <div class="quiz-container" id="quiz">
                                    <div class="quiz-header">
                                        <h2 id="question">{{ $questions->question }}</h2>
                                        <ul>
                                            @php
                                                $serializedArray = $questions->options;
                                                $array = json_decode($serializedArray, true);
                                                $ans_val = $questions->answer;
                                            @endphp
                                            @foreach ($array as $option_key => $value)
                                                <li>
                                                    <input type="hidden" name="question_id"
                                                        value="{{ $questions->id }}">
                                                    <input type="checkbox" name="answer[]"
                                                        question-id={{ $questions->id }}
                                                        id="answer-{{ $key }}-{{ $option_key }}"
                                                        data-answer-value={{ $option_key + 1 }} class="answer"
                                                        value="{{ $option_key + 1 }}" />
                                                    <label for="answer-{{ $key }}-{{ $option_key }}"
                                                        id="answer-{{ $key }}-{{ $option_key }}">{{ $value }}</label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="col-md-6  mb-30">
                                <div class="quiz-container" id="quiz">
                                    <div class="quiz-header">
                                        <h2 id="question">{{ $questions->question }}</h2>
                                        <ul>
                                            @php
                                                $serializedArray = $questions->options;
                                                $array = json_decode($serializedArray, true);
                                                $ans_val = $questions->answer;
                                            @endphp
                                            @foreach ($array as $option_key => $value)
                                                <li>
                                                    <input type="hidden" name="question_id"
                                                        value="{{ $questions->id }}">
                                                    <input type="checkbox" name="answer[]"
                                                        question-id={{ $questions->id }}
                                                        id="answer-{{ $key }}-{{ $option_key }}"
                                                        data-answer-value={{ $option_key + 1 }} class="answer"
                                                        value="{{ $option_key + 1 }}" />
                                                    <label for="answer-{{ $key }}-{{ $option_key }}"
                                                        id="answer-{{ $key }}-{{ $option_key }}">{{ $value }}</label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                @endforeach
            </div>
            <button type="submit" class="e-btn">Submit</button>
        </form>
    @else
        <div class="card">
            <div class="card-body">
                <h3>No Quize Found</h3>
            </div>
        </div>
    @endif
@endif
