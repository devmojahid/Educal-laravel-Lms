@extends("backend.pages.instructor.index")
@section("instructor-content")

<div class="card card-widget">
    <div class="card-header">
        <div class="user-block">
            <h2>{{ __("dashboard.apply_bennar_item") }}</h2>
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
                    <th style="width: 10px">{{ __("dashboard.sn") }}</th>
                    <th>{{ __("dashboard.button_text") }}</th>
                    <th>{{ __("dashboard.image") }}</th>
                    <th>{{ __("dashboard.action") }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($instructorItem as $key=>$singleItem)
                <tr>
                    <td>{{ $key+=1 }}</td>
                    <td>{{ $singleItem['button_text'] }}</td>
                    <td>
                        @if (isset($singleItem['bg_image']) && $singleItem['bg_image'] != null)
                            <img width="40px" height="40px" src="{{ asset($singleItem['bg_image']) }}" class="img-fluid" height="200" width="200" />
                        @endif
                    </td>
                    <td class="d-flex items-center" style="border-bottom: none;">
                        <a href="{{ route('admin.pages.instructor.items.edit',$singleItem['id']) }}" class="btn tp-edit-btn mr-2">
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
                    <td colspan="4" class="text-center">{{ __("dashboard.no_data") }}</td>
                </tr>
                @endforelse

            </tbody>
        </table>
        <form action="{{ route('admin.pages.instructor.items.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <input type="hidden" name="updateId" value="{{ isset($item) ? $item['id'] : '' }}">

            <div class="form-group">
                <label for="instructor_btn_text">{{ __("dashboard.button_text") }}</label>
                <input name="button_text" id="instructor_btn_text" class="form-control" value="{{ old('button_text') ? old('button_text') : (isset($item) ? $item['button_text'] : '') }}" />
            </div>

            <div class="form-group">
                <div class="mb-3">
                    <div id="image_preview">
                        @if (isset($item) && $item['bg_image'] != null)
                            <img src="{{ asset($item['bg_image']) }}" class="img-fluid" style="height: 80px;width:80px" />
                        @endif
                    </div>
                    <label for="image" class="form-label">{{ __("dashboard.background_image") }}</label>
                    <input class="form-control" name="bg_image" type="file" id="image" accept="image/png,image/jpg,image/jpeg">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">{{ __("dashboard.submit") }}</button>
        </form>
    </div>
</div>

<div class="card card-widget">
    <div class="card-header">
        <div class="user-block">
            <h2>{{ __("dashboard.instractor_apply_section_header_area") }}</h2>
        </div>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body" style="display: block;">
        <form action="{{ route('admin.pages.instructor.update') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="form-group">
                <label for="InstructorTitle">{{ __("dashboard.title") }}</label>
                <input name="title" id="InstructorTitle" class="form-control"
                    value="{{ old('title') ? old('title') : (isset($instructor['title']) ? $instructor['title'] : '') }}" />
            </div>

            <div class="form-group">
                <label for="InstructorDesc">{{ __("dashboard.description") }}</label>
                <textarea name="description" id="InstructorDesc" class="form-control">{{ old('description') ? old('description') : (isset($instructor['description']) ? $instructor['description'] : '') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">{{ __("dashboard.submit") }}</button>
        </form>
    </div>
</div>

@endsection

<x-delete-item>
    <x-slot name='route'>
        {{ route('admin.pages.instructor.items.delete') }}
    </x-slot>
</x-delete-item>