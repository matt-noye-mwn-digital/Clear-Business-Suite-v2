@extends('layouts.admin')

<x-admin.page-top
    pageTitle="Settings"
    pageStyles=""
    pageScripts=""
/>

@section('content')
    <x-admin.page-hero
        title="All Settings"
        displayButton="no"
    />
    {{ Breadcrumbs::render('admin-settings') }}

@endsection
