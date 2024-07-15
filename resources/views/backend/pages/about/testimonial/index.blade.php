@extends('backend.pages.about.index')
@section('home-content')
    <div class="card card-widget">
        <div class="card-header">
            <div class="user-block">
                <h2>Testimonial Items</h2>
            </div>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        @include("frontend.layouts.message")
        <div class="card-body" style="display: block">
            <table class="table table-bordered my-5 py-3 custom-page-table">
                <thead>
                    <tr>
                        <th style="width: 10px">SN.</th>
                        <th>Client Name</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($testimonialItem as $key=>$singleItem)
                    <tr>
                        <td>{{ $key+=1 }}</td>
                        <td>{{ $singleItem['name'] }}</td>
                        <td>{{ $singleItem['description'] }}</td>
                        <td class="d-flex items-center" style="border-bottom: none;">
                            <a href="{{ route('admin.pages.about.testimonial.item.edit',$singleItem['id']) }}" class="btn tp-edit-btn mr-2">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                </span>
                            </a>
                            <a href="javascript:void(0)" data-item_id="{{ $singleItem['id'] }}" id="delete"
                                class="btn tp-delet-btn delete_item">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                </span>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">No Data Found</td>
                    </tr>
                    @endforelse

                </tbody>
            </table>

            <form action="{{ route('admin.pages.about.testimonial.item.store') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <input type="hidden" name="updateId" value="{{ isset($item) ? $item['id'] : '' }}">
                
                <div class="form-group">
                    <label for="description">Testimonial Info</label>
                    <textarea name="description" id="description" class="form-control">{{ old('description') ? old('description') : (isset($item) ? $item['description'] : '') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="name">Client Name</label>
                    <input name="name" id="name" class="form-control" value="{{ old('name') ? old('name') : (isset($item) ? $item['name'] : '') }}" />
                </div>
                
                <div class="form-group">
                    <label for="designation">Client designation</label>
                    <input name="designation" id="designation" class="form-control" value="{{ old('designation') ? old('designation') : (isset($item) ? $item['designation'] : '') }}" />
                </div>

                <div class="form-group">
                    <div class="mb-3">
                        <div id="image_preview">
                            @if (isset($item) && $item['image'] != null)
                                <img src="{{ asset($item['image']) }}" class="img-fluid" height="200" width="200" />
                            @endif
                        </div>
                        <label for="image" class="form-label">Client Image</label>
                        <input class="form-control" name="image" type="file" id="image">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <div class="card card-widget">
        <div class="card-header">
            <div class="user-block">
                <h2>Testimonial Right Section</h2>
            </div>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body" style="display: block;">
            <form action="{{ route('admin.pages.about.testimonial.store') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="form-group">
                    <label for="testimonialTitle">Title</label>
                    <input name="title" id="testimonialTitle" class="form-control"
                        value="{{ old('title') ? old('title') : (isset($testimonial['title']) ? $testimonial['title'] : '') }}" />
                </div>

                <div class="form-group">
                    <label for="testimonialVideo">Video Url</label>
                    <input name="videoUrl" id="testimonialVideo" class="form-control"
                        value="{{ old('videoUrl') ? old('videoUrl') : (isset($testimonial['videoUrl']) ? $testimonial['videoUrl'] : '') }}" />
                </div>

                <div class="form-group">
                    <label for="testimonialVideoTitle">Section Video Title</label>
                    <input name="videoTitle" id="testimonialVideoTitle" class="form-control"
                        value="{{ old('videoTitle') ? old('videoTitle') : (isset($testimonial['videoTitle']) ? $testimonial['videoTitle'] : '') }}" />
                </div>

                <div class="form-group">
                    <label for="testimonialDesc">Section Video Description</label>
                    <input name="videoDesc" id="testimonialDesc" class="form-control"
                        value="{{ old('videoDesc') ? old('videoDesc') : (isset($testimonial['videoDesc']) ? $testimonial['videoDesc'] : '') }}" />
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection

<x-delete-item>
    <x-slot name='route'>
        {{ route('admin.pages.about.testimonial.item.delete') }}
    </x-slot>
</x-delete-item>
