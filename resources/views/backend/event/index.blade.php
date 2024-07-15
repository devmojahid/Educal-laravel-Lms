@extends('backend.layouts.master')
@section('title', 'all_events')
@include('backend.layouts.partial.data-table-style')

@section('content')
    <section class="content-header info-box p-3 rounded">
        <div class="container-fluid">
            <div class="row mb-2 mt-2">
                <div class="col-sm-6">
                    <h3 class="card-title">{{ __('dashboard.all_events') }}</h3>
                </div>
                {{-- @can('blog.create') --}}
                <div class="col-sm-6">
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('admin.events.create') }}">
                            <i class="fas fa-plus"></i> {{ __('dashboard.add_events') }}
                        </a>
                    </div>
                </div>
                {{-- @endcan --}}
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
                                        <th>Title</th>
                                        <th>Start Date</th>
                                        <th>Speaker Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($events as $key => $event)
                                        <tr>
                                            <td>{{ $key += 1 }}</td>
                                            <td>{{ $event->title }}</td>
                                            <td>{{ monthDayYear($event->start_date) }}</td>
                                            <td>{{ $event->speaker_name }}</td>
                                            <td class="d-flex items-center">
                                                <a href="{{ route('admin.events.edit', $event->id) }}"
                                                    class="btn tp-edit-btn mr-2">
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                                    </span>
                                                </a>
                                                <a href="javascript:void(0)" data-event_id="{{ $event->id }}"
                                                    class="btn tp-delet-btn delete_event">
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                    </span>
                                                </a>
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

@push('scripts')
    <script>
        //delete product
        "use strict";
        $(document).on('click', '.delete_event', function(e) {
            e.preventDefault();

            Swal.fire({
                title: '{{ __('dashboard.are_you_sure') }}',
                text: "{{ __('dashboard.once_deleted') }} {{ __('dashboard.language') }}",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '{{ __('dashboard.yes_delete_it') }}',
            }).then((result) => {
                if (result.isConfirmed) {
                    let event_id = $(this).data('event_id');
                    $.ajax({
                        url: "{{ route('admin.events.delete') }}",
                        method: 'post',
                        data: {
                            id: event_id,
                            _token: "{{ csrf_token() }}",
                        },
                        success: function(res) {
                            if (res.status == 'success') {
                                $('.table').load(location.href + ' .table');
                                Swal.fire(
                                    '{{ __('dashboard.deleted') }}',
                                    '{{ __('dashboard.your_file_has_been_deleted') }}',
                                    '{{ __('dashboard.success') }}'
                                )
                            }
                        }
                    });
                }
            })
        })
    </script>
@endpush
