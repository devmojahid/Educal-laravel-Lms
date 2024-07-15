@extends("backend.layouts.master")
@section("title","Password Change")
@section("content")
<section class="content-header info-box p-3 rounded">
    <div class="container-fluid">
        <div class="row mb-2 mt-2">
            <div class="col-sm-6">
                <h3 class="card-title">{{ __("dashboard.change_password") }}</h3>
            </div>
        </div>
    </div>
</section>
@include("frontend.layouts.message")

<form action="{{ route("student.user.update.password.post",auth()->user()->id) }}" method="POST">
    @csrf
    @method("PUT")
   <div class="card">
        <div class="card-body">
            <div class="row my-3">
                <div class="col-12">
                    <div class="form-group">
                        <label for="old_password">{{ __("dashboard.old_password") }} <span class="text-danger">{{ __("dashboard.*") }}</span></label>
                        <input type="password" name="old_password" class="form-control" id="old_password" placeholder="{{ __("dashboard.old_password") }}" value="{{ old("old_password")}}" required>
                        @error('old_password')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-12">
                    <div class="form-group">
                        <label for="new_password">{{ __("dashboard.new_password") }} <span class="text-danger">{{ __("dashboard.*") }}</span></label>
                        <input type="password" name="password" class="form-control" id="new_password" placeholder="{{ __("dashboard.new_password") }}" required>
                        @error('new_password')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>            
            <div class="row my-3">
                <div class="col-12">
                    <div class="form-group">
                        <label for="confirm_password">{{ __("dashboard.confirm_password") }} <span class="text-danger">{{ __("dashboard.*") }}</span></label>
                        <input type="password" name="password_confirmation" class="form-control" id="confirm_password" placeholder="{{ __("dashboard.confirm_password") }}" required>
                        @error('confirm_password')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">{{ __("dashboard.submit") }}</button>
        </div>
   </div>
</form>
@endsection
