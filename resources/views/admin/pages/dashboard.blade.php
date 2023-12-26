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
                    <div class="col-md-4">
                        <div class="dashboardSmallBox">
                            <div class="card dashboard-card">
                                <div class="card-header">
                                    <h5>My Todo List</h5>
                                </div>
                                <div class="card-body">
                                    <ul class="list-unstyled todoList">
                                        @foreach($todoList as $todo)
                                            <li class="clickable" onclick="window.location.href='{{ route('admin.todos.show', $todo->id) }}'">
                                                <h6>{{ $todo->title }}</h6>
                                                {!! Str::limit($todo->description, 150) !!}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
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
