@extends("backend.pages.home.index")
@section("home-content")
@push("styles")
<link rel="stylesheet" href="{{ asset("backend/assets/plugins/select2/css/select2.min.css") }}">
@endpush
<h2 class="mb-4">Categories Section Aria</h2>
<form action="{{ route("admin.appearance.homepage.category.update") }}" enctype="multipart/form-data" method="POST">
    @csrf
    @method("PUT")
    <div class="form-group">
        <label for="categoryTitle">Title</label>
        <textarea name="title" id="categoryTitle" class="form-control" rows="5">{{ sanitizeInput($categories['category_title']) }}</textarea>
    </div>

    <div class="form-group">
      <label for="categories">Sellect Categories For Display</label>
         <select class="form-control select2 select2-container select2-container--default select2-container--below" name="categories[]" id="categories" multiple>
            @foreach ($courseCatefories as $category)
                <option 
                @foreach ($categories['categories'] as $category_id)
                    @if ($category_id == $category->id)
                        selected
                    @endif
                @endforeach
                value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
@push("scripts")
    <script src="{{ asset("backend/assets/plugins/select2/js/select2.full.min.js") }}"></script>
    {{-- <script src="{{ asset('backend/assets/plugins/tinymce/tinymce.min.js') }}"></script> --}}
    <script>
        $(function() {
            $(document).ready(function() {
                tinymce.init({
                    selector: '#categoryTitle'
                });
            });
            $('.select2').select2()
        });

    </script>
@endpush