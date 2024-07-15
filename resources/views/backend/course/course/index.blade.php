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
            @can('course-create')
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
                      <th>Resources</th>
                      <th>Qize</th>
                      <th>Assignment</th>
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
                        <td>
                          <a href="{{ route("admin.course.getResourceData",$course->id) }}" class="btn btn-info mr-2">
                            <i class="fas fa-plus"></i> Resources
                          </a>
                        </td>
                        <td>
                          <a href="{{ route("admin.course.getQuizData",$course->id) }}" class="btn btn-success mr-2">
                            <i class="fas fa-plus"></i> Qize
                          </a>
                        </td>

                        <td>
                          <a href="{{ route("admin.course.getAssignmentData",$course->id) }}" class="btn btn-primary mr-2">
                            <i class="fas fa-plus"></i> Assignment
                          </a>
                        </td>
                        <td class="">  
                          @can("course-edit")
                            <a href="{{ route('course.edit',$course->id) }}" class="btn tp-edit-btn mr-2">
                              <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                              </span>
                            </a>
                          @endcan
                          @can("course-delete")
                              <button class="btn tp-delet-btn delete_item" data-item_id="{{ $course->id }}">
                                  <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                </span>
                              </button>
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

@push("scripts")
<script>
  "use strict";
  $(document).ready(function() {
    $(document).on('click', '.delete_item', function(e) {
        e.preventDefault();
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
                let itemId = $(this).data('item_id');
                $.ajax({
                    url: "{{ route('admin.course.delete') }}",
                    method: 'post',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        id: itemId
                    },
                    success: function(res) {
                        if (res.status == 'success') {
                            $('.table').load(location.href + ' .table');
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                        }
                    }
                });
            }
        })
    })
  });
</script>
@endpush

