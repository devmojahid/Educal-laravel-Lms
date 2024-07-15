@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
    </div>
@endif

@if(Session::has('error'))
<div class="alert alert-danger">
   {{ Session::get('error') }}
</div>
@endif
@if(Session::has('success'))
<div class="alert alert-success">
   {{ Session::get('success') }}
</div>
@endif