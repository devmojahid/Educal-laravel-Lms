@extends('backend.layouts.master')
@section('title', 'Create Blog')
@section('content')
    {{-- Content Header (Page header)  --}}
    <section class="content-header info-box p-3 rounded">
        <div class="container-fluid">
            <div class="row mb-2 mt-2">
                <div class="col-sm-6">
                    <h3 class="card-title">{{ __('dashboard.create') }} {{ __('dashboard.book') }}</h3>
                </div>
                @if (auth()->user()->usertype == 'admin')
                    <div class="col-sm-6">
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.books.index') }}">
                                {{ __('dashboard.all') }} {{ __('dashboard.book') }}
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    @include('frontend.layouts.message')
    <form id="BlogForm" action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="BlogTitle">{{ __('dashboard.title') }}</label>
                    <input type="text" name="title" class="form-control" id="BlogTitle" placeholder="Enter Title"
                        value="{{ old('title') }}" required>
                </div>
                <div class="form-group">
                    <label for="BlogDesc">{{ __('dashboard.description') }}</label>
                    <textarea name="description" class="form-control" id="description">{{ old('description') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="blogImage">{{ __('dashboard.image') }}</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="blogImage"
                                accept="image/png, image/jpeg, image/jpg, image/svg, image/webp"
                                value="{{ old('image') }}" required>
                            <label class="custom-file-label" for="blogImage">{{ __('dashboard.choose_file') }}</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">{{ __('dashboard.upload') }}</span>
                        </div>
                    </div>
                </div>
                <img src="" id="blogImagePreview" height="50" width="50" id="mb-2" />
                <div class="row">
                    {{-- Parent Category --}}
                    <div class="col-6">
                        <div class="form-group">
                            <label>Stock</label>
                            <input type="number" name="stock" class="form-control" id="stock"
                                placeholder="Enter stock ammount" value="{{ old('stock') }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>{{ __('dashboard.status') }}</label>
                            <select name="status" class="custom-select">
                                <option value="active">{{ __('dashboard.active') }}</option>
                                <option value="inactive">{{ __('dashboard.inactive') }}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    {{-- Parent Category --}}
                    <div class="col-6">
                        <div class="form-group">
                            <label>Book Category</label>
                            <select name="category_id" id="category_id" class="custom-select">
                                <option selected disabled>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- Book Genre --}}
                    <div class="col-6">
                        <div class="form-group">
                            <label>Book Genre</label>
                            <select name="genre_id" id="genre_id" class="custom-select">
                                <option selected disabled>Select Genre</option>
                                @foreach ($genres as $genre)
                                    <option value="{{ $genre->id }}">{{ $genre->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Book Price</label>
                            <input type="number" name="price" class="form-control" id="price"
                                placeholder="Enter Book price ammount" value="{{ old('price') }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Book Discount Price</label>
                            <input type="number" name="discount_price" class="form-control" id="discount_price"
                                placeholder="Enter discount price" value="{{ old('discount_price') }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="BlogDesc">Short Description</label>
                    <textarea name="short_description" class="form-control" id="short_description">{{ old('short_description') }}</textarea>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Book Pages</label>
                            <input type="number" name="book_pages" class="form-control" id="book_pages"
                                placeholder="Enter Book Pages ammount" value="{{ old('book_pages') }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Book Language</label>
                            <input type="text" name="language" class="form-control" id="language"
                                placeholder="Enter language" value="{{ old('language') }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Product Type</label>
                            <select name="product_type" id="product_type" class="custom-select">
                                <option selected disabled>Select Product Type</option>
                                <option value="downloadable">Downloadable</option>
                                <option value="physical">Physical</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Upload Book (<small>Only for downloadable product</small>)</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="book_file" class="custom-file-input" id="bookFile"
                                        disabled value="{{ old('book_file') }}" accept="pdf, doc, docx, txt">
                                    >
                                    <label class="custom-file-label"
                                        for="bookFile">{{ __('dashboard.choose_file') }}</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">{{ __('dashboard.upload') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="specifications" class="mt-2">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Product Specifications</label>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <button type="button" class="btn btn-primary" id="addSpecification">Add
                                    Specification</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <div class="form-group mb-2">
                                <input type="text" name="specifications[0][key]" class="form-control"
                                    placeholder="Enter Specification Key" value="{{ old('specifications[0][key]') }}">
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group mb-2">
                                <input type="text" name="specifications[0][value]" class="form-control"
                                    placeholder="Enter Specification Value"
                                    value="{{ old('specifications[0][value]') }}">
                            </div>
                        </div>
                        <div class="col-2">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
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

            </div>
        </div>
        <button type="submit" class="btn btn-primary mb-4 mt-2">{{ __('dashboard.submit') }}</button>
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
            $('#blogImage').on("change", function(e) {
                $('#blogImagePreview').show();
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#blogImagePreview').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });

            // Product Type
            $('#product_type').on('change', function() {
                if ($(this).val() == 'downloadable') {
                    $('#bookFile').prop('disabled', false);
                } else {
                    $('#bookFile').prop('disabled', true);
                }
            });

            let sepcificationCount = 1;
            $('#addSpecification').on('click', function() {
                $('#specifications').append(`
                    <div class="row">
                        <div class="col-5">
                            <div class="form-group mb-2">
                                <input type="text" name="specifications[${sepcificationCount}][key]" class="form-control" placeholder="Enter Specification Key" value="{{ old('specifications[${sepcificationCount}][key]') }}">
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group
                            mb-2">
                                <input type="text" name="specifications[${sepcificationCount}][value]" class="form-control" placeholder="Enter Specification Value" value="{{ old('specifications[${sepcificationCount}][value]') }}">
                            </div>
                        </div>
                        <div class="col-2">
                            <button type="button" class="btn btn-danger removeSpecification">Remove Specification</button>
                        </div>
                    </div>
                `);
                sepcificationCount++;
            });

            $(document).on('click', '.removeSpecification', function() {
                $(this).closest('.row').remove();
            });


        });
    </script>
@endpush
