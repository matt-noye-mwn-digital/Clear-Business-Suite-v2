@extends('layouts.admin')

<x-admin.page-top
    pageTitle="Dashboard"
    pageStyles=""
    pageScripts=""
/>

@section('content')
    <x-admin.page-hero title="Welcome, {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}" displayButton="no" />
    {{ Breadcrumbs::render('admin-dashboard') }}
@endsection
