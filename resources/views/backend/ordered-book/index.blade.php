@extends('backend.layouts.master')
@section('title', 'Blogs')
@include('backend.layouts.partial.data-table-style')

@section('content')
    <section class="content-header info-box p-3 rounded">
        <div class="container-fluid">
            <div class="row mb-2 mt-2">
                <div class="col-sm-6">
                    <h3 class="card-title">{{ __('dashboard.order') }}</h3>
                </div>
            </div>
        </div>
    </section>
    <form method="POST" id="updateStatusForm" action="{{ route('admin.book.orders.update') }}">
        @csrf
        <div class="modal fade show" id="modal-default" aria-modal="true" role="dialog">
            <input type="hidden" name="id" id="updateDataId">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Order Book Status</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Make Order </label>
                            <select class="form-control" name="status">
                                <option value="pending">Pending</option>
                                <option value="approved">Approved (For Downloadable)</option>
                                <option value="active">Shiped (For physical)</option>
                                <option value="complete">Completed (For physical)</option>
                                <option value="canceled">Canceled</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Save changes" />
                    </div>
                </div>
            </div>
        </div>
    </form>
    {{--  Main content  --}}

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-3">
                            <table id="datatable" class="table table-bordered table-hover text-nowrap custom-page-table">
                                <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Book Name.</th>
                                        <th>Order Number</th>
                                        <th>user Name</th>
                                        <th>Product Type</th>
                                        <th>status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($books as $key => $order)
                                        <tr>
                                            <td>{{ $key += 1 }}</td>
                                            <td>{{ $order->item->title }}</td>
                                            <td>
                                                <a
                                                    href="{{ route('admin.order.show', $order->order->id) }}">{{ $order->order->order_number }}</a>
                                            </td>
                                            <td>{{ $order->user->full_name }}</td>
                                            <td>
                                                @if ($order->item->product_type == 'downloadable')
                                                    <span class="badge badge-info">Downloadable</span>
                                                @else
                                                    <span class="badge badge-primary">Physical</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($order->status == 'pending')
                                                    <span class="badge badge-warning">Pending</span>
                                                @elseif($order->status == 'enrolled')
                                                    <span class="badge badge-info">Approved</span>
                                                @elseif($order->status == 'complete')
                                                    <span class="badge badge-success">Completed</span>
                                                @elseif($order->status == 'active')
                                                    <span class="badge badge-primary">Shiped</span>
                                                @else
                                                    <span class="badge badge-danger">Canceled</span>
                                                @endif
                                            </td>

                                            <td class="d-flex items-center">
                                                {{-- update status --}}
                                                @can('order-edit')
                                                    <button type="submit" class="btn btn-info mr-2"
                                                        data-id="{{ $order->item->id }}" id="updateOrderStatus"
                                                        data-order-id="{{ $order->id }}" data-toggle="modal"
                                                        data-target="#modal-default" data-toggle="tooltip" data-placement="top"
                                                        title="Update Status">
                                                        Update Status
                                                    </button>
                                                @endcan
                                                @can('order-delete')
                                                    <a href="javascript:void(0)" data-item_id="{{ $order->id }}"
                                                        id="delete" class="btn tp-delet-btn delete_item">
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round" class="feather feather-trash-2">
                                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                                <path
                                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                </path>
                                                                <line x1="10" y1="11" x2="10"
                                                                    y2="17"></line>
                                                                <line x1="14" y1="11" x2="14"
                                                                    y2="17"></line>
                                                            </svg>
                                                        </span>
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

@include('backend.layouts.partial.data-table-script')
<x-delete-item>
    <x-slot name='route'>
        {{ route('admin.book.orders.delete') }}
    </x-slot>
</x-delete-item>

@push('scripts')
    <script>
        $(document).ready(function() {
            $(document).on('click', '#updateOrderStatus', function() {
                let id = $(this).data('id');

                let Orderid = $(this).data('order-id');

                $('#updateDataId').val(Orderid);
                $.ajax({
                    url: "{{ route('admin.book.orders.edit.status') }}",
                    type: 'GET',
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(response) {
                        $('#modal-default').modal('show');
                        if (response.data.bookType == "downloadable") {
                            $("select[name='status']").html(
                                "<option value='pending'>Pending</option><option value='approved'>Approved (For Downloadable)</option><option value='canceled'>Canceled</option>"
                            );
                        } else {
                            $("select[name='status']").html(
                                "<option value='pending'>Pending</option><option value='active'>Shiped (For physical)</option><option value='complete'>Completed (For physical)</option><option value='canceled'>Canceled</option>"
                            );
                        }
                    }
                });
            });
        });
    </script>
@endpush
