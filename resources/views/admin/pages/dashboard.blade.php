@extends('layouts.admin')

<x-admin.page-top
    pageTitle="Dashboard"
    pageStyles=""
    pageScripts=""
/>

@section('content')
    <x-admin.page-hero title="Welcome, {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}" displayButton="no" />
    {{ Breadcrumbs::render('admin-dashboard') }}

    <section class="pageMain adminDashboard">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="dashboardSmallBox">
                        <h4>{{ $unpaidInvoicesCount }}</h4>
                        <h5>Unpaid Invoices</h5>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="dashboardSmallBox">
                        <h4>{{ $clientsCount }}</h4>
                        <h5>Clients</h5>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="dashboardSmallBox">
                        <h4>{{ $leadCount }}</h4>
                        <h5>Leads</h5>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="dashboardSmallBox">
                        <h4>{{ $projectCount }}</h4>
                        <h5>Projects</h5>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="dashboardFullBox">
                        <h4>Billing Overview</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="dashboardFullBox">
                        <h4>Calendar</h4>
                        <x-admin.calendar />

                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
