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

    <section class="pageMain">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table class="table table-hover clickableTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Company Name</th>
                                <th>Email</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($clients as $client)
                                <tr onclick="window.location.href='{{ route('admin.clients.show', $client->id) }}'">
                                    <td>{{ $client->id }}</td>
                                    <td>{{ $client->first_name }} {{ $client->last_name }}</td>
                                    <td>
                                        @if($client->userDetail)
                                            {{ $client->userDetail->company_name }}
                                        @else
                                            --
                                        @endif
                                    </td>
                                    <td>
                                        {{ $client->email }}
                                    </td>
                                    <td>
                                        {!! $client->getStatus() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
