@extends("backend.pages.about.index")
@section("home-content")

<h2 class="mb-4">About Banner Section Area</h2>
    <!-- /.card-header -->
    <table class="table table-bordered my-5 py-3 custom-page-table">
        <thead>
        <tr>
            <th style="width: 10px">SN.</th>
            <th>Sub Title</th>
            <th>Ttile</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
            @forelse ($banner as $key=>$mainItem)
            <tr>
                <td>{{ $key+=1 }}</td>
                <td>{{ $mainItem['title'] }}</td>
                <td>{{ $mainItem['sub_title'] }}</td>
                <td class="d-flex items-center">
                    <a href="{{ route('admin.pages.about.banner.edit',$mainItem['id']) }}" class="btn tp-edit-btn mr-2">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                        </span>
                    </a>
                    
                    <a href="javascript:void(0)" data-item_id="{{ $mainItem['id'] }}" id="delete"
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

<form action="{{ route("admin.pages.about.banner.store") }}" enctype="multipart/form-data" method="POST">
    @csrf
    <input type="hidden" name="updateId" value="{{ isset($item) ? $item["id"] : "" }}">
    <div class="form-group">
      <label for="bannerSubTitle">Sub Title</label>
      <input name="subTitle" id="bannerSubTitle" class="form-control" rows="5" value="{{ old("subTitle") ? old("subTitle") : (isset($item) ? $item["sub_title"] : "") }}" />
    </div>

    <div class="form-group">
      <label for="heroTitle">Title</label>
      <input name="title" id="heroTitle" class="form-control" rows="5" value="{{ old("title") ? old("title") : (isset($item) ? $item["title"] : "") }}"/>
    </div>

    <div class="form-group">
      <label for="heroButtonTitle">Button Title</label>
      <input type="text" name="buttonTitle" id="heroButtonTitle" class="form-control" value="{{ old("buttonTitle") ? old("buttonTitle") : (isset($item) ? $item["button_title"] : "") }}" />
    </div>

    <div class="form-group">
      <label for="heroButtonUrl">Button Url</label>
      <input type="text" name="buttonUrl" value="{{ old("buttonUrl") ? old("buttonUrl") : (isset($item) ? $item["button_url"] : "") }}" id="heroButtonUrl" placeholder="somthing.com" class="form-control"/>
    </div>

    <div class="form-group">
        <div class="mb-3">
            <div id="sideImage_image_preview">
                @if (isset($item) && $item["side_image"] != null)
                    <img src="{{ asset($item["side_image"]) }}" class="img-fluid" height="200" width="200" />
                @endif
            </div>
            <label for="sideImage" class="form-label">Side Image</label>
            <input class="form-control" name="sideImage" type="file" id="sideImage">
        </div>
    </div>
    <div class="form-group">
        <div class="mb-3">
            <div id="bgImage_image_preview">
                @if (isset($item) && $item["bg_image"] != null)
                    <img src="{{ asset($item["bg_image"]) }}" class="img-fluid" height="200" width="200" />
                @endif
            </div>
            <label for="bgImage" class="form-label">Background Image</label>
            <input class="form-control" value="" name="bgImage" type="file" id="bgImage">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection

@push("scripts")
    <script>
        $(document).ready(function() {
           
            $("#sideImage").on("change",function() {
                $("#sideImage_image_preview").html("");
                var total_file = document.getElementById("sideImage").files.length;
                for (var i = 0; i < total_file; i++) {
                    $("#sideImage_image_preview").append("<img src='" + URL.createObjectURL(event.target.files[i]) + "' class='img-fluid' height='200' width='200' />");
                }
            });
            $("#bgImage").on("change",function() {
                $("#bgImage_image_preview").html("");
                var total_file = document.getElementById("bgImage").files.length;
                for (var i = 0; i < total_file; i++) {
                    $("#bgImage_image_preview").append("<img src='" + URL.createObjectURL(event.target.files[i]) + "' class='img-fluid' height='200' width='200' />");
                }
            });
        });
    </script>
@endpush

<x-delete-item>
    <x-slot name='route'>
        {{ route('admin.pages.about.banner.delete') }}
    </x-slot>
</x-delete-item>