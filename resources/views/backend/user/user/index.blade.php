@extends('backend.layouts.master')
@section('title', 'Users')
@include('backend.layouts.partial.data-table-style')

@section('content')
    {{-- Content Header (Page header)  --}}
    <section class="content-header info-box p-3 rounded">
        <div class="container-fluid">
            <div class="row mb-2 mt-2">
                <div class="col-sm-6">
                    <h3 class="card-title">{{ __('dashboard.user') }}</h3>
                </div>
                @can('user-create')
                    <div class="col-sm-6">
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('user.create') }}">
                                <i class="fas fa-plus"></i>
                                </i> {{ __('dashboard.add_new') }} {{ __('dashboard.user') }}
                            </a>
                        </div>
                    </div>
                @endcan

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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>User Type</th>
                                        <th>Phone</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $key => $user)
                                        <tr>
                                            <td>{{ $key += 1 }}</td>
                                            <td>{{ $user->fullname }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->usertype }}</td>
                                            <td>
                                                {{ $user->phone ?? 'N/A' }}
                                            </td>
                                            <td class="d-flex items-center">

                                                @if (Request::is('admin/teacher/pending'))
                                                    @if ($pendingInstructor)
                                                        <a href="{{ route('pending.instructor.details', $user->id) }}"
                                                            class="btn btn-info mr-2">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a href="{{ route('approve.instructor', $user->id) }}"
                                                            class="btn btn-success mr-2">
                                                            Approve Instructor
                                                        </a>
                                                    @endif
                                                @else
                                                    @can('user-edit')
                                                        <a href="{{ route('user.edit', $user->id) }}"
                                                            class="btn tp-edit-btn mr-2">
                                                            <span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-edit">
                                                                    <path
                                                                        d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                    </path>
                                                                    <path
                                                                        d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                    </path>
                                                                </svg>
                                                            </span>
                                                        </a>
                                                    @endcan
                                                @endif

                                                @can('user-delete')
                                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button data-user-id="{{ $user->id }}" type="submit"
                                                            class="btn tp-delet-btn">
                                                            <span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-trash-2">
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
                                                        </button>
                                                    </form>
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
@push('scripts')
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
            // atleast one checkbox sbould be checked
            $(".tp-delet-btn").on("click", function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to Delete this role!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).closest('form').submit();
                    }
                });
            });

        });
    </script>
@endpush
@include('backend.layouts.partial.data-table-script')
