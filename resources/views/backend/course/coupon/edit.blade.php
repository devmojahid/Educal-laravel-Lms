@extends("backend.layouts.master")
@section("title",__("dashboard.edit_coupon"))
@section("content")
     {{-- Content Header (Page header)  --}}
    <section class="content-header info-box p-3 rounded">
        <div class="container-fluid">
            <div class="row mb-2 mt-2">
                <div class="col-sm-6">
                    <h3 class="card-title">{{ __("dashboard.edit_coupon") }}</h3>
                </div>
                @can("course-coupon-list")
                    <div class="col-sm-6">
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route("blog.index") }}">
                                <i class="fas fa-plus"></i>
                                </i> {{ __("dashboard.all_coupon") }}
                            </a>
                        </div>
                    </div>
                @endcan
            </div>
        </div>
    </section>

<form id="couponForm" action="{{ route("admin.coupon.update",$coupon->id) }}" method="POST">
    @csrf
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="couponCode">{{ __("dashboard.code") }}</label>
                        <input type="text" name="code" value="{{ $coupon->code }}" class="form-control @error('code') is-invalid @enderror" id="couponCode" placeholder="{{ __("dashboard.code") }}" required>
                        @error('code')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>{{ __("dashboard.type") }}</label>
                        <select name="type" class="custom-select @error('type') is-invalid @enderror" value="{{ $coupon->type }}" >
                            <option value="fixed" {{ $coupon->type == "fixed" ? 'selected':""  }}>{{ __("dashboard.fixed") }}</option>
                            <option value="percentage" {{ $coupon->type == "percentage" ? 'selected':""  }}>{{ __("dashboard.percentage") }}</option>
                        </select>
                        @error('type')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="couponAmmount">{{ __("dashboard.ammount") }}</label>
                        <input type="number" name="ammount" class="form-control @error('ammount') is-invalid @enderror" value="{{ $coupon->ammount }}" id="couponAmmount" placeholder="{{ __("dashboard.ammount") }}" required>
                        @error('ammount')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="couponDesc">{{ __("dashboard.description") }}</label>
                <textarea name="description" class="form-control" id="description">{{ $coupon->description }}</textarea>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>{{ __("dashboard.status") }}</label>
                        <select name="status" class="custom-select  @error('status') is-invalid @enderror" value="{{ $coupon->status }}">
                            <option value="active" {{ $coupon->status == "active" ? 'selected':""  }}>{{ __("dashboard.active") }}</option>
                            <option value="inactive" {{ $coupon->status == "inactive" ? "selected":""  }}>{{ __("dashboard.inactive") }}</option>
                        </select>
                        @error('status')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="couponExpiredAt">{{ __("dashboard.expired_at") }}</label>
                        <input type="date" name="expired_at" class="form-control @error('expired_at') is-invalid @enderror"value="{{ $coupon->expired_at }}" id="couponExpiredAt" placeholder="{{ __("dashboard.expired_at") }}" required>
                        @error('expired_at')
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

@push("scripts")
    <script src="{{ asset("backend/assets/plugins/tinymce/tinymce.min.js") }}"></script>
    <script> 
          "use strict";
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
        $(document).ready(function() {
            tinymce.init({
                selector: '#description'
            });
            $("#couponForm").on("submit",function(){
                var precent_fixed = $("#precent_fixed").val();
                var couponAmmount = $("#couponAmmount").val();
                if(precent_fixed == "percentage"){
                    if(couponAmmount > 100){
                        Toast.fire({
                            icon: 'error',
                            title: 'Percentage must be less than 100'
                        });
                        return false;
                    }
                }
            });
        });
    </script>
@endpush