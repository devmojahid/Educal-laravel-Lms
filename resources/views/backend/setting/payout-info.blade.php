@extends("backend.layouts.master")
@section("title",__("dashboard.payout_setting"))
@section("content")
<section class="content-header info-box p-3 rounded">
  <div class="container-fluid">
      <div class="row mb-2 mt-2">
          <div class="col-sm-6">
              <h3 class="card-title">{{ __("dashboard.payout_setting") }}</h3>
          </div>
      </div>
  </div>
</section>
<div class="card-body">
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8 mt-5">
        <div class="card card-primary card-outline">
          <div class="container">
            <div class="card-body box-profile">
        <form action="{{ route('admin.payout.setting.update') }}" method="post" enctype="multipart/form-data">
          @csrf
              <h5 class="mb-4">{{ __("dashboard.set_your_payout") }}</h5>
                <div class="form-group row">
                  <label for="SelectPayment" class="col-sm-2 col-form-label">{{ __("dashboard.select_payment") }}</label>
                  <div class="col-sm-10">
                    <div class="form-group">
                      <select class="custom-select" name="payment_method">
                        <option selected value="bank">{{ __("dashboard.bank_account") }}</option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="bankName" class="col-sm-2 col-form-label">{{ __("dashboard.bank_name") }}</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="bank_name" id="bankName" value="{{ $payout->bank_name ?? "" }}" placeholder="{{ __("dashboard.enter_bank_name") }}">
                    @error('bank_name')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                
                <div class="form-group row">
                  <label for="bankBranch" class="col-sm-2 col-form-label">{{ __("dashboard.bank_branch") }}</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="bank_branch" id="bankBranch" value="{{ $payout->bank_branch ?? "" }}" placeholder="{{ __("dashboard.enter_bank_branch") }}">
                    @error('bank_branch')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                
                <div class="form-group row">
                  <label for="accountNumber" class="col-sm-2 col-form-label">{{ __("dashboard.account_number") }}</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="account_number" id="accountNumber" value="{{ $payout->account_number ?? "" }}" placeholder="{{ __("dashboard.enter_account_number") }}">
                    @error('account_number')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                
                <div class="form-group row">
                  <label for="routingNumber" class="col-sm-2 col-form-label">{{ __("dashboard.routing_number") }}</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="routing_number" id="routingNumber" value="{{ $payout->routing_number ?? "" }}" placeholder="{{ __("dashboard.enter_routing_number") }}">
                    @error('routing_number')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>

                <div class="form-group row">
                  <label for="swiftCode" class="col-sm-2 col-form-label">{{ __("dashboard.swift_code") }}</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="swift_code" id="swiftCode" value="{{ $payout->swift_code ?? "" }}" placeholder="{{ __("dashboard.enter_swift_code") }}">
                    @error('swift_code')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>

                <div class="form-group row">
                  <label for="bankPasscode" class="col-sm-2 col-form-label">{{ __("dashboard.bank_passcode") }}</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" name="bank_passcode" id="bankPasscode" value="{{ $payout->bank_passcode ?? "" }}" placeholder="{{ __("dashboard.enter_bank_passcode") }}">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="accountHolderName" class="col-sm-2 col-form-label">{{ __("dashboard.account_holder_name") }}</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="account_holder_name" id="accountHolderName" value="{{ $payout->account_holder_name ?? "" }}" placeholder="{{ __("dashboard.enter_account_holder_name") }}">
                    @error('account_holder_name')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">{{ __("dashboard.submit") }}</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-2"></div>
    </div>
  </div>
  @endsection