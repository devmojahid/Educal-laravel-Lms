@extends('backend.pages.home.index')
@section('home-content')
    @push('styles')
        <link rel="stylesheet" href="{{ asset('backend/assets/plugins/bs-toggle/bootstrap-toggle.min.css') }}">
    @endpush
    <h2 class="mb-4">Hero Section Area</h2>
    <form action="{{ route('admin.appearance.homepage.hero.update') }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="heroTitle">Title</label>
            <input name="title" id="heroTitle" class="form-control" value="{{ sanitizeInput($hero['hero_title'] ?? '') }}" />
        </div>
        <div class="form-group">
            <label for="heroSubTitle">Sub Title</label>
            <input name="subtitle" id="heroSubTitle" class="form-control" value="{{ sanitizeInput($hero['hero_subtitle'] ?? '') }}" />
        </div>
        <div class="form-group">
            <label for="heroDesc">Discription</label>
            <textarea name="discription" id="heroDesc" class="form-control" rows="5">{{ sanitizeInput($hero['hero_discription'] ?? '') }}</textarea>
        </div>

        <div class="form-group">
            <label for="heroButtonTitle">Button Title</label>
            <input type="text" value="{{ $hero['hero_button_text'] ?? '' }}" name="buttonTitle" id="heroButtonTitle"
                class="form-control" />
        </div>

        <div class="form-group">
            <label for="heroButtonUrl">Button Url</label>
            <input type="text" name="buttonUrl" value="{{ $hero['hero_button_link'] ?? '' }}" id="heroButtonUrl"
                placeholder="somthing.com" class="form-control" />
        </div>

        <div class="form-group">
            <label for="heroDesc">Shapes On/Off </label><br>
            <input type="checkbox" name="shapes"
                @isset($hero['hero_shapes']) @if ($hero['hero_shapes'] == 'on') checked @endif @endisset
                data-toggle="toggle">
        </div>
        <div class="form-group">
            <div class="mb-3">
                <div id="image1_image_preview">
                    @isset($hero['image1'])
                        <img src="{{ asset($hero['image1']) }}" class="img-fluid" height="200" width="200" />
                    @endisset
                </div>
                <label for="image1" class="form-label">Image 1</label>
                <input class="form-control" name="image1" type="file" id="image1">
            </div>
        </div>
        <div class="form-group">
            <div class="mb-3">
                <div id="image2_image_preview">
                    @isset($hero['image2'])
                        <img src="{{ asset($hero['image2']) }}" class="img-fluid" height="200" width="200" />
                    @endisset
                </div>
                <label for="image2" class="form-label">Image 2</label>
                <input class="form-control" name="image2" type="file" id="image2">
            </div>
        </div>

        <div class="form-group">
            <label for="heroInfoTitle">Hero Info Title</label>
            <input type="text" value="{{ $hero['hero_info_title'] ?? '' }}" name="heroInfoTitle" id="heroInfoTitle"
                class="form-control" />
        </div>

        <div class="form-group">
            <label for="heroInfoDesc">Hero Info Description</label>
            <textarea name="heroInfoDesc" id="heroInfoDesc" class="form-control" rows="2">{{ sanitizeInput($hero['hero_info_discription'] ?? '') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
@push('scripts')
    <script src="{{ asset('backend/assets/plugins/bs-toggle/bootstrap-toggle.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/tinymce/tinymce.min.js') }}"></script>
    <script>
        $(function() {
            $(document).ready(function() {
                tinymce.init({
                    selector: '#heroTitle1'
                });
            });

            $("#image1").on("change", function() {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $("#image1_image_preview").html(
                            `<img src="${e.target.result}" class="img-fluid" height="200" width="200" />`
                        );
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            });

            $("#image2").on("change", function() {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $("#image2_image_preview").html(
                            `<img src="${e.target.result}" class="img-fluid" height="200" width="200" />`
                        );
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });
    </script>
@endpush
