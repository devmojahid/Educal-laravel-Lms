@extends('backend.layouts.master')
@section('title', 'Edit book')
@section('content')
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
    <form id="BlogForm" action="{{ route('admin.books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="BlogTitle">{{ __('dashboard.title') }}</label>
                    <input type="text" name="title" class="form-control" id="BlogTitle" placeholder="Enter Title"
                        value="{{ old('title', $book->title) }}" required>
                </div>
                <div class="form-group">
                    <label for="BlogDesc">{{ __('dashboard.description') }}</label>
                    <textarea name="description" class="form-control" id="description">{{ old('description', $book->description) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="blogImage">{{ __('dashboard.image') }}</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="blogImage"
                                accept="image/png, image/jpeg, image/jpg, image/svg, image/webp"
                                value="{{ old('image', $book->image) }}" @if ($book->image == null) required @endif>
                            <label class="custom-file-label" for="blogImage">{{ __('dashboard.choose_file') }}</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">{{ __('dashboard.upload') }}</span>
                        </div>
                    </div>
                </div>

                @if (isset($book->image))
                    <img src="@if ($book->image) {{ asset($book->image) }} @endif" id="blogImagePreview"
                        height="50" width="50" id="mb-2" value="{{ old('image', $book->image) }}"
                        alt="Blog Image" />
                @else
                    <img src="" id="blogImagePreview" height="50" width="50" id="mb-2"
                        value="{{ old('image') }}" alt="Blog Image" style="display: none" />
                @endif
                <div class="row">
                    {{-- Parent Category --}}
                    <div class="col-6">
                        <div class="form-group">
                            <label>Stock</label>
                            <input type="number" name="stock" class="form-control" id="stock"
                                placeholder="Enter stock ammount" value="{{ old('stock', $book->stock) }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>{{ __('dashboard.status') }}</label>
                            <select name="status" class="custom-select">
                                <option value="active"{{ old('status', $book->status) == 'active' ? 'selected' : '' }}>
                                    {{ __('dashboard.active') }}</option>
                                <option value="inactive"{{ old('status', $book->status) == 'inactive' ? 'selected' : '' }}>
                                    {{ __('dashboard.inactive') }}</option>
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
                                    <option value="{{ $category->id }}"
                                        {{ in_array($category->id, $book->categories->pluck('id')->toArray()) ? 'selected' : '' }}>
                                        {{ $category->title }}</option>
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
                                    <option value="{{ $genre->id }}"
                                        {{ in_array($genre->id, $book->genres->pluck('id')->toArray()) ? 'selected' : '' }}>
                                        {{ $genre->title }}</option>
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
                                placeholder="Enter Book price ammount" value="{{ old('price', $book->price) }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Book Discount Price</label>
                            <input type="number" name="discount_price" class="form-control" id="discount_price"
                                placeholder="Enter discount price"
                                value="{{ old('discount_price', $book->discount_price) }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="BlogDesc">Short Description</label>
                    <textarea name="short_description" class="form-control" id="short_description">{{ old('short_description', $book->short_description) }}</textarea>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Book Pages</label>
                            <input type="number" name="book_pages" class="form-control" id="book_pages"
                                placeholder="Enter Book Pages ammount"
                                value="{{ old('book_pages', $book->book_pages) }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Book Language</label>
                            <input type="text" name="language" class="form-control" id="language"
                                placeholder="Enter language" value="{{ old('language', $book->language) }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Product Type</label>
                            <select name="product_type" id="product_type" class="custom-select">
                                <option selected disabled>Select Product Type</option>
                                <option value="downloadable"
                                    {{ old('product_type', $book->product_type) == 'downloadable' ? 'selected' : '' }}>
                                    Downloadable</option>
                                <option value="physical"
                                    {{ old('product_type', $book->product_type) == 'physical' ? 'selected' : '' }}>Physical
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Upload Book (<small>Only for downloadable product</small>)</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="book_file" class="custom-file-input" id="bookFile"
                                        @if ($book->product_type != 'downloadable') disabled @endif
                                        value="{{ old('book_file', $book->book_file) }}" accept="pdf, doc, docx, txt">
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
                <div id="specifications">
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
                    @php
                        $specifications = json_decode($book->specifications);
                        $count = isset($specifications) ? count($specifications) : 0;
                    @endphp
                    @if (!empty($specifications) && is_array($specifications))
                        @foreach ($specifications as $key => $specification)
                            <div class="row">
                                <div class="col-5">
                                    <div class="form-group">
                                        <input type="text" name="specifications[{{ $key + 1 }}][key]"
                                            class="form-control" placeholder="Enter Specification Key"
                                            value="{{ $specification->key }}">
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="form-group">
                                        <input type="text" name="specifications[{{ $key + 1 }}][value]"
                                            class="form-control" placeholder="Enter Specification Value"
                                            value="{{ $specification->value }}">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <button type="button" class="btn btn-danger removeSpecification">Delete
                                        Specification</button>
                                </div>
                            </div>
                        @endforeach
                    @endif
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
                        placeholder="Enter Meta Title" value="{{ old('meta_title', $book->meta_title) }}">
                </div>

                <div class="form-group">
                    <label for="meta_description">Meta Description</label>
                    <textarea class="form-control" name="meta_description" rows="3" id="meta_description">{{ old('meta_description', $book->meta_description) }}</textarea>
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

            let sepcificationCount = @json($count) + 1 ?? 1;
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
