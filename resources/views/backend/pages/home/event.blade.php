@extends('backend.pages.home.index')
@section('home-content')
    <h2 class="mb-4">Event Section</h2>
    <form action="{{ route('admin.appearance.homepage.event.update') }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="eventTitle">Title</label>
            <textarea name="title" id="eventTitle" class="form-control" rows="5">
@isset($event['title'])
{{ sanitizeInput($event['title']) }}
@endisset
</textarea>
        </div>

        <div class="form-group">
            <label for="eventDesc">Discription</label>
            <textarea name="description" id="eventDesc" class="form-control" rows="5">
@isset($event['description'])
{{ sanitizeInput($event['description']) }}
@endisset
</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
