<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Dashboard | Mutiara Property</title>
        <!-- BEGIN: CSS Assets-->

        <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}" type="image/x-icon">

        <link href="/css/filepond.css" rel="stylesheet" />
        <link href="/css/tailwind.min.css" rel="stylesheet">
        
        <link rel="stylesheet" href="{{ mix('/dist/css/app.css') }}"/>
        <link rel="stylesheet" href="{{ '/css/choices.css' }}"/>

        @stack('style')

        @livewireStyles

        {{-- Blade Ui Kit --}}
        @bukStyles(true)

        <script src="/js/alpine.min.js" defer></script>
    </head>
    <body class="main">
        <!-- BEGIN: Mobile Menu -->
        @include('layouts.dashboard.components.mobile-sidebar')
        <!-- END: Mobile Menu -->
        <div class="flex">
            <!-- BEGIN: Side Menu -->
            @include('layouts.dashboard.sidebar')
            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">
                <!-- BEGIN: Top Bar -->
                @livewire('topbar')
                <!-- END: Top Bar -->
                {{ $slot }}
            </div>
        </div>

        @stack('modals')
        
        <!-- BEGIN: JS Assets-->

        {{-- Livewire --}}
        @livewireScripts

        {{-- Blade Ui Kit --}}
        @bukScripts(true)

        <script src="/js/filepond.js"></script>
        <script src="/js/sweetalert2.all.min.js"></script>
        <script src="{{ '/dist/js/app.js' }}" defer></script>

        <x-livewire-alert::scripts />

        @stack('scripts')
        
        <!-- END: JS Assets-->
    </body>
</html>
