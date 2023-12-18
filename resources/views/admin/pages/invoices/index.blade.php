@extends('layouts.admin')
<x-admin.page-top
    pageTitle="All Invoices"
    pageStyles=""
    pageScripts=""
/>
@section('content')
    <x-admin.page-hero
        title="All Invoices"
        displayButton="yes"
        buttonContent="Create invoice"
        buttonLink="{{ route('admin.invoices.create') }}"
    />

    {{ Breadcrumbs::render('admin-invoices-index') }}

    <section class="pageMain">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table class="table w-100 table-hover">
                        <thead>
                            <tr>
                                <th>Invoice #</th>
                                <th>Client</th>
                                <th>Invoice Date</th>
                                <th>Due Date</th>
                                <th>Total</th>
                                <th>Payment Method</th>
                                <th>Status</th>
                                <th class="actions">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($invoices as $invoice)
                                <tr>
                                    <td>{{ $invoice->invoice_number }}</td>
                                    <td>{{ $invoice->client->first_name }} {{ $invoice->client->last_name }}</td>
                                    <td>{{ date('d/m/Y', strtotime($invoice->invoice_date)) }}</td>
                                    <td>{{ date('d/m/Y', strtotime($invoice->due_date)) }}</td>
                                    <td>
                                        @if($invoice->total != NULL)
                                            £{{ $invoice->total }}
                                        @else
                                            --
                                        @endif
                                    </td>
                                    <td>{{ $invoice->payment_method }}</td>
                                    <td>{!! $invoice->getStatus() !!}</td>
                                    <td class="actions">
                                        <div class="btn-group">
                                            <a href="" class="view-btn"><i class="fas fa-eye"></i></a>
                                            <a href="{{ route('admin.invoices.edit', $invoice->id) }}" class="edit-btn"><i class="fas fa-edit"></i></a>
                                            <form action="" method="POST">
                                                @csrf
                                                @method('delete') <!-- Add this hidden field to override the method -->
                                                <button type="submit" class="confirm-delete-btn"><i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
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
