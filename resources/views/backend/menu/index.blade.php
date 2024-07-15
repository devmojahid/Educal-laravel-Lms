@extends('backend.layouts.master')
@section('title', __('dashboard.menu_builder'))
@section('content')
    {{-- Content Header (Page header)  --}}
    <section class="content-header info-box p-3 rounded">
        <div class="container-fluid">
            <div class="row mb-2 mt-2">
                <div class="col-sm-6">
                    <h3 class="card-title">{{ __('dashboard.menu_builder') }}</h3>
                </div>
               
            </div>
        </div>
    </section>
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">{{ __('dashboard.all_menu') }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                      <table class="table table-bordered my-5 py-3 custom-page-table">
                        <thead>
                          <tr>
                            <th style="width: 10px">{{ __("dashboard.sn") }}</th>
                            <th>{{ __("dashboard.name") }}</th>
                            <th>{{ __("dashboard.status") }}</th>
                            <th>{{ __("dashboard.location") }}</th>
                            <th>{{ __("dashboard.action") }}</th>
                          </tr>
                        </thead>
                        <tbody>
                        @forelse ($menus as $key=>$menu)
                          <tr>
                            <td>{{ $key++ }}</td>
                            <td>{{ $menu->title }}</td>
                            <td>
                                @if ($menu->status == 'active')
                                    <span class="badge bg-success">{{ __("dashboard.active") }}</span>
                                @else
                                    <span class="badge bg-danger">{{ __("dashboard.inactive") }}</span>
                                @endif
                            </td>
                            <td>{{ $menu->location }}</td>
                            <td class="d-flex">
                                <a href="{{ route('admin.appearance.menu.edit',$menu->id) }}" class="btn tp-edit-btn mr-2">
                                    <span>
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                    </span>
                                  </a>
                                  <a href="javascript:void(0)" data-item_id="{{ $menu->id }}" id="delete"
                                    class="btn tp-delet-btn delete_item">
                                    <span>
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                    </span>
                                  </a>
                            </td>
                          </tr>
                          @empty
                            <tr>
                                <td colspan="5" class="text-center">{{ __("dashboard.no_data_found") }}</td>
                            </tr>
                          @endforelse
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
            </div>

            <div class="col-md-5">
                <div class="card">
                    @include('frontend.layouts.message')
                    <form id="eventForm" action="{{ route('admin.appearance.menu.store') }}" method="POST">
                        @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="menuTitle">{{ __('dashboard.add_new_menu') }}</label>
                            <input type="text" name="title" class="form-control" id="menuTitle" placeholder="Enter subject" required>
                        </div>
                        <input type="hidden" name="content" value="[]">
                        <div class="form-group">
                            <label for="menuLocation">{{ __('dashboard.menu_location') }}</label>
                            <select class="form-control" name="location" id="menuLocation">
                                <option value="" disabled selected>{{ __("dashboard.select_location") }}</option>
                                <option value="header">{{ __("dashboard.header") }}</option>
                                <option value="footer_1">{{ __("dashboard.footer_1") }}</option>
                                <option value="footer_2">{{ __("dashboard.footer_2") }}</option>
                            </select>
                            <small id="menuLocation" class="form-text text-muted">{{ __("dashboard.menu_note_location") }}</small>
                        </div>
                        <button type="submit" class="btn btn-primary mt-4">{{ __('dashboard.submit') }}</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    
   
@endsection

<x-delete-item>
  <x-slot name='route'>
      {{ route('admin.appearance.menu.delete') }}
  </x-slot>
</x-delete-item>
