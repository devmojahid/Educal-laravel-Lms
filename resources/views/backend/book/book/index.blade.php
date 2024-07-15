@extends('backend.layouts.master')
@section('title', 'Blogs')
@include('backend.layouts.partial.data-table-style')

@section('content')
    <section class="content-header info-box p-3 rounded">
        <div class="container-fluid">
            <div class="row mb-2 mt-2">
                <div class="col-sm-6">
                    <h3 class="card-title">{{ __('dashboard.book') }}</h3>
                </div>
                @if (auth()->user()->usertype == 'admin')
                    <div class="col-sm-6">
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.books.create') }}">
                                <i class="fas fa-plus"></i>
                                {{ __('dashboard.add_new') }} {{ __('dashboard.book') }}
                            </a>
                        </div>
                    </div>
                @endif
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
                                        <th>{{ __('dashboard.sn') }}</th>
                                        <th>{{ __('dashboard.title') }}</th>
                                        <th>{{ __('dashboard.status') }}</th>
                                        <th>{{ __('dashboard.cetagory') }}</th>
                                        <th>{{ __('dashboard.image') }}</th>
                                        <th>{{ __('dashboard.action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($books as $key => $book)
                                        <tr>
                                            <td>{{ $key += 1 }}</td>
                                            <td>{{ $book->title }}</td>
                                            <td>{{ $book->status }}</td>
                                            <td>
                                                @foreach ($book->categories as $category)
                                                    {{ $category->title }}
                                                @endforeach
                                            </td>
                                            <td>
                                                <img class="edu-blog-img" src="{{ asset($book->image) }}" alt=""
                                                    width="100" height="100">
                                            </td>
                                            <td>
                                                @if (auth()->user()->usertype == 'admin')
                                                    <a href="{{ route('admin.books.edit', $book->id) }}"
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
                                                @endif
                                                @if (auth()->user()->usertype == 'admin')
                                                    <button class="btn tp-delet-btn delete_item"
                                                        data-item_id="{{ $book->id }}">
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
                                                @endif
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
        "use strict";
        $(document).ready(function() {
            $(document).on('click', '.delete_item', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Once Delete, This will be Permanently Delete!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        let itemId = $(this).data('item_id');
                        $.ajax({
                            url: "{{ route('admin.books.destroy', '') }}/" + itemId,
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: {
                                id: itemId
                            },
                            success: function(res) {
                                if (res.status == 'success') {
                                    $('.table').load(location.href + ' .table');
                                    Swal.fire(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success'
                                    )
                                }
                            }
                        });
                    }
                })
            })
        });
    </script>
@endpush
