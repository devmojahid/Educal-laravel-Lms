@extends("backend.pages.about.index")
@section("home-content")
@push("styles")
<link rel="stylesheet" href="{{ asset("backend/assets/plugins/bs-toggle/bootstrap-toggle.min.css") }}">
@endpush
<h2 class="mb-4">Why Section Area</h2>
<form action="{{ route("admin.pages.why.update") }}" enctype="multipart/form-data" method="POST">
    @csrf
    @method("PUT")
    <div class="form-group">
      <label for="subTitle">Sub Title</label>
      <input name="sub_title" id="subTitle" class="form-control" value="{{ sanitizeInput($why['sub_title']) }}" />
    </div>
    <div class="form-group">
      <label for="title">Title</label>
      <textarea name="title" id="title" class="form-control" rows="5">{{ sanitizeInput($why['title']) }}</textarea>
    </div>
    <div class="form-group">
      <label for="description">Discription</label>
      <textarea name="description" id="description" class="form-control" rows="5">{{ sanitizeInput($why['description']) }}</textarea>
    </div>
    {{-- button 1  --}}
    <div class="form-group">
      <label for="whyButton_1">Button Title 1</label>
      <input type="text" value="{{ sanitizeInput($why['why_button_1']) }}" name="why_button_1" id="whyButton_1" class="form-control"/>
    </div>

    <div class="form-group">
      <label for="whyButtonUrl_1">Button Url 1</label>
      <input type="text" name="why_button_url_1" value="{{ sanitizeInput($why['why_button_url_1']) }}" id="whyButtonUrl_1" class="form-control"/>
    </div>

    {{-- button 2  --}}
    <div class="form-group">
      <label for="whyButton_2">Button Title 2</label>
      <input type="text" value="{{ sanitizeInput($why['why_button_2']) }}" name="why_button_2" id="whyButton_2" class="form-control"/>
    </div>

    <div class="form-group">
      <label for="whyButtonUrl_2">Button Url 2</label>
      <input type="text" name="why_button_url_2" value="{{ sanitizeInput($why['why_button_url_2']) }}" id="whyButtonUrl_2" class="form-control"/>
    </div>
    
    <div class="form-group">
        <div class="mb-3">
            <div id="image1_image_preview">
                @if (isset($why['image1']) && $why['image1'] != null)
                    <img src="{{ asset($why['image1']) }}" class="img-fluid" height="200" width="200" />
                @endif
            </div>
            <label for="image1" class="form-label">Image 1</label>
            <input class="form-control" name="image1" type="file" id="image1">
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
@push("scripts")
    <script src="{{ asset("backend/assets/plugins/bs-toggle/bootstrap-toggle.min.js") }}"></script>
    <script>
      (function ($) {
        "use strict";
        $(document).ready(function() {
            $("#image1").on('change',function() {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $("#image1_image_preview").html(`<img src="${e.target.result}" class="img-fluid" height="200" width="200" />`);
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });
      })(jQuery);

    </script>
@endpush