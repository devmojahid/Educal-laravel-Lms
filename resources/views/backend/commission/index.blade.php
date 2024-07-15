@extends('backend.layouts.master')
@section('title', __('dashboard.commission_setting'))
@section('content')
    <section class="content-header info-box p-3 rounded">
        <div class="container-fluid">
            <div class="row mb-2 mt-2">
                <div class="col-sm-6">
                    <h3 class="card-title">{{ __('dashboard.commission_setting') }}</h3>
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
                            <form action="{{ route('admin.admin.commission.update') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <h5 class="mb-4">{{ __('dashboard.set_your_commission') }}</h5>
                                <div class="form-group row">
                                    <label for="commission"
                                        class="col-sm-4 col-form-label">{{ __('dashboard.how_many_percentage_commission') }}</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" aria-describedby="commission"
                                            name="commission" id="commission"
                                            value="@isset($commission->percent) {{ $commission->percent }} @endisset"
                                            placeholder="30">
                                        <span>
                                            @error('commission')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </span>
                                        <span class="form-text" id="commission">
                                            {{ __('dashboard.how_of_course_price') }}
                                        </span>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">{{ __('dashboard.submit') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
@endsection
