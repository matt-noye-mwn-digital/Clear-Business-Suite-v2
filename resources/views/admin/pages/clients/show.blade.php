@extends('layouts.admin')

<x-admin.page-top
    pageTitle="{{ $client->first_name }} {{ $client->last_name }}'s account"
    pageStyles=""
    pageScripts=""
/>

@section('content')
    <x-admin.page-hero
        title="{{ $client->first_name }} {{ $client->last_name }}"
        displayButton="yes"
        buttonContent="All Clients"
        buttonLink="{{ route('admin.clients.index') }}"
    />
    {{ Breadcrumbs::render('admin-clients-show', $client) }}

    <section class="pageMain clientProfileMain">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @include('admin.pages.clients.clientNav')
                </div>
                <div class="col-lg-9">
                    <div class="infoWrap">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="box">
                                    <h5 class="box-title">
                                        Client Information
                                    </h5>
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <td><strong>First Name:</strong></td>
                                            <td>{{ $client->first_name }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Last Name:</strong></td>
                                            <td>{{ $client->last_name }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Company Name:</strong></td>
                                            <td>
                                                @if($client->userDetails)
                                                    {{ $client->userDetails->company_name }}
                                                @else
                                                    --
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Address 1:</strong></td>
                                            <td>
                                                @if($client->userDetails)
                                                    {{ $client->userDetails->address_line_one }}
                                                @else
                                                    --
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Address 2:</strong></td>
                                            <td>
                                                @if($client->userDetails)
                                                    {{ $client->userDetails->address_line_two }}
                                                @else
                                                    --
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>State/County:</strong></td>
                                            <td>
                                                @if($client->userDetails)
                                                    {{ $client->userDetails->state_county }}
                                                @else
                                                    --
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Zip/Postcode:</strong></td>
                                            <td>
                                                @if($client->userDetails)
                                                    {{ $client->userDetails->zip_postcode }}
                                                @else
                                                    --
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Country:</strong></td>
                                            <td>
                                                @if($client->userDetails)
                                                    {{ $client->userDetails->country }}
                                                @else
                                                    --
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Landline Number:</strong></td>
                                            <td>
                                                @if($client->userDetails)
                                                    {{ $client->userDetails->landline_number }}
                                                @else
                                                    --
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Mobile Number:</strong></td>
                                            <td>
                                                @if($client->userDetails)
                                                    {{ $client->userDetails->mobile_number }}
                                                @else
                                                    --
                                                @endif
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="box">
                                    <h5 class="box-title">Invoices</h5>
                                </div>
                                <div class="box">
                                    <h5 class="box-title">Billing</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">

                </div>
            </div>
        </div>
    </section>

@endsection
