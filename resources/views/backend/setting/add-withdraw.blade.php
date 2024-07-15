@extends("backend.layouts.master")
@section("title",__("dashboard.add_withdraw"))
@section("content")
<section class="content-header info-box p-3 rounded">
  <div class="container-fluid">
      <div class="row mb-2 mt-2">
          <div class="col-sm-6">
              <h3 class="card-title">{{ __("dashboard.add_withdraw") }}</h3>
          </div>
      </div>
  </div>
</section>
<form action="{{ route("admin.withdraw.store") }}" method="POST">
    @csrf
   <div class="card">
        <div class="card-body">
            <div class="form-group">
                <label for="amount">{{ __("dashboard.withdraw_amount") }}</label>
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <input type="hidden" name="courses_revenue" id="coursesRevenue" value="{{ $courses_revenue }}">
                <input type="number" name="amount" class="form-control" id="amount" required>
                @error('amount')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">{{ __("dashboard.withdraw_description") }}</label>
                <textarea type="text" name="description" class="form-control" id="description"></textarea>
                @error('description')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="callout callout-success">
                <p>{{ __("dashboard.note_you_will_receive") }}</p>
                <p>{{ __("dashboard.bank_name") }} {{ $payout->bank_name ?? __("dashboard.--") }}</p>
                <p>{{ __("dashboard.bank_branch") }} {{ $payout->bank_branch ?? __("dashboard.--") }}</p>
                <p>{{ __("dashboard.account_number") }} {{ $payout->account_number ?? __("dashboard.--") }}</p>
                <p>{{ __("dashboard.routing_number") }}{{ $payout->routing_number ?? __("dashboard.--") }}</p>
                <p>{{ __("dashboard.swift_code") }} {{ $payout->swift_code ?? __("dashboard.--") }}</p>
                <p>{{ __("dashboard.bank_passcode") }} {{ $payout->bank_passcode ?? __("dashboard.--") }}</p>
                <p>{{ __("dashboard.account_holder_name") }}{{ $payout->account_holder_name ?? __("dashboard.--") }}</p>
            </div>
            <div class="callout callout-success">
                @php
                    $admin = \App\Models\User::where("usertype",'admin')->first();
                @endphp
                <p>{{ __("dashboard.there_are_some_admin_info") }}</p>
                <p>{{ __("dashboard.admin_name") }} {{ $admin->fullname ?? " " }}</p>
                <p>{{ __("dashboard.admin_email") }} {{ $admin->email ?? " " }}</p>
                <p>{{ __("dashboard.admin_phone") }} {{ $admin->phone ?? " " }}</p>

            </div>
            <button type="submit" class="btn btn-primary withdraw">{{ __("dashboard.withdraw_request") }}</button>
        </div>
   </div>
</form>

@endsection

@push("scripts")
    <script>
        "use strict";
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });
        $(document).ready(function(){
            $("#amount").on("focusout",function(){
                var amount = $(this).val();
                var coursesRevenue = parseFloat($("#coursesRevenue").val());
                if(amount > coursesRevenue || amount <= 0 || amount == ""){
                    // add is-invalid class to amount input
                    $(this).addClass("is-invalid");
                    // add error message
                    $(this).after('<div class="alert alert-danger mt-2">Withdraw amount is greater than your courses revenue</div>');
                    $(".withdraw").attr("disabled",true);
                }else{
                    // remove is-invalid class to amount input
                    $(this).removeClass("is-invalid");
                    $(this).addClass("is-valid");
                    // remove error message
                    $(this).next().remove();
                    // enable submit button
                    $(".withdraw").attr("disabled",false);
                }
                
            });

            let bankName =  "{{ $payout->bank_name ?? "" }}";
            let bankBranch =  "{{ $payout->bank_branch ?? "" }}";
            let accountNumber =  "{{ $payout->account_number ?? "" }}";
            let routingNumber =  "{{ $payout->routing_number ?? "" }}";

            if(bankName == "" || bankBranch == "" || accountNumber == "" || routingNumber == ""){
                $(".withdraw").attr("disabled",true);
                Toast.fire({
                    icon: 'error',
                    title: 'Please add your payout information'
                });
            }else{
                $(".withdraw").attr("disabled",false);
            }
            
        });
    </script>
@endpush