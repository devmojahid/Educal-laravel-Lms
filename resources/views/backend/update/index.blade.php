@extends('backend.layouts.master')
@section('title', 'Update System')
@section('content')
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8 mt-5">
            <div class="card card-primary card-outline">
                <div class="container">
                    <div class="card-body box-profile">
                        <a class="btn edu-btn-header ml-1 mr-1" href="{{ route('admin.backup') }}">
                            <i class="fas fa-undo"></i></i> Generate Backup
                        </a>
                        <form action="{{ route('admin.update') }}" method="POST" enctype="multipart/form-data"
                            class="mt-5">
                            @csrf
                            <div class="form-group row">
                                <label for="updateFileInput" class="col-sm-2 col-form-label">Upload Script</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="updateFileInput"
                                                name="script" required accept=".zip">
                                            <label class="custom-file-label" for="updateFileInput">Upload Script
                                                hear</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="callout callout-warning mb-4">
                                <h5 class="mb-2">
                                    <i class="icon fas fa-exclamation-triangle"></i> Warning! Update System Carefully !
                                </h5>
                                <ul>
                                    <li>
                                        <b>Database Backup</b> - You can take a backup of your database menully before
                                        updating
                                    </li>
                                    <li>
                                        <b>Uploades Backup</b> - You can take a backup of your uploades folder before
                                        updating.
                                    </li>
                                    <li>
                                        <b>Update System</b> - You can update your system by uploading a new script.
                                    </li>
                                    <li>
                                        <b>Warning</b> - Please make sure you have a backup of your system before updating.
                                    </li>
                                    <li>
                                        <b>Warning</b> - New update will replace the old files and database tables.
                                    </li>
                                </ul>
                            </div>
                            <div class="row mt-4">
                                <button class="btn edu-btn-header ml-1 mr-1" type="submit">
                                    <i class="fas fa-sync-alt"></i> Update System
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('backend/assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            bsCustomFileInput.init();

            $(document).on('submit', 'form', function(e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status) {
                            toastr.success(response.message);
                            $(this).find('button[type="submit"]').attr('disabled', 'disabled');
                            $(this).find('button[type="submit"]').html(
                                '<i class="fas fa-sync-alt fa-spin"></i> Updating...');
                        } else {
                            toastr.error(response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        var err = JSON.parse(xhr.responseText);
                        toastr.error(err.message);
                        console.log(err);
                    }
                });
            });
        });
    </script>
@endpush
