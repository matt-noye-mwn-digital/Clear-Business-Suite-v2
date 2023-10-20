<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@stack('page-title') - </title>

        <!-- Stylesheets -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
        @stack('page-styles')


        <!-- Scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

        <x-head.tinymce-config/>
        @stack('page-scripts')


        @vite(['resources/assets/sass/app.scss', 'resources/assets/sass/admin.scss', 'resources/assets/js/app.js', 'resources/assets/js/admin.js'])
    </head>
    <body>
        @include('sweetalert::alert')
        @include('admin.layouts.partials.navs.topbarNav')
        @include('admin.layouts.partials.sidebar')
        <main class="adminMain ">



