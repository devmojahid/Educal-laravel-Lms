@extends("backend.layouts.master")
@section("title","Withdraws")
@include("backend.layouts.partial.data-table-style")

@section("content")
  <section class="content-header info-box p-3 rounded">
    <div class="container-fluid">
        <div class="row mb-2 mt-2">
            <div class="col-sm-6">
                <h3 class="card-title">{{ __("dashboard.withdraw") }}</h3>
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
                <div class="card-body table-responsive p-3">
                  <table id="datatable" class="table table-bordered table-hover text-nowrap">
                    <thead>
                    <tr>
                      <th>SL.</th>
                      <th>Ammount</th>
                      <th>User</th>
                      <th>status</th>
                      <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($withdraws as $key=>$withdraw)
                      <tr>
                        <td>{{ $key+=1 }}</td>
                        <td>{{ $withdraw->amount }}</td>
                        <td>{{ optional($withdraw->user)->full_name }}</td>
                        <td>{{ $withdraw->status }}</td>
                        <td class="d-flex items-center">  
                          @can("withdraw-approve")
                            <a href="{{ route('admin.withdraw.approve',$withdraw->id) }}" class="btn btn-success mr-2">
                              {{ __("dashboard.approve") }}
                            </a>
                          @endcan
                          @can("withdraw-reject")
                            <a href="{{ route('admin.withdraw.reject',$withdraw->id) }}" class="btn btn-danger mr-2">
                              {{ __("dashboard.reject") }}
                            </a>
                          @endcan
                          @can("withdraw-processing")
                            <a href="{{ route('admin.withdraw.processing',$withdraw->id) }}" class="btn btn-primary mr-2">
                              {{ __("dashboard.processing") }}
                            </a>
                          @endcan
                        </td>
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

