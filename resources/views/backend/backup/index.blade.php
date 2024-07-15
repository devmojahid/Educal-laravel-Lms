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

                        <form action="{{ route('admin.backup.upload') }}" class="mt-5" method="POST"
                            enctype="multipart/form-data" id="uploads_backup">
                            @csrf
                            <div class="form-group row">
                                <label for="updateFileInput" class="col-sm-2 col-form-label">Backup Uploades</label>
                                <div class="col-sm-10">
                                    <button class="btn edu-btn-header ml-1 mr-1" type="submit">
                                        <i class="fas fa-sync-alt"></i> Start Backup Process
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
        </div>
</div>@endsection
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
