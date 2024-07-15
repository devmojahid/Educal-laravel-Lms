<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }}- @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset(getOptions('header','header_favicon')) }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/toastr/toastr.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/custom.css') }}">
    @stack('styles')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <!-- Site wrapper -->
    <div class="wrapper">
        @include('backend.layouts.partial.navbar')

        <!-- Main Sidebar Container -->
        @include('backend.layouts.partial.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Main content -->
            <section class="content pt-2">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <!-- Default box -->
                            @yield('content')
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>

    <!-- jQuery -->
    <script src="{{ asset('backend/assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('backend/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('backend/assets/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/toastr/toastr.min.js') }}"></script>
    <script>
    "use strict";
    $(document).ready(function() {
        //  when session flash
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });


        @if (session()->has('success'))
            Toast.fire({
                icon: 'success',
                title: '{{ session('success') }}'
            })
        @endif

        @if (session()->has('error'))
            Toast.fire({
                icon: 'error',
                title: '{{ session('error') }}'
            })
        @endif


        //  when delete button click
        $(document).on("click", "#delete", function(e){
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
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                }
            })
        });

        let url = "{{ route('lang.change') }}";

        $('#change_language').on('change',function(){
            let lang_code = $(this).val();
            window.location.href = url + "?lang="+ lang_code;
        });

        let currencyChangeUrl = "{{ route('admin.currency.change') }}";
            $("#change_currency").on('change', function(){
            let currency_code = $(this).val();
            window.location.href = currencyChangeUrl + "?currency="+ currency_code;
        });
    });

    </script>

    @stack('scripts')
</body>

</html>
