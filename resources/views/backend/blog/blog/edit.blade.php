@extends('backend.layouts.master')
@section('title', 'Edit Blog')
@section('content')
    {{-- Content Header (Page header)  --}}
    <section class="content-header info-box p-3 rounded">
        <div class="container-fluid">
            <div class="row mb-2 mt-2">
                <div class="col-sm-6">
                    <h3 class="card-title">{{ __('dashboard.edit') }} {{ __('dashboard.blog') }}</h3>
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
    @include('frontend.layouts.message')
    <form id="BlogForm" action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="BlogTitle">Blog Title</label>
                    <input type="text" name="title" value="{{ $blog->title }}" class="form-control" id="BlogTitle"
                        placeholder="Enter Title" required>
                </div>
                <div class="form-group">
                    <label for="BlogDesc">Blog Description</label>
                    <textarea name="description" id="description" class="form-control">{{ $blog->description }}</textarea>
                </div>
                
                <div class="form-group">
                    <label for="blogImage">Blog Image</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="blogImage">
                            <label class="custom-file-label" for="blogImage">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                    </div>
                </div>
                @if ($blog->image != null)
                    <img src="{{ asset($blog->image) }}" id="blogImageUpdate" height="50" width="50" class="mb-2" />
                @endif
                <img src="" id="blogImagePreview" height="50" width="50" class="mb-2" />
                <div class="form-group">
                    <label>Blog Status</label>
                    <select name="status" class="custom-select">
                        <option @if ($blog->status == 'active') selected @endif value="active">Active</option>
                        <option @if ($blog->status == 'inactive') selected @endif value="inactive">Inactive</option>
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
                                    <option @if ($blog->category_id == $category->id) selected @endif value="{{ $category->id }}">
                                        {{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- Child Category --}}
                    @php
                        $subcategories = \App\Models\BlogSubCategory::where('blog_category_id', $blog->category_id)->get();
                    @endphp
                    <div class="col-6">
                        <div class="form-group">
                            <label>Child Category</label>
                            <select name="subcategory_id" id="subcategory_id" class="custom-select">
                                <option selected disabled>Select Subcategory</option>
                                @foreach ($subcategories as $subcategory)
                                    <option @if ($blog->subcategory_id == $subcategory->id) selected @endif
                                        value="{{ $subcategory->id }}">
                                        {{ $subcategory->title }}</option>
                                @endforeach
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
                    <input type="text" value="{{ $blog->meta_title }}" name="meta_title" class="form-control"
                        id="meta_title" placeholder="Enter Meta Title">
                </div>

                <div class="form-group">
                    <label for="meta_description">Meta Description</label>
                    <textarea class="form-control" name="meta_description" rows="3" id="meta_description">{{ $blog->meta_description }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
    <script src="{{ asset('backend/assets/plugins/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/tagify/tagify.polyfills.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/tagify/yaireo_tagify.min.js') }}"></script>
    <script>
        "use strict";
        $(document).ready(function() {
            tinymce.init({
                selector: '#description'
            });
            // Image Preview
            $('#blogImagePreview').hide();
            $('#blogImage').on("change", function(e) {
                $('#blogImageUpdate').hide();
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
