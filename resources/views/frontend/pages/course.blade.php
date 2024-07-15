@extends('frontend.layouts.master')
@section('title', 'Course Page')
@section('content')
    {{-- Breadcrumb  --}}
    @include('frontend.layouts.breadcrumb', ['title' => 'Course'])
    {{-- Course Section --}}
    <section class="course__area pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 col-xl-8 col-lg-8">
                    @if (isset($search))
                        <div class="course__top-search mb-50">
                            <h3 class="course__top-search-title">{{ __('frontend.search_result_for') }}:
                                <span>{{ $search }}</span>
                            </h3>
                        </div>
                    @endif
                    <div class="course__tab-inner grey-bg-2 mb-50 d-sm-flex justify-content-between align-items-center">
                        <div class="course__tab-wrapper d-flex align-items-center">
                            <div class="course__view">
                                <h4>{{ __("frontend.course_list") }}</h4>
                            </div>
                        </div>
                        <div class="course__sort d-flex justify-content-sm-end">
                            <div class="course__sort-inner">
                                <select id="filterSortBy">
                                    <option>{{ __("frontend.default") }}</option>
                                    <option value="newest">{{ __("frontend.newest_course") }}</option>
                                    <option value="oldest">{{ __("frontend.oldest_course") }}</option>
                                    <option value="expensive">{{ __("frontend.price_high_to_low") }}</option>
                                    <option value="cheap">{{ __("frontend.price_low_to_high") }}</option>
                                    <option value="free">{{ __("frontend.free") }}</option>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="flipping d-none">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                    <div class="course__tab-conent">
                        <div class="tab-content" id="courseTabContent">
                            <div class="tab-pane fade show active" id="grid" role="tabpanel"
                                aria-labelledby="grid-tab">
                                <div id="course_data_show">
                                    @include('frontend.pages.course.single-course-in-grid')
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xxl-12">
                                <div class="basic-pagination wow fadeInUp mt-30" data-wow-delay=".2s">
                                    {{ $courses->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4">
                    @include('frontend.pages.course.course-sidebar')
                </div>
            </div>
        </div>
    </section>
    <!-- course area end -->

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            "use strict";

            let startLoader = () => {
                $(".flipping").removeClass("d-none");
            }
            let stopLoader = () => {
                $(".flipping").addClass("d-none");
            }
            //

            $("#filterSortBy").on('change',function() {
                let sortBy = $("#filterSortBy").val();
                $.ajax({
                    url: "{{ route('course.filter') }}",
                    type: "GET",
                    data: {
                        sortBy: sortBy
                    },
                    beforeSend: function() {
                        startLoader();
                    },
                    success: function(data) {
                        $("#course_data_show").html(data);
                    },
                    complete: function() {
                        stopLoader();
                    },
                    error: function(error) {
                        Toast.fire({
                            icon: 'error',
                            title: 'Something went wrong!'
                        })
                    }
                });
            });

            // just one check box select
            $("input[type='checkbox']").on('click',function() {
                $("input[type='checkbox']").not(this).prop("checked", false);
            });
            
            // category filter
            $(".course__sidebar-check").on("click",function() {
                var url = "{{ route('course.filter') }}";
                var category = [];
                var language = [];
                var price = [];
                var level = [];
                $.each($("input[name='category']:checked"), function() {
                    category.push($(this).val());
                });
                $.each($("input[name='language']:checked"), function() {
                    language.push($(this).val());
                });
                $.each($("input[name='price']:checked"), function() {
                    price.push($(this).val());
                });
                $.each($("input[name='level']:checked"), function() {
                    level.push($(this).val());
                });
                $.ajax({
                    url: url,
                    type: "GET",
                    daraType: "JSON",
                    data: {
                        category: category,
                        language: language,
                        price: price,
                        level: level
                    },
                    beforeSend: function() {
                        startLoader();
                    },
                    success: function(data) {
                        $("#course_data_show").html(data);
                    },
                    complete: function() {
                        stopLoader();
                    },
                    error: function(error) {
                        Toast.fire({
                            icon: 'error',
                            title: 'Something went wrong!'
                        })
                    }
                });
            });
        });
    </script>
@endpush
