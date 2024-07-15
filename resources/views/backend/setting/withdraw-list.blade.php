@extends("backend.layouts.master")
@section("title",__("dashboard.all_withdraw"))
@include("backend.layouts.partial.data-table-style")

@section("content")
  <section class="content-header info-box p-3 rounded">
    <div class="container-fluid">
        <div class="row mb-2 mt-2">
            <div class="col-sm-6">
                <h3 class="card-title">{{ __("dashboard.all_withdraw") }}</h3>
            </div>
            <div class="col-sm-6">
                <div class="float-right">
                    <a class="btn btn-primary" href="{{ route("admin.add.withdraw") }}">
                        <i class="fas fa-plus"></i>
                        </i> {{ __("dashboard.add_withdraw") }}
                    </a>
                </div>
            </div>
        </div>
    </div>
  </section>

    {{--  Main content  --}}
  
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="datatable" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>{{ __("dashboard.sn") }}</th>
                      <th>{{ __("dashboard.amount") }}</th>
                      <th>{{ __("dashboard.status") }}</th>
                      <th>{{ __("dashboard.created_at") }}</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($withdraws as $key=>$withdraw)
                      <tr>
                        <td>{{ $key+=1 }}</td>
                        <td>{{ $withdraw->amount }}</td>
                        <td>
                            @if ($withdraw->status == 'pending')
                                <span class="badge badge-warning">{{ __("dashboard.pending") }}</span>
                            @elseif($withdraw->status == 'processing')
                                <span class="badge badge-success">{{ __("dashboard.processing") }}</span>
                            @elseif($withdraw->status == 'approved')
                                <span class="badge badge-primary">{{ __("dashboard.approve") }}</span>
                            @elseif($withdraw->status == 'rejected')
                                <span class="badge badge-danger">{{ __("dashboard.reject") }}</span>
                            @endif
                        </td>
                        <td>{{ $withdraw->created_at->format('d-m-Y') }}</td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection

@include("backend.layouts.partial.data-table-script")


