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
<form action="{{ route("admin.smtp.setting.update") }}" method="POST">
    @csrf
   <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="mail_mailer">{{ __("dashboard.mail_mailer") }}</label>
                        <input type="text" name="mail_mailer" class="form-control" id="mail_mailer" value="{{env('MAIL_MAILER') }}" readonly required>
                        @error('mail_mailer')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="mail_host">{{ __("dashboard.mail_host") }}</label>
                        <input type="text" name="mail_host" class="form-control" id="mail_host" value="{{env('MAIL_HOST') }}" required>
                        @error('mail_host')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="mail_port">{{ __("dashboard.mail_port") }}</label>
                        <input type="text" name="mail_port" class="form-control" id="mail_port" value="{{env('MAIL_PORT') }}" required>
                        @error('mail_port')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="mail_username">{{ __("dashboard.mail_username") }}</label>
                        <input type="text" name="mail_username" class="form-control" id="mail_username" value="{{env('MAIL_USERNAME') }}" required>
                        @error('mail_username')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="mail_password">{{ __("dashboard.mail_password") }}</label>
                        <input type="text" name="mail_password" class="form-control" id="mail_password" value="{{env('MAIL_PASSWORD') }}" required>
                        @error('mail_password')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="mail_encryption">{{ __("dashboard.mail_encryption") }}</label>
                        <select name="mail_encryption" id="mail_encryption"  class="form-control">
                            <option @if (env('MAIL_ENCRYPTION') == 'tls') selected @endif value="tls">TLS</option>
                            <option @if (env('MAIL_ENCRYPTION') == 'ssl') selected @endif value="ssl">SSL</option>
                        </select>
                        @error('mail_encryption')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="mail_from_address">{{ __("dashboard.mail_from_address") }}</label>
                        <input type="text" name="mail_from_address" class="form-control" id="mail_from_address" value="{{env('MAIL_FROM_ADDRESS') }}" required>
                        @error('mail_from_address')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="mail_from_name">{{ __("dashboard.mail_from_name") }}</label>
                        <input type="text" name="mail_from_name" class="form-control" id="mail_from_name" value="{{env('MAIL_FROM_NAME') }}" required>
                        @error('mail_from_name')
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