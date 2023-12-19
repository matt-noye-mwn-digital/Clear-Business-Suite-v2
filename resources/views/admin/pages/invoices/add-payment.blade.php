@extends('layouts.admin')

<x-admin.page-top
    pageTitle="Create Project"
    pageStyles=""
    pageScripts=""
/>

@section('content')
    <x-admin.page-hero
        title="Create Project"
        displayButton="yes"
        buttonContent="All Projects"
        buttonLink="{{ route('admin.projects.index') }}"
    />

    {{ Breadcrumbs::render('admin-invoices-add-payment', $invoice) }}

    @include('admin.pages.invoices.singleInvoiceNav')
    <x-admin.errors/>

    <section class="pageMain">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.invoices.add-payment-store', $invoice->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Date *</label>
                                <input type="date" name="date_time" id="date_time" value="{{ old('date_time') }}" required>
                                <x.form-errors fieldName="date_time"/>
                            </div>
                            <div class="col-md-6">
                                <label for="">Payment Method *</label>
                                <select name="payment_method" id="payment_method">
                                    <option selected disabled>-- Choose a payment Method --</option>
                                    @foreach($paymentMethods as $pm)
                                        <option value="{{ $pm->name }}">{{ $pm->name }}</option>
                                    @endforeach
                                </select>
                                <x.form-errors fieldName="payment_method"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Amount</label>
                                <input type="number" name="amount_in" id="amount_id" step="any" value="{{ old('amount_in', $invoice->total) }}" required>
                                <x.form-errors fieldName="amount_in"/>
                            </div>
                            <div class="col-md-4">
                                <label for="">Transaction Fees</label>
                                <input type="number" name="fees" id="fees" step="any" value="{{ old('fees', '0') }}" required>
                                <x.form-errors fieldName="fees"/>
                            </div>
                            <div class="col-md-4">
                                <label for="">Transaction ID</label>
                                <input type="text" name="transaction_id" id="transaction_id" value="{{ old('transaction_id') }}" required>
                                <x.form-errors fieldName="transaction_id"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="input-group invoicePaymentSendConfirmationEmailCheckboxGroup">
                                    <div class="input-group">
                                        <input type="checkbox" name="send_confirmation_email" id="send_confirmation_email" checked>
                                        <span>Check to send confirmation email</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-lg darkBlueBtn">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function(){
            //Get today's date
            function getTodayDate(){
                const today = new Date();
                const year = today.getFullYear();
                const month = String(today.getMonth() + 1).padStart(2, '0');
                const day = String(today.getDate()).padStart(2, '0');

                return `${year}-${month}-${day}`;
            }

            // Set today's date as the default value for the invoice date field
            document.getElementById('date_time').value = getTodayDate();
        });
    </script>
@endsection
