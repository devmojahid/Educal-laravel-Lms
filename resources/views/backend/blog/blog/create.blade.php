@extends('backend.layouts.master')
@section('title', 'Create Blog')
@section('content')
    {{-- Content Header (Page header)  --}}
    <section class="content-header info-box p-3 rounded">
        <div class="container-fluid">
            <div class="row mb-2 mt-2">
                <div class="col-sm-6">
                    <h3 class="card-title">{{ __('dashboard.create') }} {{ __('dashboard.blog') }}</h3>
                </div>
                @can('blog.list')
                    <div class="col-sm-6">
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('blog.index') }}">
                                <i class="fas fa-plus"></i>
                                {{ __('dashboard.all') }} {{ __('dashboard.blog') }}
                            </a>
                        </div>
                    </div>
                @endcan
            </div>
        </div>
    </section>
    @include("frontend.layouts.message")
    <form id="BlogForm" action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="BlogTitle">{{ __('dashboard.title') }}</label>
                    <input type="text" name="title" class="form-control" id="BlogTitle" placeholder="Enter Title" value="{{ old('title') }}" required>
                </div>
                <div class="form-group">
                    <label for="BlogDesc">{{ __('dashboard.description') }}</label>
                    <textarea name="description" class="form-control" id="description">{{ old('description') }}</textarea>
                </div>
               
                <div class="form-group">
                    <label for="blogImage">{{ __('dashboard.image') }}</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="blogImage">
                            <label class="custom-file-label"
                                for="blogImage">{{ __('dashboard.choose_file') }}</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">{{ __('dashboard.upload') }}</span>
                        </div>
                    </div>
                </div>
                <img src="" id="blogImagePreview" height="50" width="50" id="mb-2"/>
                <div class="form-group">
                    <label>{{ __('dashboard.status') }}</label>
                    <select name="status" class="custom-select">
                        <option value="active">{{ __('dashboard.active') }}</option>
                        <option value="inactive">{{ __('dashboard.inactive') }}</option>
                    </select>
                </div>
                <div class="row">
                    {{-- Parent Category --}}
                    <div class="col-6">
                        <div class="form-group">
                            <label>Parent Category</label>
                            <select name="category_id" id="category_id" class="custom-select">
                                <option selected disabled>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- Child Category --}}
                    <div class="col-6">
                        <div class="form-group">
                            <label>Child Category</label>
                            <select name="subcategory_id" id="subcategory_id" class="custom-select">
                            </select>
                        </div>
                    </div>
                </div>


                {{-- Meta section  --}}
                <div>
                    <h3>Meta Section</h3>
                    <hr>
                </div>

                <div class="form-group">
                    <label for="meta_title">Meta Title</label>
                    <input type="text" name="meta_title" class="form-control" id="meta_title"
                        placeholder="Enter Meta Title">
                </div>

                <div class="form-group">
                    <label for="meta_description">Meta Description</label>
                    <textarea class="form-control" name="meta_description" rows="3" id="meta_description"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">{{ __('dashboard.submit') }}</button>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
    <script src="{{ asset('backend/assets/plugins/tinymce/tinymce.min.js') }}"></script>
    <script>
        "use strict"
        $(document).ready(function() {
            tinymce.init({
                selector: '#description'
            });
            // Image Preview
            $('#blogImagePreview').hide();
            $('#blogImage').on("change",function(e) {
                $('#blogImagePreview').show();
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#blogImagePreview').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
            $('#category_id').on('change', function() {
                var categoryId = $(this).val();
                if (categoryId) {
                    $.ajax({
                        url: '/admin/blog/subcategories/' + categoryId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#subcategory_id').empty();
                            $('#subcategory_id').append(
                                '<option value="">Select Subcategory</option>');
                            $.each(data, function(index, subcategory) {
                                $('#subcategory_id').append('<option value="' +
                                    subcategory.id + '">' + subcategory.title +
                                    '</option>');
                            });
                        }
                    });
                } else {
                    $('#subcategory_id').empty();
                    $('#subcategory_id').append('<option value="">Select Subcategory</option>');
                }
            });
        });
    </script>
@endpush
