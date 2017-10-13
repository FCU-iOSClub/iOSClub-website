<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>{{$title}}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> @stack('css')
</head>

<body>
    <div id="app">
        <!-- Page NavBar -->
        @yield('nav')
        <div class="container-fulid" id="content">
            <!-- Page Header -->
            @yield('header')
            <!-- Page Content -->
            @yield('content')
        </div>
        <!-- Footer -->
        @yield('footer')
    </div>
    <!-- Hidden -->
    @yield('hidden-content')
    <!-- Bootstrap core JavaScript -->
    @stack('scripts')
    <script src="{{asset('js/app.js')}}"></script>
    @yield('addon-script')
</body>

</html>