@extends('layouts.admin')

<x-admin.page-top
    pageTitle="Clients"
    pageStyles=""
    pageScripts=""
/>

@section('content')
    <x-admin.page-hero
        title="All Clients"
        displayButton="yes"
        buttonContent="Add New Client"
        buttonLink="{{ route('admin.clients.create') }}"
    />
    {{ Breadcrumbs::render('admin-clients') }}
@endsection
