@php
use App\Models\Setting;

$setting = Setting::where('status', 1)->first();
@endphp

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    @if (isset($setting))
    <!-- Favicon -->
    <link rel="icon" href="{{ asset($setting->favicon) }}" sizes="96x96" type="image/png" />
    @endif

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap">

    <!-- CSS files -->
    <link href="{{ asset('css/tabler.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/tabler-flags.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/tabler-payments.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/tabler-vendors.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/demo.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    {{-- Scripts --}}
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js/chart.js') }}"></script>


    {{-- Custom CSS --}}
    @yield('custom-css')
</head>

<body class="antialiased" data-bs-theme="{{ Auth::user()->choosed_theme == 'light' ? 'light' : 'dark' }}"
    dir="{{ App::isLocale('ar') || App::isLocale('ur') || App::isLocale('he') ? 'rtl' : 'ltr' }}">

    {{-- Preloader --}}
    <div class="page page-center preloader-wrapper">
        <div class="container container-slim py-4">
            <div class="text-center">
                <div class="mb-3">
                    <img src="{{ asset($setting->favicon) }}" height="36" alt="{{ $setting->site_name }}">
                </div>
                <div class="mb-3 h3">{{ __('Loading') }}</div>
                <div class="progress progress-sm">
                    <div class="progress-bar progress-bar-indeterminate bg-green"></div>
                </div>
            </div>
        </div>
    </div>

    <div id="wrapper" class="page">
        {{-- Topbar --}}
        @include('user.includes.topbar')
        {{-- --}}
        @include('user.includes.sidebar')

        {{-- Check email verification --}}
        @if (auth()->user()->email_verified_at == null)
            <div class="page-wrapper">
                <div class="container-xl">
                    <div class="mt-3">
                        @include('user.includes.verify')
                    </div>
                </div>
            </div>
        @endif

        {{-- Page Content --}}
        @yield('content')
    </div>

    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/tabler.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
    <script>
        // Preloader
        $(document).ready(function() {
            "use strict";
            $('.preloader-wrapper').fadeOut();
        });

        // Datatable
        $('#table').DataTable();
        $('#table1').DataTable();
    </script>
    {{-- Custom JS --}}
    @yield('custom-js')
</body>

</html>
