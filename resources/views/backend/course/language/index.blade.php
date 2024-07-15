@extends('backend.layouts.master')
@section('title', 'Course Language')
@include('backend.layouts.partial.data-table-style')
@section('content')
    <section class="content-header info-box p-3 rounded">
        <div class="container-fluid">
            <div class="row mb-2 mt-2">
                <div class="col-sm-6">
                    <h3 class="card-title">{{ __('dashboard.language') }}</h3>
                </div>
                @can('course-language-create')
                    <div class="col-sm-6">
                        <div class="float-right">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createlanguageModal">
                                {{ __('dashboard.add_new') }} {{ __('dashboard.language') }}
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
                                        <th>{{ __('dashboard.sn') }}</th>
                                        <th>{{ __('dashboard.name') }}</th>
                                        <th>{{ __('dashboard.image') }}</th>
                                        <th>{{ __('dashboard.status') }}</th>
                                        <th>{{ __('dashboard.action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($languages as $key => $language)
                                        <tr>
                                            <td>{{ $key += 1 }}</td>
                                            <td>{{ $language->title }}</td>
                                            <td>
                                                <img src="{{ asset($language->image) }}" alt="{{ $language->title }}"
                                                    class="svg_image">
                                            </td>
                                            <td>{{ $language->status }}</td>
                                            <td>
                                                @can('course-language-edit')
                                                    @if (Auth::user()->id == $language->user_id)
                                                        <a href="javascript:void(0)" type="button"
                                                            class="btn tp-edit-btn edit_language_form" data-toggle="modal"
                                                            data-target="#languageeditModal" data-id="{{ $language->id }}"
                                                            data-title="{{ $language->title }}"
                                                            data-status="{{ $language->status }}"
                                                            data-image="{{ $language->image }}">
                                                            <span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-edit">
                                                                    <path
                                                                        d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                    </path>
                                                                    <path
                                                                        d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                    </path>
                                                                </svg>
                                                            </span>
                                                        </a>
                                                    @endif
                                                @endcan
                                                @can('course-language-delete')
                                                    @if (Auth::user()->id == $language->user_id)
                                                        <a href="javascript:void(0)" data-language_id="{{ $language->id }}"
                                                            class="btn tp-delet-btn delete_language">
                                                            <span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-trash-2">
                                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                                    <path
                                                                        d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                    </path>
                                                                    <line x1="10" y1="11" x2="10"
                                                                        y2="17"></line>
                                                                    <line x1="14" y1="11" x2="14"
                                                                        y2="17"></line>
                                                                </svg>
                                                            </span>
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
    {{-- language insert modal --}}
    <div class="modal fade" id="createlanguageModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="{{ route('course-languages.store') }}" id="languageForm" enctype="multipart/form-data"
                    method="POST">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">{{ __('dashboard.language_create') }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="errorMassage mb-3"></div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">{{ __('dashboard.title') }}</label>
                                <input type="text" name="title" class="form-control" id="title"
                                    placeholder="Enter Title" required>
                            </div>
                            <div class="form-group">
                                <div class="col-6">
                                    <img id="image_preview" width="100" height="100">
                                </div>
                                <label for="Image">{{ __('dashboard.image') }}</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="Image">
                                        <label class="custom-file-label"
                                            for="exampleInputFile">{{ __('dashboard.choose_file') }}</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">{{ __('dashboard.upload') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>{{ __('dashboard.status') }}</label>
                                <select name="status" id="status" class="custom-select">
                                    <option value="active">{{ __('dashboard.active') }}</option>
                                    <option value="inactive">{{ __('dashboard.inactive') }}</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default"
                            data-dismiss="modal">{{ __('dashboard.close') }}</button>
                        <button type="submit" id="submitBtn"
                            class="btn btn-primary">{{ __('dashboard.save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- language edit modal --}}
    <div class="modal fade" id="languageeditModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="{{ route('course-categories.store') }}" id="EditlanguageForm"
                    enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">{{ __('dashboard.language_edit') }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="errorMassage mb-3"></div>
                        <div class="card-body">
                            <input type="hidden" name="id" id="up_id">
                            <div class="form-group">
                                <label for="title">{{ __('dashboard.title') }}</label>
                                <input type="text" name="title" class="form-control" id="up_title"
                                    placeholder="Enter Title" required>
                            </div>
                            <div class="form-group">
                                <div class="col-6">
                                    <img id="image_preview_2" width="100" height="100">
                                </div>
                                <label for="Image">{{ __('dashboard.image') }}</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="course_image" class="custom-file-input"
                                            id="Image_2">
                                        <label class="custom-file-label"
                                            for="exampleInputFile">{{ __('dashboard.choose_file') }}</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">{{ __('dashboard.upload') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>{{ __('dashboard.status') }}</label>
                                <select name="status" id="up_status" class="custom-select">
                                    <option value="active">{{ __('dashboard.active') }}</option>
                                    <option value="inactive">{{ __('dashboard.inactive') }}</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default"
                            data-dismiss="modal">{{ __('dashboard.close') }}</button>
                        <button type="submit" id="updateBtn"
                            class="btn btn-primary">{{ __('dashboard.save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@include('backend.layouts.partial.data-table-script')
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
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // image preview
            $("#image_preview").hide();
            $("#Image").on("change", function() {
                $("#image_preview").show();
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#image_preview").attr("src", e.target.result);
                }
                reader.readAsDataURL($(this)[0].files[0]);
            });
            // image preview Edit
            $("#image_preview_2").hide();
            $("#Image_2").on("change", function() {
                $("#image_preview_2").show();
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#image_preview_2").attr("src", e.target.result);
                }
                reader.readAsDataURL($(this)[0].files[0]);
            });

            //language insert with image upload by ajax
            $('#languageForm').on('submit', function(e) {
                e.preventDefault();
                let title = $('#title').val();
                let status = $('#status').val();
                let image = $('#Image').prop('files')[0];
                let formData = new FormData();
                formData.append('title', title);
                formData.append('status', status);
                formData.append('image', image);
                $.ajax({
                    type: "POST",
                    url: "{{ route('course-languages.store') }}",
                    data: formData,
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(res) {
                        if (res.status == 'success') {
                            $('#languageForm')[0].reset();
                            $('#createlanguageModal').modal('hide');
                            $('.table').load(location.href + ' .table');
                            Toast.fire({
                                icon: 'success',
                                title: res.message
                            });
                            $("#image_preview").hide();
                        }
                    },
                    error: function(err) {
                        let error = err.responseJSON;
                        $.each(error.errors, function(index, value) {
                            $('.errorMassage').append('<span class="text-danger">' +
                                value +
                                '<span>' + '<br>');
                        });
                    }
                });
            });
        });
        //product show in edit form
        $(document).on('click', '.edit_language_form', function() {
            let id = $(this).data('id');
            let title = $(this).data('title');
            let iamge = $(this).data('image');
            let status = $(this).data('status');

            $('#up_id').val(id);
            $('#up_title').val(title);
            if (iamge != null) {
                $("#image_preview_2").show();
                $('#image_preview_2').attr('src', iamge);
            } else {
                $("#image_preview_2").hide();
            }
            $('#up_status').val(status);
        })

        //update product

        $('#EditlanguageForm').on('submit', function(e) {
            e.preventDefault();
            let id = $('#up_id').val();
            let title = $('#up_title').val();
            let status = $('#up_status').val();
            let image = $('#Image_2').prop('files')[0];
            let formData = new FormData();
            formData.append('id', id);
            formData.append('title', title);
            formData.append('status', status);
            formData.append('image', image);
            $.ajax({
                type: "POST",
                url: "{{ route('course-languages.update.without.resource') }}",
                data: formData,
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(res) {
                    if (res.status == 'success') {
                        $('#EditlanguageForm')[0].reset();
                        $('#languageeditModal').modal('hide');
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
        });

        //delete product
        $(document).on('click', '.delete_language', function(e) {
            e.preventDefault();

            Swal.fire({
                title: '{{ __('dashboard.are_you_sure') }}',
                text: "{{ __('dashboard.once_deleted') }} {{ __('dashboard.language') }}",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '{{ __('dashboard.yes_delete_it') }}',
            }).then((result) => {
                if (result.isConfirmed) {
                    let language_id = $(this).data('language_id');
                    $.ajax({
                        url: "{{ route('delete.course.language') }}",
                        method: 'post',
                        data: {
                            id: language_id
                        },
                        success: function(res) {
                            if (res.status == 'success') {
                                $('.table').load(location.href + ' .table');
                                Swal.fire(
                                    '{{ __('dashboard.deleted') }}',
                                    '{{ __('dashboard.your_file_has_been_deleted') }}',
                                    '{{ __('dashboard.success') }}'
                                )
                            }
                        }
                    });
                }
            })
        })
    </script>
@endpush
