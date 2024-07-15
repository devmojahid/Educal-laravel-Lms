@extends("backend.layouts.master")
@section("title",__("dashboard.resource"))
@include("backend.layouts.partial.data-table-style")

@section("content")
  <section class="content-header info-box p-3 rounded">
    <div class="container-fluid">
        <div class="row mb-2 mt-2">
            <div class="col-sm-6">
                <h3 class="card-title">{{ __("dashboard.all_resource") }}</h3>
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
                <h3 class="card-title">Add Your Course Resourse</h3>
              </div>
              <form id="resourceForm" action="{{ route("admin.course.storeResourceData") }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="resourseTitle">Resourse Title</label>
                    <input type="text" class="form-control" name="title" id="resourseTitle" placeholder="Enter Your Resourse Title">
                  </div>

                  <div class="form-group">
                   <label for="resourseFile">Input Resourse File</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="file" id="resourseFile" accept=".pdf,.doc,.docx,.zip,.rar">
                      <label class="custom-file-label" for="resourseFile">Choose file</label>
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
                    <th>File</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($resources as $resource)
                    <tr>
                      <td>{{ $resource->title }}</td>
                      <td>
                        <a href="{{ $resource->file }}">{{ $resource->file }}</a>
                      </td>
                      <td class="d-flex items-center">  
                        <a href="javascript:void(0)" class="btn btn-success mr-2 edit_resource" 
                        data-resource_id="{{ $resource->id }}"
                        data-title="{{ $resource->title }}"
                        data-file="{{ $resource->file }}"
                        data-toggle="modal" data-target="#editResource">
                          <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route("admin.course.deleteResource") }}" method="POST">
                          @csrf
                          @method("DELETE")
                          <button type="submit" class="btn btn-danger delete_resource" data-resource_id="{{ $resource->id }}">
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
    <div class="modal fade" id="editResource" aria-modal="true" role="dialog">
      <div class="modal-dialog">
        <form id="resourceFormUpdate" action="{{ route("admin.course.updateResource") }}" method="POST" enctype="multipart/form-data">
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
                <label for="resourseTitle">Resourse Title</label>
                <input type="text" class="form-control" name="title" id="resourseUpTitle" placeholder="Enter Your Resourse Title">
              </div>

              <div class="form-group">
              <label for="resourseUpFile">Input Resourse File</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input imageup" name="file" id="resourseUpFile" value=""  accept=".pdf,.doc,.docx,.zip,.rar">
                  <label class="custom-file-label" for="resourseUpFile">Choose file</label>
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
@push("scripts")
  <script>
    (function ($) {
    "use strict";
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
    });
    $(document).ready(function(){
      $.ajaxSetup({
        headers:{
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
      });

      $("#resourceForm").on("submit",function(e){
        e.preventDefault();
        let title = $("#resourseTitle").val();
        let file = $("#resourseFile").val();
        let courseId = "{{ $courseId }}";
          if(title == "" || file == ""){
            Toast.fire({
                icon: 'error',
                title: "Please Fill All The Fields"
              });
            return false;
          }
        let formData = new FormData();
        formData.append("course_id",courseId);
        formData.append("title",title);
        formData.append("file",$("#resourseFile")[0].files[0]);
        $.ajax({
          url: $(this).attr("action"),
          method: $(this).attr("method"),
          data: formData,
          processData: false,
          contentType: false,
          success: function(response){
            if(response.status == "success"){
              
              $("#datatable tbody").prepend(`
                <tr>
                  <td>${response.data.title}</td>
                  <td>
                    <a href="${response.data.file}">${response.data.file}</a>  
                  </td>
                  <td class="d-flex items-center">  
                    <a href="javascript:void(0)" class="btn btn-success mr-2 edit_resource" 
                    data-resource_id="${response.data.id}"
                    data-title="${response.data.title}"
                    data-file="${response.data.file}"
                    data-toggle="modal"
                    data-target="#editResource
                    ">
                      <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route("admin.course.deleteResource") }}" method="POST">
                      @csrf
                      @method("DELETE")
                      <button type="submit" class="btn btn-danger delete_resource" data-resource_id="${response.data.id}">
                        <i class="fas fa-trash"></i>
                      </button>
                    </form>
                  </td>
                </tr>
              `);
              $("#resourceForm")[0].reset();
              $("#resourseFile").next(".custom-file-label").html("Choose file");
              Toast.fire({
                icon: 'success',
                title: response.message
              });
            }
          },
          error: function(error){
            Toast.fire({
              icon: 'error',
              title: error.responseJSON.message
            });
          }
        });
      });

      $(document).on("click",".edit_resource",function(e){
        e.preventDefault();
        let resourceId = $(this).data("resource_id");
        let upTitle = $(this).data("title");
        let upFile = $(this).data("file");
        $("#resourceFormUpdate #resourseUpTitle").val(upTitle);
       
      });

      $("#resourceFormUpdate").on("submit",function(e){
        e.preventDefault();
        let title = $("#resourseUpTitle").val();
        let file = $("#resourseUpFile").val();
        let resourceId = $(".edit_resource").data("resource_id");
        let courseId = "{{ $courseId }}";
          if(title == "" || file == ""){
            Toast.fire({
                icon: 'error',
                title: "Please Fill All The Fields"
              });
            return false;
          }
        let formData = new FormData();
        formData.append("course_id",courseId);
        formData.append("resource_id",resourceId);
        formData.append("title",title);
        formData.append("file",$("#resourseUpFile")[0].files[0]);
        $.ajax({
          url: $(this).attr("action"),
          method: $(this).attr("method"),
          data: formData,
          processData: false,
          contentType: false,
          success: function(response){
            if(response.status == "success"){
              Toast.fire({
                icon: 'success',
                title: response.message
              });
              $(`a.edit_resource[data-resource_id="${resourceId}"]`).data("title",response.data.title);
              $(`a.edit_resource[data-resource_id="${resourceId}"]`).data("file",response.data.file);
              $(`a.edit_resource[data-resource_id="${resourceId}"]`).closest("tr").find("td").eq(0).text(response.data.title);
              $(`a.edit_resource[data-resource_id="${resourceId}"]`).closest("tr").find("td").eq(1).html(`<a href="${response.data.file}">${response.data.file}</a>`);
              $("#editResource").modal("hide");
            }
          },
          error: function(error){
            Toast.fire({
              icon: 'error',
              title: error.responseJSON.message
            });
          }
        });
      });

      $(document).on("click",".delete_resource",function(e){
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
              let resourceId = $(this).data("resource_id");
              let courseId = "{{ $courseId }}";
              $.ajax({
                url: "{{ route('admin.course.deleteResource') }}",
                method: "POST",
                data: {
                  resource_id: resourceId,
                  course_id: courseId
                },
                success: function(response){
                  if(response.status == "success"){
                    Toast.fire({
                      icon: 'success',
                      title: response.message
                    });
                    $(`.delete_resource[data-resource_id="${resourceId}"]`).closest("tr").remove();
                  }
                },
                error: function(error){
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
  })(jQuery)
  </script>
@endpush
@include("backend.layouts.partial.data-table-script")

