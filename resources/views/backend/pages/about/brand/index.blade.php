@extends("backend.pages.about.index")
@section("home-content")

<h2 class="mb-4">Brand Section Area</h2>
    <!-- /.card-header -->
    <table class="table table-bordered my-5 py-3">
        <thead>
        <tr>
            <th style="width: 10px">SN.</th>
            <th>Brand Url</th>
            <th>Brand Logo</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
            @forelse ($brand as $key=>$mainItem)
            <tr>
                <td>{{ $key+=1 }}</td>
                <td>{{ $mainItem['url'] }}</td>
                <td>
                    @if ( isset($mainItem['logo']) )
                        <img src="{{ asset($mainItem['logo']) }}" alt="{{ $mainItem['url'] }}" width="80" height="80">
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.pages.homepage.brand.edit',$mainItem['id']) }}" class="btn tp-edit-btn mr-2">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                        </span>
                    </a>
                    
                    <a href="javascript:void(0)" data-item_id="{{ $mainItem['id'] }}" class="btn tp-delet-btn delete_item">
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

<form action="{{ route("admin.pages.homepage.brand.store") }}" enctype="multipart/form-data" method="POST">
    @csrf
    <input type="hidden" name="updateId" value="{{ isset($item) ? $item["id"] : "" }}">
    <div class="form-group">
        <div class="mb-3">
            <div id="sideImage_image_preview">
                @if (isset($item) && isset($item["logo"]))
                    <img src="{{ asset($item["logo"]) }}" class="img-fluid" height="200" width="200" />
                @endif
            </div>
            <label for="sideImage" class="form-label">Brand logo</label>
            <input class="form-control" name="logo" type="file" id="sideImage"/>
        </div>
    </div>

    <div class="form-group">
        <label for="brandUrl">Brand Url</label>
        <input type="text" name="url" id="brandUrl" class="form-control" rows="5" value="{{ old("url") ? old("url") : (isset($item) ? $item["url"] : "") }}"/>
        @error('url')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection

@push("scripts")
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
            $("button[type=submit]").on("click", function() {
                //image validation required
                $("#sideImage").on("change", function() {
                    if ($("#sideImage").val() == "") {
                        Toast.fire({
                            icon: 'error',
                            title: 'Please select a image'
                        });
                        return false;
                    }
                });
            });

            $("#sideImage").on('change',function() {
                $("#sideImage_image_preview").html("");
                var total_file = document.getElementById("sideImage").files.length;
                for (var i = 0; i < total_file; i++) {
                    $("#sideImage_image_preview").append("<img src='" + URL.createObjectURL(event.target.files[i]) + "' class='img-fluid' height='200' width='200' />");
                }
            });
        });
    </script>

<script>
    (function ($) {
    "use strict";
        $(document).ready(function() {
            $(document).on('click', '.delete_item', function(e) {
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
                        let itemId = $(this).data('item_id');
                        $.ajax({
                            url: "{{ route('admin.pages.homepage.brand.delete')}}",
                            method: 'post',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: {
                                id: itemId
                            },
                            success: function(res) {
                                if (res.status == 'success') {
                                    $('.table').load(location.href + ' .table');
                                    window.location.href = "{{ route('admin.pages.homepage.brand') }}";
                                }
                            }
                        });
                    }
                })
            })
        });
    })(jQuery);
    </script>
   
@endpush