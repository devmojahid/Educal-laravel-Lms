@extends("backend.layouts.master")
@section("title","courses")
@include("backend.layouts.partial.data-table-style")

@section("content")
  <section class="content-header info-box p-3 rounded">
    <div class="container-fluid">
        <div class="row mb-2 mt-2">
            <div class="col-sm-6">
                <h3 class="card-title">{{ __("dashboard.course") }}</h3>
            </div>
            @can('course.create')
              <div class="col-sm-6">
                <div class="float-right">
                  <a class="btn btn-primary" href="{{ route("course.create") }}">
                    <i class="fas fa-plus"></i>
                     {{ __("dashboard.add_new") }} {{ __("dashboard.course") }}
                  </a>
                </div>
             </div>
          @endcan

        </div>
    </div>
  </section>

    {{--  Main content  --}}
  
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <!-- /.card-header -->
                <div class="card-body table-responsive p-3">
                  <table id="datatable" class="table table-bordered table-hover text-nowrap">
                    <thead>
                    <tr>
                      <th>SL.</th>
                      <th>Title</th>
                      <th>status</th>
                      <th>Category</th>
                      <th>Sub Category</th>
                      <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($courses as $key=>$course)
                      <tr>
                        <td>{{ $key+=1 }}</td>
                        <td>{{ $course->title }}</td>
                        <td>{{ $course->status }}</td>
                        <td>{{ optional($course->category)->title }}</td>
                        <td>{{ optional($course->subcategory)->title }}</td>
                        <td class="d-flex items-center">  
                          @can("course-approve")
                            <a href="{{ route('admin.course.approved',$course->id) }}" class="btn btn-success mr-2">
                              {{ __("dashboard.approve") }}
                            </a>
                          @endcan
                          @can("course-reject")
                            <a href="{{ route('admin.course.rejected',$course->id) }}" class="btn edu-btn-header-red mr-2">
                              {{ __("dashboard.reject") }}
                            </a>
                          @endcan
                          @can("course-delete")
                            <form action="{{ route('course.destroy',$course->id) }}" method="POST">
                              @csrf
                              @method("DELETE")
                              <button type="submit" class="btn btn-danger delete_course" data-course_id="{{ $course->id }}">
                                <i class="fas fa-trash"></i>
                              </button>
                            </form>
                          @endcan
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
      </section>
@endsection

@include("backend.layouts.partial.data-table-script")

