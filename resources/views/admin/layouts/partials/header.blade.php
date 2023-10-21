<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@stack('page-title') - {{ config('settings.site_name', config('app.name')) }}</title>

        <!-- Stylesheets -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.32/sweetalert2.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" />

        @stack('page-styles')

        <!-- Scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.32/sweetalert2.all.js"></script>
        <script src="{{ asset('js/chart.js') }}"></script>
        @stack('page-scripts')

        <x-head.tinymce-config/>


        @vite(['resources/assets/sass/app.scss', 'resources/assets/sass/admin.scss', 'resources/assets/js/app.js', 'resources/assets/js/admin.js'])
    </head>
    <body>

        @include('sweetalert::alert')
        @include('admin.layouts.partials.navs.topbarNav')
        @include('admin.layouts.partials.sidebar')
        <main class="adminMain ">



