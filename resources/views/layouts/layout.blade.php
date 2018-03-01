<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('before-script')
</head>
<body>

    <!-- HEADER -->
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
        @include('layouts.header')
    </nav>
    
    <!-- BODY CONTENT -->
    <div class="container-fluid">
        <div class="row">
            <!-- LEFT NAV -->
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    @include('layouts.left-nav')
                </div>
            </nav>

            <!-- MAIN -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                    
                    <!-- BREADCRUMB -->
                    <nav aria-label="breadcrumb">
                        @yield('breadcrumbs')
                    </nav> 
                </div>

                <!-- CONTENT -->
                @yield('content')
            </main>
            
        </div>
    </div>

    <!-- FOOTER -->
    @include('layouts.footer')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('after-script')
</body>
</html>
