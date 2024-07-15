@extends('backend.pages.home.index')
@section('home-content')
    <h2 class="mb-4">Price Section</h2>
    <form action="{{ route('admin.appearance.homepage.price.plan.update') }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="priceTitle">Title</label>
            <textarea name="title" id="priceTitle" class="form-control" rows="5">
                @isset($prices['title'])
                    {{ sanitizeInput($prices['title']) }}
                @endisset
            </textarea>
        </div>

        <div class="form-group">
            <label for="priceDesc">Discription</label>
            <textarea name="description" id="priceDesc" class="form-control" rows="5">
                @isset($prices['description'])
                    {{ sanitizeInput($prices['description']) }}
                @endisset
            </textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
