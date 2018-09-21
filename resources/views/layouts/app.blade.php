<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!-- begin::Head -->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!--begin::Web font -->
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
        <script>
            WebFont.load({
                google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
                active: function() {
                    sessionStorage.fonts = true;
                }
            });
        </script>
        <!--end::Web font -->


        <!-- Styles -->
        <!--begin::Global Theme Styles -->
        <link href="{{ mix('css/vendors.bundle.css') }}" rel="stylesheet" type="text/css" />
        {{--RTL version:<link href="{{ asset('css/vendors.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />--}}
        <link href="{{ mix('css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
        {{--RTL Version <link href="{{ asset('css/style.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />--}}

        {{--RTL Version <link href="{{ asset('css/jquery-ui.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />--}}

    {{--RTL Version <link href="{{ asset('css/datatables.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />--}}
    <!--end::Global Theme Styles -->
        {{--<link rel="shortcut icon" href="{{ asset('media/img/logo/favicon.ico') }}" />--}}
    </head>
<!-- end::Head -->
<!-- begin::Body -->
    <body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">


    @auth
        @include('layouts.partials._loader-base')
        @include('layouts.partials._layout')
    @else
        @yield('content')
    @endauth
    <!-- Scripts -->

    <!--begin::Global Theme Bundle -->
    <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
    <script src="{{ mix('js/scripts.bundle.js') }}" type="text/javascript"></script>
    <!--end::Global Theme Bundle -->
    {{--<script src="{{ mix('js/app.js') }}" defer></script>--}}
    <!-- begin::Page Loader -->
    {{--<script>--}}
        {{--$(window).on('load', function () {--}}
            {{--$('body').removeClass('m-page--loading');--}}
        {{--});--}}
    {{--</script>--}}
    <!-- end::Page Loader -->
    </body>
<!-- end::Body -->
</html>
