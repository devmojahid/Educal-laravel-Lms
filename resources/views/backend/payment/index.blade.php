@extends("backend.layouts.master")
@section("title",__("dashboard.smtp_setting"))
@section("content")
<section class="content-header info-box p-3 rounded">
  <div class="container-fluid">
      <div class="row mb-2 mt-2">
          <div class="col-sm-6">
              <h3 class="card-title">{{ __("dashboard.smtp_setting") }}</h3>
          </div>
      </div>
  </div>
</section>
<form action="{{ route("admin.payment.update") }}" method="POST">
    @csrf
   <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="STRIPE_PUBLISHABLE_KEY">{{ __("dashboard.stripe_publishable_key") }}</label>
                        <input type="text" name="STRIPE_PUBLISHABLE_KEY" class="form-control" id="STRIPE_PUBLISHABLE_KEY" value="{{env('STRIPE_PUBLISHABLE_KEY') }}" required>
                        @error('STRIPE_PUBLISHABLE_KEY')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="STRIPE_SECRET_KEY">{{ __("dashboard.stripe_secret_key") }}</label>
                        <input type="text" name="STRIPE_SECRET_KEY" class="form-control" id="STRIPE_SECRET_KEY" value="{{env('STRIPE_SECRET_KEY') }}" required>
                        @error('STRIPE_SECRET_KEY')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">{{ __("dashboard.update") }}</button>
        </div>
   </div>
</form>

@endsection