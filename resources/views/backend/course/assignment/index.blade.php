@extends('backend.layouts.master')
@section('title', __('dashboard.assignment'))
@include('backend.layouts.partial.data-table-style')

@section('content')
    <section class="content-header info-box p-3 rounded">
        <div class="container-fluid">
            <div class="row mb-2 mt-2">
                <div class="col-sm-6">
                    <h3 class="card-title">{{ __('dashboard.all_assignments') }}</h3>
                </div>
            </div>
        </div>
    </section>

    {{--  Main content  --}}

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Your Course Assignment</h3>
                        </div>
                        <form id="assignmentForm" action="{{ route('admin.course.storeAssignmentData') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="assignmentTitle">Assignment Title</label>
                                    <input type="text" class="form-control" name="title" id="assignmentTitle"
                                        placeholder="Enter Your Assignment Title">
                                </div>

                                <div class="form-group">
                                    <label for="assignmentFile">Input Assignment File</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="file" id="assignmentFile">
                                        <label class="custom-file-label" for="assignmentFile">Choose file</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="assignmentStartDate">Assignment Start Date</label>
                                        <input type="date" class="form-control" name="start_date"
                                            id="assignmentStartDate">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="assignmentEndDate">Assignment End Date</label>
                                        <input type="date" class="form-control" name="end_date" id="assignmentEndDate">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <label for="assignmentStatus">Assignment Status</label>
                                        <select name="status" id="assignmentStatus" class="form-control">
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="assignmentType">Assignment Marks</label>
                                        <input type="number" class="form-control" name="marks" id="assignmentMarks"
                                            placeholder="Enter Your Assignment Marks">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" id="submitResource">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-body table-responsive p-3">
                            <table id="datatable" class="table table-bordered table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($assignments as $assignment)
                                        <tr>
                                            <td>{{ $assignment->title }}</td>
                                            <td>
                                                {{ $assignment->start_date }}
                                            </td>
                                            <td>
                                                {{ $assignment->end_date }}
                                            </td>
                                            <td>
                                                @if ($assignment->status == 'active')
                                                    <span class="badge badge-success">{{ $assignment->status }}</span>
                                                @else
                                                    <span class="badge badge-danger">{{ $assignment->status }}</span>
                                                @endif
                                            </td>
                                            <td class="d-flex items-center">
                                                <a href="javascript:void(0)" class="btn btn-success mr-2 edit_assignment"
                                                    data-assignment_id="{{ $assignment->id }}"
                                                    data-title="{{ $assignment->title }}"
                                                    data-start_date="{{ $assignment->start_date }}"
                                                    data-end_date="{{ $assignment->end_date }}"
                                                    data-status="{{ $assignment->status }}"
                                                    data-marks="{{ $assignment->marks }}"
                                                    data-file="{{ $assignment->file }}" data-toggle="modal"
                                                    data-target="#editAssignment">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.course.deleteAssignment') }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger delete_assignment"
                                                        data-assignment_id="{{ $assignment->id }}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
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
    {{-- Edit Modal  --}}
    <div class="modal fade" id="editAssignment" aria-modal="true" role="dialog">
        <div class="modal-dialog">
            <form id="assignmentFormUpdate" action="{{ route('admin.course.updateAssignment') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Your Resource</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="up_assignmentTitle">Assignment Title</label>
                            <input type="text" class="form-control" name="title" id="up_assignmentTitle"
                                placeholder="Enter Your Assignment Title">
                        </div>

                        <div class="form-group">
                            <label for="up_assignmentFile">Input Assignment File</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="file" id="up_assignmentFile">
                                <label class="custom-file-label" for="up_assignmentFile">Choose file</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="up_assignmentStartDate">Assignment Start Date</label>
                                <input type="date" class="form-control" name="start_date"
                                    id="up_assignmentStartDate">
                            </div>
                            <div class="col-md-6">
                                <label for="up_assignmentEndDate">Assignment End Date</label>
                                <input type="date" class="form-control" name="end_date" id="up_assignmentEndDate">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label for="up_assignmentStatus">Assignment Status</label>
                                <select name="status" id="up_assignmentStatus" class="form-control">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="up_assignmentMarks">Assignment Marks</label>
                                <input type="number" class="form-control" name="marks" id="up_assignmentMarks"
                                    placeholder="Enter Your Assignment Marks">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
