@extends('backend.layouts.master')
@section('title', 'Sub Category')
@include('backend.layouts.partial.data-table-style')

@section('content')
<section class="content-header info-box p-3 rounded">
    <div class="container-fluid">
        <div class="row mb-2 mt-2">
            <div class="col-sm-6">
                <h3 class="card-title">{{ __("dashboard.subcetagory") }}</h3>
            </div>
            @can("blog-sub-category-create")    
                <div class="col-sm-6">
                    <div class="add-new-sub-cat float-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createSubCategoryModal">
                            {{ __("dashboard.add_new") }} {{ __("dashboard.subcetagory") }}
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
                                        <th>{{ __("dashboard.sn") }}</th>
                                        <th>{{ __("dashboard.name") }}</th>
                                        <th>{{ __("dashboard.icon") }}</th>
                                        <th>{{ __("dashboard.status") }}</th>
                                        <th>{{ __("dashboard.category_title") }}</th>
                                        <th>{{ __("dashboard.action") }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subcategories as $key => $subcategory)
                                        <tr>
                                            <td>{{ $key += 1 }}</td>
                                            <td>{{ $subcategory->title }}</td>
                                            <td>
                                                @isset($subcategory->svg)
                                                    <img src="{{ $subcategory->svg }}" alt="svg" style="width: 50px; height: 50px;">
                                                @endisset
                                            </td>
                                            <td>{{ $subcategory->status }}</td>
                                            <td>{{ $subcategory->blog_category->title }}</td>
                                            <td>
                                                @can("blog-sub-category-edit")
                                                    <a href="javascript:void(0)" type="button" class="btn tp-edit-btn edit_subcategory_form"
                                                        data-toggle="modal" data-target="#subcategoryeditModal"
                                                        data-id="{{ $subcategory->id }}" data-title="{{ $subcategory->title }}"
                                                        data-status="{{ $subcategory->status }}"
                                                        data-description="{{ $subcategory->description }}"
                                                        data-meta_title="{{ $subcategory->meta_title }}"
                                                        data-meta_description="{{ $subcategory->meta_description }}"
                                                        data-svg="{{ $subcategory->svg }}"
                                                        data-blog_category_id="{{ $subcategory->blog_category->id}}" >
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                                        </span>
                                                    </a>
                                                @endcan
                                                @can("blog-sub-category-delete")   
                                                    <a href="javascript:void(0)" data-subcategory_id="{{ $subcategory->id }}"
                                                        class="btn tp-delet-btn delete_category">
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                        </span>
                                                    </a>
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
    {{-- Sub Category insert modal --}}
    <div class="modal fade" id="createSubCategoryModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="{{ route('blog-sub-categories.store') }}" id="subCategoryForm" enctype="multipart/form-data"
                    method="POST">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">{{ __("dashboard.sub_category_create") }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="errorMassage mb-3"></div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">{{ __("dashboard.title") }}</label>
                                <input type="text" name="title" class="form-control" id="title"
                                    placeholder="Enter Title" required>
                            </div>
                            <div class="form-group">
                                <label for="description">{{ __("dashboard.description") }}</label>
                                <textarea class="form-control" name="description" rows="3" id="description"></textarea>
                            </div>
                           
                            <div class="form-group">
                                <label for="svg">{{ __("dashboard.icon") }}</label>
                                <input type="file" class="form-control" accept="image/png, image/jpeg, image/jpg, image/svg+xml" name="svg" id="svg" />
                            </div>
                            
                            <div>
                                <img src="" alt="svg" class="svg_preview" style="width: 50px; height: 50px;display:none">
                            </div>
                            <div class="form-group">
                                <label>{{ __("dashboard.status") }}</label>
                                <select name="status" id="status" class="custom-select">
                                    <option value="active">{{ __("dashboard.active") }}</option>
                                    <option value="inactive">{{ __("dashboard.inactive") }}</option>
                                </select>
                            </div>

                            {{-- select Sub category  --}}
                            
                            <div class="form-group">
                                <label>Sub Category Select</label>
                                <select name="blog_category_id" id="blog_category_id" class="custom-select">
                                    <option disabled selected>Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            {{-- Meta section  --}}
                            <div>
                                <h3>{{ __("dashboard.meta_section") }}</h3>
                                <hr>
                            </div>

                            <div class="form-group">
                                <label for="meta_title">{{ __("dashboard.meta_title") }}</label>
                                <input type="text" name="meta_title" class="form-control" id="meta_title"
                                    placeholder="Enter Meta Title">
                            </div>

                            <div class="form-group">
                                <label for="meta_description">{{ __("dashboard.meta_description") }}</label>
                                <textarea class="form-control" name="meta_description" rows="3" id="meta_description"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{ __("dashboard.close") }}</button>
                        <button type="submit" id="submitBtn" class="btn btn-primary">{{ __("dashboard.sub_category_create") }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- category edit modal --}}
    <div class="modal fade" id="subcategoryeditModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="{{ route('blog-sub-categories.update.without.resource') }}" id="EditcategoryForm" enctype="multipart/form-data"
                    method="POST">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">{{ __("dashboard.sub_category_edit") }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="errorMassage mb-3"></div>
                        <div class="card-body">
                            <input type="hidden" name="id" id="up_id">
                            <div class="form-group">
                                <label for="title">{{ __("dashboard.title") }}</label>
                                <input type="text" name="title" class="form-control" id="up_title"
                                    placeholder="Enter Title" required>
                            </div>
                            <div class="form-group">
                                <label for="description">{{ __("dashboard.description") }}</label>
                                <textarea class="form-control" name="description" rows="3" id="up_description"></textarea>
                            </div>
                             
                            <div class="form-group">
                                <label for="svg">{{ __("dashboard.icon") }}</label>
                                <input type="file" class="form-control" accept="image/png, image/jpeg, image/jpg, image/svg+xml" name="svg" id="up_svg" />
                            </div>
                            <div>
                                <img src="" alt="svg" class="image_preview mb-2" style="width: 50px; height: 50px;display:none">
                            </div>
                            <div class="form-group">
                                <label>{{ __("dashboard.status") }}</label>
                                <select name="status" id="up_status" class="custom-select">
                                    <option value="active">{{ __("dashboard.active") }}</option>
                                    <option value="inactive">{{ __("dashboard.inactive") }}</option>
                                </select>
                            </div>

                            {{-- select Sub category  --}}
                            <div class="form-group">
                                <label>Sub Category Select</label>
                                <select name="blog_category_id" id="up_blog_category_id" class="custom-select">
                                    <option disabled selected>Select Category</option>
                                    @foreach ($categories as $category)
                                        <option data-category-id="{{ $category->id }}" value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Meta section  --}}
                            <div>
                                <h3>{{ __("dashboard.meta_section") }}</h3>
                                <hr>
                            </div>

                            <div class="form-group">
                                <label for="meta_title">{{ __("dashboard.meta_title") }}</label>
                                <input type="text" name="meta_title" class="form-control" id="up_meta_title"
                                    placeholder="Enter Meta Title">
                            </div>

                            <div class="form-group">
                                <label for="meta_description">{{ __("dashboard.meta_description") }}</label>
                                <textarea class="form-control" name="meta_description" rows="3" id="up_meta_description"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{ __("dashboard.close") }}</button>
                        <button type="submit" id="updateBtn" class="btn btn-primary">Update Sub Category</button>
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
            function handleSvgChange(selector, previewClass) {
                $(document).on('change', selector, function() {
                    $('.error_success_msg_container').html('');
                    if (this.files && this.files[0]) {
                        let img = document.querySelector(previewClass);
                        img.style.display = 'block';
                        img.onload = () => {
                            URL.revokeObjectURL(img.src);  // Free memory by releasing object URL
                        }
                        img.src = URL.createObjectURL(this.files[0]);
                    }
                });
            }   

            // Call the function for each SVG input
            handleSvgChange('#svg', '.svg_preview');
            handleSvgChange('#up_svg', '.image_preview');
            //category insert
            $(document).on('click', '#submitBtn', function(e) {
                e.preventDefault();
                let formdata = new FormData($('#subCategoryForm')[0]);
                $.ajax({
                    method: 'post',
                    url: "{{ route('blog-sub-categories.store') }}",
                    data: formdata,
                    contentType: false,
                    processData: false,
                    success: function(res) {
                        if (res.status == 'success') {
                            $('#subCategoryForm')[0].reset();
                            $('#createSubCategoryModal').modal('hide');
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
        $(document).on('click', '.edit_subcategory_form', function() {
            let id = $(this).data('id');
            let title = $(this).data('title');
            let description = $(this).data('description');
            let status = $(this).data('status');
            let svg = $(this).data('svg');
            let blog_category_id = $(this).data('blog_category_id');
            let meta_title = $(this).data('meta_title');
            let meta_description = $(this).data('meta_description');
            if (svg != null && svg != '') {
                $('.image_preview').show();
                $('.image_preview').attr('src', svg);
            }else{
                $('.image_preview').hide();
            }
            $('#up_id').val(id);
            $('#up_title').val(title);
            $('#up_description').val(description);
            $('#up_status').val(status);
            $('#up_blog_category_id').val(blog_category_id);
            $('#up_meta_title').val(meta_title);
            $('#up_meta_description').val(meta_description);
            $('#up_blog_category_id option[data-category-id="' + blog_category_id + '"]').attr('selected', 'selected');
        })

        //update product
        $(document).on('click', '#updateBtn', function(e) {
            e.preventDefault();
            let formdata = new FormData($('#EditcategoryForm')[0]);
            $.ajax({
                method: 'post',
                url: "{{ route('blog-sub-categories.update.without.resource') }}",
                data: formdata,
                contentType: false,
                processData: false,
                success: function(res) {
                    if (res.status == 'success') {
                        $('#EditcategoryForm')[0].reset();
                        $('#subcategoryeditModal').modal('hide');
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
        $(document).on('click', '.delete_category', function(e) {
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
                    let category_id = $(this).data('subcategory_id');
                    $.ajax({
                        url: "{{ route('delete.blog.subcategory') }}",
                        method: 'post',
                        data: {
                            id: category_id
                        },
                        success: function(res) {
                            if (res.status == 'success') {
                                $('.table').load(location.href + ' .table');
                                Toast.fire({
                                    icon: 'success',
                                    title: res.message
                                });
                            }
                        }
                    });
                }
            })
        })
    </script>
@endpush
