@extends('layouts.admin')

<x-admin.page-top
    pageTitle="View Invoice #{{ $invoice->invice_number }}"
    pageStyles=""
    pageScripts=""
/>

@section('content')
    <x-admin.page-hero
        title="View Invoice #{{ $invoice->invoice_number }}"
        displayButton="yes"
        buttonContent="All Invoices"
        buttonLink="{{ route('admin.invoices.index') }}"
    />

    <section class="pageMain singleInvoiceShow">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="invoiceShowLogo">
                                <x-application-logo />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <ul class="list-unstyled statusDueDateList">
                                <li>
                                    {!! $invoice->getStatus() !!}
                                </li>
                                <li>
                                    Due Date: {{ date('d/m/Y', strtotime($invoice->due_date)) }}
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="invoiceNumber">
                                Invoice #{{ $invoice->invoice_number }}
                            </div>
                        </div>
                    </div>
                    <div class="row invoiceToFromRow">
                        <div class="col-lg-6 col-md-12">
                            <div class="to">
                                <strong>Invoice To</strong>
                                <ul class="list-unstyled">
                                    @if($invoice->client->company_name)
                                        <li>{{ $invoice->client->company_name }}</li>

                                    @endif
                                    <li>{{ $invoice->client->first_name }} {{ $invoice->client->last_name }}</li>
                                    <li>{{ $invoice->client->userDetails->address_line_one }}</li>
                                    @if($invoice->client->userDetails->address_line_two)
                                        <li>{{ $invoice->client->userDetails->address_line_two }}</li>
                                    @endif
                                    <li>{{ $invoice->client->userDetails->town_city }}</li>
                                    <li>{{ $invoice->client->userDetails->zip_postcode }}</li>
                                    @if($invoice->client->userDetails->state_county)
                                        <li>{{ $invoice->client->userDetails->state_county }}</li>
                                    @endif
                                    <li>
                                        {{ $invoice->client->userDetails->country }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="from">
                                <strong>Pay To</strong>
                            </div>
                        </div>
                    </div>
                    <div class="row dueDatePaymentMethodRow">
                        <div class="col-lg-6 col-md-12">
                            <p>
                                <strong>Due Date:</strong> {{ date('d/m/Y', strtotime($invoice->due_date)) }}
                            </p>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <p style="text-align: right;">
                                <strong>Payment Method: </strong>{{ $invoice->payment_method }}
                            </p>
                        </div>
                    </div>
                    <div class="row invoiceItemsRow">
                        <div class="col-12">
                            <table class="table w-100 invoiceItemsTable">
                                <thead>
                                    <tr>
                                        <th>Description</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($invoice->invoiceLineItem as $invoiceItem)
                                    <tr>
                                        <td>{{ $invoiceItem->description }}</td>
                                        <td>{{ $invoiceItem->quantity }}</td>
                                        <td>{{ Number::currency($invoiceItem->amount, in: 'GBP') }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-5 offset-lg-7">
                            <table class="table w-100 invoiceCreationTotalsTable">
                                <tbody>
                                    <tr>
                                        <td>
                                            <strong>Sub Total:</strong>
                                        </td>
                                        <td>{{ Number::currency($invoice->sub_total, in: 'GBP') }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Discount:</strong></td>
                                        <td>
                                            @if($invoice->invoice_discount)
                                                {{ $invoice->invoice_discount }}%
                                            @else
                                                0%
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Tax/VAT:</strong></td>
                                        <td>{{ $invoice->tax_amount }}%</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Total:</strong></td>
                                        <td>{{ Number::currency($invoice->total, in: 'GBP') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
