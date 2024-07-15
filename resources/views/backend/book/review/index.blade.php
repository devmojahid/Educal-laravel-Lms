@extends('backend.layouts.master')
@section('title', __('dashboard.all_review'))
@include('backend.layouts.partial.data-table-style')

@section('content')
    <section class="content-header info-box p-3 rounded">
        <div class="container-fluid">
            <div class="row mb-2 mt-2">
                <div class="col-sm-6">
                    <h3 class="card-title">{{ __('dashboard.all_review') }}</h3>
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
                                        <th>title</th>
                                        <th>body</th>
                                        <th>rating</th>
                                        <th>status</th>
                                        <th>user Name</th>
                                        <th>user Email</th>
                                        <th>Book name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reviews as $key => $review)
                                        <tr>
                                            <td>{{ $key += 1 }}</td>
                                            <td>{{ $review->title }}</td>
                                            <td>{{ $review->body }}</td>
                                            <td>{{ $review->rating }}</td>
                                            <td>
                                                @if ($review->status == 'pending')
                                                    <span class="badge badge-warning">{{ $review->status }}</span>
                                                @elseif ($review->status == 'approved')
                                                    <span class="badge badge-success">{{ $review->status }}</span>
                                                @else
                                                    <span class="badge badge-danger">{{ $review->status }}</span>
                                                @endif
                                            </td>
                                            <td>{{ $review->user->fullname }}</td>
                                            <td>{{ $review->user->email }}</td>
                                            <td>
                                                <a href="{{ route('books.details', $review->book->slug) }}"
                                                    target="_blank">
                                                    {{ Str::limit($review->book->title, 15, '') }}
                                                </a>
                                            </td>
                                            @if (Auth::user()->usertype == 'admin')
                                                <td class="d-flex items-center">
                                                    <a href="{{ route('admin.book.review.approve', $review->id) }}"
                                                        class="btn btn-success mr-2">
                                                        approve
                                                    </a>
                                                    <a href="{{ route('admin.book.review.reject', $review->id) }}"
                                                        class="btn btn-danger mr-2">
                                                        Reject
                                                    </a>
                                                    <a href="javascript:void(0)" data-item_id="{{ $review->id }}"
                                                        id="delete" class="btn btn-danger delete_item">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            @endif
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
        {{ route('admin.book.review.delete') }}
    </x-slot>
</x-delete-item>
