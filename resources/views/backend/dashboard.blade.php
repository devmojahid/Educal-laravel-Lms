@extends("backend.layouts.master")
@section("title","Dashboard")
@section("content")
     {{-- Content Header (Page header)  --}}
    <section class="content-header info-box p-3 rounded">
      <div class="container-fluid">
          <div class="row mb-2 mt-2">
              <div class="col-sm-6">
                  <h3 class="card-title">{{ __("dashboard.dashboard") }}</h3>
              </div>
          </div>
      </div>
    </section>
@if(auth()->user()->usertype=="admin")
    {{-- Main content  --}}
    <div class="row mt-4">
      {{-- total Student  --}}
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">{{ __("dashboard.total_student") }}</span>
            <span class="info-box-number">{{ $total_student ?? 0 }}</span>
          </div>
        </div>
      </div>

      {{-- total Instructor  --}}
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-graduate"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">{{ __("dashboard.total_instructor") }}</span>
            <span class="info-box-number">{{ $total_instructor ?? 0 }}</span>
          </div>
        </div>
      </div>

      {{-- total Courses  --}}
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-graduation-cap"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">{{ __("dashboard.all_course") }}</span>
            <span class="info-box-number">{{ $total_courses ?? 0 }}</span>
          </div>
        </div>
      </div>

      {{-- total Orders  --}}
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-success elevation-1"><i class="fas fa-dollar-sign"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">{{ __("dashboard.total_order_amount") }}</span>
            <span class="info-box-number">{{ $total_order_amount ?? 0 }}</span>
          </div>
        </div>
      </div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-blog"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">{{ __("dashboard.total_blog") }}</span>
              <span class="info-box-number">
                {{ $total_blogs ?? 0 }}
              </span>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-shipping-fast"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">{{ __("dashboard.total_order") }}</span>
              <span class="info-box-number">{{ $total_orders ?? 0 }}</span>
            </div>
          </div>
        </div>
        
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-calendar-week"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">{{ __("dashboard.total_events") }}</span>
              <span class="info-box-number">{{ $total_events ?? 0 }}</span>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="far fa-comments"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">{{ __("dashboard.total_comments") }}</span>
              <span class="info-box-number">{{ $total_comments ?? 0 }}</span>
            </div>
          </div>
        </div>
      </div>
      @else
      {{-- instructor area  --}}
      <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-shipping-fast"></i></i></span>
      
            <div class="info-box-content">
              <span class="info-box-text">{{ __("dashboard.total_order") }}</span>
              <span class="info-box-number">{{ $instructor_courses_count ?? 0 }}</span>
            </div>
          </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-dollar-sign"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">{{ __("dashboard.total_revinew") }}</span>
              <span class="info-box-number">{{ currency_symbol($instructor_courses_revenue) ?? 0 }}</span>
            </div>
          </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-hand-holding-usd"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">{{ __("dashboard.my_coupons") }}</span>
              <span class="info-box-number">{{ $coupons->count() ?? 0 }}</span>
            </div>
          </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-graduation-cap"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">{{ __("dashboard.my_course_categories") }}</span>
              <span class="info-box-number">{{ $userCourseCategories->count() ?? 0 }}</span>
            </div>
          </div>
        </div>
        
      </div>
      @endif
      <div class="row">
        {{-- my course  --}}
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">{{ __("dashboard.my_course") }}</h3> 
          </div>
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th style="width: 10px">{{ __("dashboard.sn") }}</th>
                  <th>{{ __("dashboard.title") }}</th>
                  <th>{{ __("dashboard.status") }}</th>
                  <th style="width: 40px">{{ __("dashboard.cetagory") }}</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($instructor_courses as $key=>$course)
                      <tr>
                        <td>{{ $key+=1 }}</td>
                        <td>{{ $course->title }}</td>
                        <td>{{ $course->status }}</td>
                        <td>{{ optional($course->category)->title }}</td>
                        <td>{{ optional($course->subcategory)->title }}</td>
                      </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
        {{-- my COurse Categories  --}}
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">{{ __("dashboard.my_course_categories") }}</h3> 
          </div>
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th style="width: 10px">{{ __("dashboard.sn") }}</th>
                  <th>{{ __("dashboard.title") }}</th>
                  <th>{{ __("dashboard.status") }}</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($userCourseCategories as $key=>$category)
                      <tr>
                        <td>{{ $key+=1 }}</td>
                        <td>{{ $category->title }}</td>
                        <td>{{ $category->status }}</td>
                      </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

        {{-- my Coupons  --}}
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">{{ __("dashboard.my_coupons") }}</h3> 
          </div>
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th style="width: 10px">{{ __("dashboard.sn") }}</th>
                  <th>{{ __("dashboard.code") }}</th>
                  <th>{{ __("dashboard.type") }}</th>
                  <th>{{ __("dashboard.count") }}</th>
                  <th>{{ __("dashboard.expired_at") }}</th>
                  <th>{{ __("dashboard.status") }}</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($coupons as $key=>$coupon)
                      <tr>
                        <td>{{ $key+=1 }}</td>
                        <td>{{ $coupon->code }}</td>
                        <td>{{ $coupon->type }}</td>
                        <td>{{ $coupon->count }}</td>
                        <td>{{ monthDayYear($coupon->expired_at) }}</td>
                        <td>{{ $coupon->status }}</td>
                      </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  @endsection