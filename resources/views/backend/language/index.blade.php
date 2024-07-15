@extends('backend.layouts.master')
@section('title', 'Course Tag')
@include('backend.layouts.partial.data-table-style')

@section('content')
<section class="content-header info-box p-3 rounded">
    <div class="container-fluid">
        <div class="row mb-2 mt-2">
            <div class="col-sm-6">
                <h3 class="card-title">{{ __("dashboard.cetagory") }}</h3>
            </div>
            @can("course-tag-create")
                <div class="col-sm-6">
                    <div class="float-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createTagModal">
                            {{ __("dashboard.add_new") }} {{ __("dashboard.cetagory") }}
                        </button>
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
                                        <th>Icon</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tags as $key => $tag)
                                        <tr>
                                            <td>{{ $key += 1 }}</td>
                                            <td>{{ $tag->title }}</td>
                                            <td>
                                                {{-- svg image show  --}}
                                                <div class="svg_image">
                                                    {{ sanitizeInput($tag->svg) }}
                                                </div>
                                            </td>
                                            <td>{{ $tag->status }}</td>
                                            <td>
                                                @can("course-tag-edit")
                                                    @if($tag->user_id == Auth::user()->id || Auth::user()->usertype== "admin")
                                                        <a href="javascript:void(0)" type="button" class="btn btn-success edit_tag_form"
                                                            data-toggle="modal" data-target="#tageditModal"
                                                            data-id="{{ $tag->id }}" data-title="{{ $tag->title }}"
                            
                                                            data-description="{{ $tag->description }}"
                                                            data-svg="{{ $tag->svg }}">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    @endif
                                                @endcan
                                                @can("course-tag-delete")
                                                    @if($tag->user_id == Auth::user()->id || Auth::user()->usertype== "admin")
                                                        <a href="javascript:void(0)" data-tag_id="{{ $tag->id }}" id="delete"
                                                            class="btn btn-danger delete_tag">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    @endif
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
    {{-- Tag insert modal --}}
    <div class="modal fade" id="createTagModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="{{ route('course-tags.store') }}" id="tagForm"
                    method="POST">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Tag Create</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="errorMassage mb-3"></div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Tag Title</label>
                                <input type="text" name="title" class="form-control" id="title"
                                    placeholder="Enter Title" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Tag Description</label>
                                <textarea class="form-control" name="description" rows="3" id="description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="svg">Tag Icon</label>
                                <textarea class="form-control" name="svg" rows="3" id="svg"></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label>Tag Status</label>
                                <select name="status" id="status" class="custom-select">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" id="submitBtn" class="btn btn-primary">Create Tag</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Tag edit modal --}}
    <div class="modal fade" id="tageditModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="{{ route('course-tag.update') }}" id="editTagForm" enctype="multipart/form-data"
                    method="POST">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Tag Create</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="errorMassage mb-3"></div>
                        <div class="card-body">
                            <input type="hidden" name="id" id="up_id">
                            <div class="form-group">
                                <label for="title">Tag Title</label>
                                <input type="text" name="title" class="form-control" id="up_title"
                                    placeholder="Enter Title" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Tag Description</label>
                                <textarea class="form-control" name="description" rows="3" id="up_description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="svg">Tag Icon</label>
                                <textarea class="form-control" name="svg" rows="3" id="up_svg"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Tag Status</label>
                                <select name="status" id="up_status" class="custom-select">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>

                
                        </div>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" id="updateBtn" class="btn btn-primary">Update tag</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@include('backend.layouts.partial.data-table-script')
@push('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

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
            //Tag insert
            $(document).on('click', '#submitBtn', function(e) {
                e.preventDefault();
                let title = $('#title').val();
                let description = $('#description').val();
                let status = $('#status').val();
                let svg = $('#svg').val();
                $.ajax({
                    method: 'post',
                    url: "{{ route('course-tags.store') }}",
                    data: {
                        title,
                        description,
                        status,
                        svg
                    },
                    success: function(res) {
                        if (res.status == 'success') {
                            $('#tagForm')[0].reset();
                            $('#createTagModal').modal('hide');
                            $('.table').load(location.href + ' .table');
                            Toast.fire({
                                icon: 'success',
                                title: res.message
                            });
                        }
                    },
                    error: function(err) {
                        let error = err.responseJSON;
                        $.each(error.errors, function(index, value) {
                            $('.errorMassage').append('<span class="text-danger">' +
                                value + '<span>' + '<br>');
                        });
                    }
                });
            })
        });

        //product show in edit form
        $(document).on('click', '.edit_tag_form', function() {
            let id = $(this).data('id');
            let title = $(this).data('title');
            let description = $(this).data('description');
            let status = $(this).data('status');
            let svg = $(this).data('svg');

            $('#up_id').val(id);
            $('#up_title').val(title);
            $('#up_description').val(description);
            $('#up_status').val(status);
            $('#up_svg').val(svg);
        })

        //update product
        $(document).on('click', '#updateBtn', function(e) {
            e.preventDefault();
            let id = $('#up_id').val();
            let title = $('#up_title').val();
            let description = $('#up_description').val();
            let status = $('#up_status').val();
            let svg = $('#up_svg').val();
            $.ajax({
                method: 'post',
                url: "{{ route('course-tag.update') }}",
                data: {
                    id,
                    title,
                    description,
                    status,
                    svg,
                },
                success: function(res) {
                    if (res.status == 'success') {
                        $('#editTagForm')[0].reset();
                        $('#tageditModal').modal('hide');
                        $('.table').load(location.href + ' .table');
                        Toast.fire({
                            icon: 'success',
                            title: res.message
                        });
                    }
                },
                error: function(err) {
                    let error = err.responseJSON;
                    $.each(error.errors, function(index, value) {
                        $('.errorMassage').append('<span class="text-danger">' + value +
                            '<span>' + '<br>');
                    });
                }
            });
        })

        //delete product
        $(document).on('click', '.delete_tag', function(e) {
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
                let tagId = $(this).data('tag_id');
                $.ajax({
                    url: "{{ route('delete.course.tag') }}",
                    method: 'post',
                    data: {
                        id: tagId
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
    </script>
@endpush
