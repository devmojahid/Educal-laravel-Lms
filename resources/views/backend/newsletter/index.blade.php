@extends('backend.layouts.master')
@section('title', 'all_subscriber')
@include('backend.layouts.partial.data-table-style')

@section('content')
    <section class="content-header info-box p-3 rounded">
        <div class="container-fluid">
            <div class="row mb-2 mt-2">
                <div class="col-sm-6">
                    <h3 class="card-title">{{ __('dashboard.all_subscriber') }}</h3>
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
                                        <th>Email</th>
                                        <th>Subscribe Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($newsletters as $key => $newsletter)
                                        <tr>
                                            <td>{{ $key += 1 }}</td>
                                            <td>{{ $newsletter->email }}</td>
                                            <td>{{ monthDayYear($newsletter->created_at) }}</td>
                                            <td class="d-flex items-center">
                                                <a href="javascript:void(0)" data-newsletter_id="{{ $newsletter->id }}"
                                                    class="btn tp-delet-btn delete_newsletter">
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
        $(document).on('click', '.delete_newsletter', function(e) {
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
                    let newsletter_id = $(this).data('newsletter_id');
                    $.ajax({
                        url: "{{ route('admin.newsletter.delete') }}",
                        method: 'post',
                        data: {
                            id: newsletter_id,
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
