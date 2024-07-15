@extends('backend.layouts.master')
@section('title', __("dashboard.blog_comment"))
@include('backend.layouts.partial.data-table-style')

@section('content')
    <section class="content-header info-box p-3 rounded">
        <div class="container-fluid">
            <div class="row mb-2 mt-2">
                <div class="col-sm-6">
                    <h3 class="card-title">{{ __('dashboard.blog_comment') }}</h3>
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
                                        <th>Content</th>
                                        <th>status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($comments as $key => $comment)
                                        <tr>
                                            <td>{{ $key += 1 }}</td>
                                            <td>{{ $comment->content }}</td>
                                            <td>{{ $comment->status }}</td>
                                            <td class="d-flex items-center">
                                                <a href="{{ route('admin.blog.comments.approve', $comment->id) }}" class="btn btn-success mr-2">
                                                    approve
                                                </a>
                                                <a href="{{ route('admin.blog.comments.reject', $comment->id) }}" class="btn btn-danger mr-2">
                                                    Reject
                                                </a>
                                                <a href="javascript:void(0)" data-item_id="{{ $comment->id }}" id="delete"
                                                    class="btn btn-danger delete_item">
                                                    <i class="fas fa-trash"></i>
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
<x-delete-item>
    <x-slot name='route'>
        {{ route('admin.blog.comments.delete') }}
    </x-slot>
</x-delete-item>

