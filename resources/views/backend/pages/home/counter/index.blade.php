@extends("backend.pages.home.index")
@section("home-content")
@push("styles")
<link rel="stylesheet" href="{{ asset("backend/assets/plugins/bs-toggle/bootstrap-toggle.min.css") }}">
@endpush
<h2 class="mb-4">Counter Section Area</h2>
<form action="{{ route("admin.pages.counter.update") }}" enctype="multipart/form-data" method="POST">
    @csrf
    @method("PUT")
    <div class="form-group">
      <label for="title">Title</label>
      <textarea name="title" id="title" class="form-control" rows="5">{{ $counters['title'] }}</textarea>
    </div>
    <div class="form-group">
      <label for="description">Discription</label>
      <textarea name="description" id="description" class="form-control" rows="5">{{ $counters['description'] }}</textarea>
    </div>

    <div class="form-group">
        @if(isset($counters['counter']['counter_amount']))
            @for ($i = 0; $i < count($counters['counter']['counter_amount']); $i++)
                @if ($i == 0) 
                    <div class="row align-items-center" id="appendData">
                        <div class="col-md-10">
                            {{-- counter icon  --}}
                            <div class="form-group">
                                <label for="counter_icon">counter icon</label>
                                <input type="file" 
                                    name="counter_icon[]" 
                                    id="counter_icon"
                                    class="form-control mr-3" 
                                    accept="image/png, image/jpeg, image/jpg, image/svg+xml"
                                >
                                @isset($counters['counter']['counter_icon'][$i])
                                    <div>
                                        <img src="{{ $counters['counter']['counter_icon'][$i] }}" alt="" class="img-fluid mt-3" height="100" width="100" />
                                    </div>
                                @endisset
                            </div>
                            {{-- counter amount  --}}
                            <div class="form-group">
                                <label for="counter_amount">counter amount</label>
                                <input type="text" name="counter_amount[]" id="counter_amount" class="form-control mr-3" value="{{ $counters['counter']['counter_amount'][$i] }}" />
                            </div>
                            {{-- counter desc  --}}
                            <div class="form-group">
                                <label for="counter_desc">counter desc</label>
                                <input type="text" name="counter_desc[]" id="counter_desc" class="form-control mr-3" value="{{ $counters['counter']['counter_desc'][$i] }}" />
                            </div>
                        </div>
                        <div class="col-md-2" >
                            <button type="button" style="width:100%" id="addCounter" class="btn btn-primary ">Add More</button>
                        </div>
                    </div>
                @else
                    <div class="row align-items-center" id="appendData">
                        <div class="col-md-10">
                            {{-- counter icon  --}}
                            <div class="form-group">
                                <label for="counter_icon">counter icon</label>
                                
                                <input type="file" 
                                name="counter_icon[]" 
                                id="counter_icon"
                                class="form-control mr-3" 
                                accept="image/png, image/jpeg, image/jpg, image/svg+xml"
                                >
                                @isset($counters['counter']['counter_icon'][$i])
                                    <div>
                                        <img src="{{ $counters['counter']['counter_icon'][$i] }}" alt="" class="img-fluid mt-3" height="100" width="100" />
                                    </div>
                                @endisset
                            </div>

                            {{-- counter amount  --}}
                            <div class="form-group">
                                <label for="counter_amount">counter amount</label>
                                <input type="text" name="counter_amount[]" id="counter_amount" class="form-control mr-3" value="{{ $counters['counter']['counter_amount'][$i] }}" />
                            </div>
                            {{-- counter desc  --}}
                            <div class="form-group">
                                <label for="counter_desc">counter desc</label>
                                <input type="text" name="counter_desc[]" id="counter_desc" class="form-control mr-3" value="{{ $counters['counter']['counter_desc'][$i] }}" />
                            </div>
                        </div>
                        <div class="col-md-2" >
                            <button type="button" class="btn btn-danger removeCounterOption">Remove</button>
                        </div>
                    </div>
                @endif
            @endfor
        @else
            <div class="row align-items-center" id="appendData">
                <div class="col-md-10">
                    {{-- counter icon  --}}
                    <div class="form-group">
                        <label for="counter_icon">counter icon</label>
                        <input type="file" 
                            name="counter_icon[]" 
                            id="counter_icon"
                            class="form-control mr-3" 
                            accept="image/png, image/jpeg, image/jpg, image/svg+xml"
                        >
                    </div>
                    {{-- counter amount  --}}
                    <div class="form-group">
                        <label for="counter_amount">counter amount</label>
                        <input type="text" name="counter_amount[]" id="counter_amount" class="form-control mr-3" />
                    </div>
                    {{-- counter desc  --}}
                    <div class="form-group">
                        <label for="counter_desc">counter desc</label>
                        <input type="text" name="counter_desc[]" id="counter_desc" class="form-control mr-3"/>
                    </div>
                </div>
                <div class="col-md-2" >
                    <button type="button" style="width:100%" id="addCounter" class="btn btn-primary ">Add More</button>
                </div>
            </div>
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
@push("scripts")
    <script src="{{ asset("backend/assets/plugins/bs-toggle/bootstrap-toggle.min.js") }}"></script>
    <script>
        $(function() {
            $("#image1").on('change',function() {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $("#image1_image_preview").html(`<img src="${e.target.result}" class="img-fluid" height="200" width="200" />`);
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            });

            // counter repeter
            $("#addCounter").on('click',function() {
                let html = `
                <div class="row align-items-center counter_section_area">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="counter_icon">counter icon</label>
                                <input type="file" 
                                    name="counter_icon[]" 
                                    id="counter_icon"
                                    class="form-control mr-3" 
                                    accept="image/png, image/jpeg, image/jpg, image/svg+xml"
                                >
                            </div>
                            <div class="form-group">
                                <label for="counter_amount">counter amount</label>
                                <input type="text" name="counter_amount[]" id="counter_amount" class="form-control mr-3" value="" />
                            </div>
                            <div class="form-group">
                                <label for="counter_desc">counter desc</label>
                                <input type="text" name="counter_desc[]" id="counter_desc" class="form-control mr-3" value="" />
                            </div>
                        </div>
                        <div class="col-md-2" >
                            <button type="button" class="btn btn-danger removeCounterOption">Remove</button>
                        </div>
                    </div>`;
                $("#appendData").parent().after(html);
            });

            $(document).on("click", ".removeCounterOption", function() {
                $(this).parent().parent().remove();
            });

        });

    </script>
@endpush