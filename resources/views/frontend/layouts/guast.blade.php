<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>{{ env("APP_NAME") }} - @yield("title")</title>

     @include("frontend.layouts.meta-section")

      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Place favicon.ico in the root directory -->
      <link rel="shortcut icon" type="image/x-icon" href="{{ asset(getOptions('header','header_favicon')) }}">
      <!-- CSS here -->
      <link rel="stylesheet" href="{{asset("frontend/assets/css/preloader.css")}}">
      <link rel="stylesheet" href="{{asset("frontend/assets/css/bootstrap.min.css")}}">
      <link rel="stylesheet" href="{{asset("frontend/assets/css/meanmenu.css")}}">
      <link rel="stylesheet" href="{{asset("frontend/assets/css/animate.min.css")}}">
      <link rel="stylesheet" href="{{asset("frontend/assets/css/owl.carousel.min.css")}}">
      <link rel="stylesheet" href="{{asset("frontend/assets/css/swiper-bundle.css")}}">
      <link rel="stylesheet" href="{{asset("frontend/assets/css/backToTop.css")}}">
      <link rel="stylesheet" href="{{asset("frontend/assets/css/jquery.fancybox.min.css")}}">
      <link rel="stylesheet" href="{{asset("frontend/assets/css/fontAwesome5Pro.css")}}">
      <link rel="stylesheet" href="{{asset("frontend/assets/css/elegantFont.css")}}">
      <link rel="stylesheet" href="{{asset("frontend/assets/css/default.css")}}">
      <link rel="stylesheet" href="{{asset("frontend/assets/css/custom.css")}}">
      <link rel="stylesheet" href="{{ asset('backend/assets/plugins/sweetalert2/sweetalert2.min.css') }}">
      @stack("styles")
      <link rel="stylesheet" href="{{asset("frontend/assets/css/style.css")}}">
   </head>
   <body>
      <!--[if lte IE 9]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
      <![endif]-->

      <!-- pre loader area start -->
      @include("frontend.layouts.preloader")
      <!-- pre loader area end -->
  <!-- back to top start -->
  @include("frontend.layouts.back-to-top")
  <!-- back to top end -->

      <main>
         @yield("content")
      </main>

      <script src="{{asset("frontend/assets/js/vendor/jquery-3.5.1.min.js")}}"></script>
      <script src="{{asset("frontend/assets/js/vendor/waypoints.min.js")}}"></script>
      <script src="{{asset("frontend/assets/js/bootstrap.bundle.min.js")}}"></script>
      <script src="{{asset("frontend/assets/js/jquery.meanmenu.js")}}"></script>
      <script src="{{asset("frontend/assets/js/swiper-bundle.min.js")}}"></script>
      <script src="{{asset("frontend/assets/js/owl.carousel.min.js")}}"></script>
      <script src="{{asset("frontend/assets/js/jquery.fancybox.min.js")}}"></script>
      <script src="{{asset("frontend/assets/js/isotope.pkgd.min.js")}}"></script>
      <script src="{{asset("frontend/assets/js/parallax.min.js")}}"></script>
      <script src="{{asset("frontend/assets/js/backToTop.js")}}"></script>
      <script src="{{asset("frontend/assets/js/jquery.counterup.min.js")}}"></script>
      <script src="{{asset("frontend/assets/js/ajax-form.js")}}"></script>
      <script src="{{asset("frontend/assets/js/wow.min.js")}}"></script>
      <script src="{{asset("frontend/assets/js/imagesloaded.pkgd.min.js")}}"></script>
      <script src="{{asset("frontend/assets/js/main.js")}}"></script>
      <script src="{{ asset('backend/assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
      <script>
         $(document).ready(function(){
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
               });
      </script>

      @stack("scripts")
     
   </body>
</html>

