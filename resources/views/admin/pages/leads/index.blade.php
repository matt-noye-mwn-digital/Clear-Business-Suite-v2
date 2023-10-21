@extends('layouts.admin')

<x-admin.page-top
    pageTitle="Leads"
    pageStyles=""
    pageScripts=""
/>

@section('content')
    <x-admin.page-hero
        title="All Leads"
        displayButton="yes"
        buttonContent="Add New Lead"
        buttonLink="{{ route('admin.leads.create') }}"
    />
    {{ Breadcrumbs::render('admin-leads') }}
    <section class="pageMain">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table class="table table-hover clickableTable">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Company Name</th>
                            <th>Email</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($leads as $lead)
                            <tr onclick="window.location.href='{{ route('admin.leads.show', $lead->id) }}'">
                                <td>{{ $lead->first_name }} {{ $lead->last_name }}</td>
                                <td>{{ $lead->company_name }}</td>
                                <td>{{ $lead->email }}</td>
                                <td>{{ $lead->lead_status }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