@push('scripts')
    <script>
        "use strict";
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                }
            });

            $("#assignmentForm").on("submit", function(e) {
                e.preventDefault();
                let title = $("#assignmentTitle").val();
                let file = $("#assignmentFile").val();
                let assignmentStartDate = $("#assignmentStartDate").val();
                let assignmentEndDate = $("#assignmentEndDate").val();
                let status = $("#assignmentStatus").val();
                let marks = $("#assignmentMarks").val();

                let courseId = "{{ $courseId }}";
                if (title == "" || assignmentStartDate == "" || assignmentEndDate == "" || status == "" ||
                    marks == "") {
                    Toast.fire({
                        icon: 'error',
                        title: "Please Fill All The Fields"
                    });
                    return false;
                }
                let formData = new FormData();
                formData.append("course_id", courseId);
                formData.append("title", title);
                formData.append("file", $("#assignmentFile")[0].files[0]);
                formData.append("start_date", assignmentStartDate);
                formData.append("end_date", assignmentEndDate);
                formData.append("status", status);
                formData.append("marks", marks);
                $.ajax({
                    url: $(this).attr("action"),
                    method: $(this).attr("method"),
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status == "success") {

                            $("#datatable tbody").prepend(`
                <tr>
                  <td>${response.data.title}</td>
                  <td>${response.data.start_date}</td>
                  <td>${response.data.end_date}</td>
                  <td>
                    <span class="badge badge-success">${response.data.status}</span>
                  </td>
                  <td class="d-flex items-center">  
                    <a href="javascript:void(0)" class="btn btn-success mr-2 edit_assignment" 
                    data-assignment_id="${response.data.id}"
                    data-title="${response.data.title}"
                    data-file="${response.data.file}"
                    data-start_date="${response.data.start_date}"
                    data-end_date="${response.data.end_date}"
                    data-status="${response.data.status}"
                    data-marks="${response.data.marks}"
                    data-toggle="modal" data-target="#editAssignment">
                      <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.course.deleteAssignment') }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger delete_assignment" data-assignment_id="${response.data.id}">
                        <i class="fas fa-trash"></i>
                      </button>
                    </form>
                  </td>
                </tr>
              `);
                            $("#assignmentForm")[0].reset();
                            $("#assignmentFile").next(".custom-file-label").html("Choose file");
                            location.reload();
                            Toast.fire({
                                icon: 'success',
                                title: response.message
                            });
                        }
                    },
                    error: function(error) {
                        Toast.fire({
                            icon: 'error',
                            title: error.responseJSON.message
                        });
                    }
                });
            });

            $(document).on("click", ".edit_assignment", function(e) {
                e.preventDefault();
                let assignmentId = $(this).data("assignment_id");
                let title = $(this).data("title");
                let file = $(this).data("file");
                let startDate = $(this).data("start_date");
                let endDate = $(this).data("end_date");
                let status = $(this).data("status");
                let marks = $(this).data("marks");
                $("#up_assignmentTitle").val(title);
                $("#up_assignmentStartDate").val(startDate);
                $("#up_assignmentEndDate").val(endDate);
                $("#up_assignmentStatus").val(status);
                $("#up_assignmentMarks").val(marks);
                $(".edit_assignment").data("assignment_id", assignmentId);
            });

            $("#assignmentFormUpdate").on("submit", function(e) {
                e.preventDefault();
                let title = $("#up_assignmentTitle").val();
                let file = $("#up_assignmentFile").val();
                let assignmentStartDate = $("#up_assignmentStartDate").val();
                let assignmentEndDate = $("#up_assignmentEndDate").val();
                let status = $("#up_assignmentStatus").val();
                let marks = $("#up_assignmentMarks").val();
                let courseId = "{{ $courseId }}";
                let assignmentId = $(".edit_assignment").data("assignment_id");
                if (title == "" || assignmentStartDate == "" || assignmentEndDate == "" || status == "" ||
                    marks == "") {
                    Toast.fire({
                        icon: 'error',
                        title: "Please Fill All The Fields"
                    });
                    return false;
                }
                let formData = new FormData();
                formData.append("assignment_id", assignmentId);
                formData.append("title", title);
                formData.append("file", $("#up_assignmentFile")[0].files[0]);
                formData.append("start_date", assignmentStartDate);
                formData.append("end_date", assignmentEndDate);
                formData.append("status", status);
                formData.append("marks", marks);
                formData.append("course_id", courseId);
                $.ajax({
                    url: $(this).attr("action"),
                    method: $(this).attr("method"),
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status == "success") {
                            Toast.fire({
                                icon: 'success',
                                title: response.message
                            });
                            //reload the page
                            $(`a.edit_assignment[data-assignment_id="${assignmentId}"]`).data(
                                "title", title);
                            $(`a.edit_assignment[data-assignment_id="${assignmentId}"]`).data(
                                "start_date", assignmentStartDate);
                            $(`a.edit_assignment[data-assignment_id="${assignmentId}"]`).data(
                                "end_date", assignmentEndDate);
                            $(`a.edit_assignment[data-assignment_id="${assignmentId}"]`).data(
                                "status", status);
                            $(`a.edit_assignment[data-assignment_id="${assignmentId}"]`).data(
                                "marks", marks);
                            $(`a.edit_assignment[data-assignment_id="${assignmentId}"]`).data(
                                "file", file);
                            location.reload();
                            $("#editAssignment").modal("hide");
                        }
                    },

                    error: function(error) {
                        Toast.fire({
                            icon: 'error',
                            title: error.responseJSON.message
                        });
                    }
                });
            });



            $(document).on("click", ".delete_assignment", function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to delete this assignment!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: "Cancel",
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        let assignmentId = $(this).data("assignment_id");
                        let courseId = "{{ $courseId }}";

                        $.ajax({
                            url: "{{ route('admin.course.deleteAssignment') }}",
                            method: "POST",
                            data: {
                                assignment_id: assignmentId,
                                course_id: courseId
                            },
                            success: function(response) {
                                if (response.status == "success") {
                                    Toast.fire({
                                        icon: 'success',
                                        title: response.message
                                    });
                                    $(`button.delete_assignment[data-assignment_id="${assignmentId}"]`)
                                        .closest("tr").remove();
                                }
                            },
                            error: function(error) {
                                Toast.fire({
                                    icon: 'error',
                                    title: error.responseJSON.message
                                });
                            }
                        });
                    }
                });
            });

        });
    </script>
@endpush
@include('backend.layouts.partial.data-table-script')
