<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <title>@yield('title')</title>
        {{-- Vite --}}
        @vite('resources/css/app.css')

        {{-- BladewindUI Links Compiled --}}
        <link href="{{ asset('vendor/bladewind/css/animate.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" />
        <script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>

        {{-- Other Links Compiled --}}
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
        <link rel="stylesheet" href="{{asset('css/main-layout.css')}}">

        {{-- Other Scripts Compiled --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        @yield('head')
    </head>

    <body>
        <div class="body-content bg-slate-100">
            @include('layouts.navbar')

            @include('layouts.sidebar')

            <div class="main-content">
                @yield('content')
            </div>
        </div>

        {{-- Scripts Compiled --}}
        <script src="{{asset('js/layouts/sidebar.js')}}"></script>
        <script src="{{asset('js/auth/logout.js')}}"></script>
    </body>

</html>