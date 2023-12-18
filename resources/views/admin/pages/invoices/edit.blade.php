@extends('layouts.admin')
<x-admin.page-top
    pageTitle="Create new invoice"
    pageStyles=""
    pageScripts=""
/>
@section('content')
    <x-admin.page-hero
        title="Create Invoice"
        displayButton="yes"
        buttonContent="All Invoices"
        buttonLink="{{ route('admin.invoices.index') }}"
    />

    {{ Breadcrumbs::render('admin-invoices-create') }}

    <x-admin.errors/>

    <section class="pageMain">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.invoices.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <label for="">Client *</label>
                                <input type="text" name="client" id="client" value="{{ $invoice->client->first_name }} {{ $invoice->client->last_name }}" readonly>
                                <input type="number" name="client_id" id="client_id" value="{{ $invoice->client_id }}" style="display: none;">

                                <x.form-errors fieldName="client_id"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Invoice Date *</label>
                                <input type="date" name="invoice_date" id="invoice_date" value="{{ $invoice->invoice_date }}">
                                <x.form-errors fieldName="invoice_date"/>
                            </div>
                            <div class="col-md-6">
                                <label for="">Due Date</label>
                                <input type="date" name="due_date" id="due_date" value="{{ old('due_date', $invoice->due_date) }}">
                                <x.form-errors fieldName="due_date"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Payment Method *</label>
                                <select name="payment_method" id="payment_method">
                                    <option selected disabled>-- Choose a payment Method --</option>
                                    @foreach($paymentMethods as $pm)
                                        <option value="{{ $pm->name }}" @if($pm->name == $invoice->payment_method) selected @endif>{{ $pm->name }}</option>
                                    @endforeach
                                </select>
                                <x.form-errors fieldName="payment_method"/>
                            </div>
                            <div class="col-md-6">
                                <label for="">Status *</label>
                                <select name="status" id="status">
                                    <option value="draft" @if($invoice->status == 'draft') selected @endif>Draft</option>
                                    <option value="unpaid" @if($invoice->status == 'unpaid') selected @endif>Unpaid</option>
                                    <option value="paid" @if($invoice->status == 'paid') selected @endif>Paid</option>
                                    <option value="cancelled" @if($invoice->status == 'cancelled') selected @endif>Cancelled</option>
                                    <option value="refunded" @if($invoice->status == 'refunded') selected @endif>Refunded</option>
                                    <option value="collections" @if($invoice->status == 'collections') selected @endif>Collections</option>
                                    <option value="payment_pending" @if($invoice->status == 'payment_pending') selected @endif>Payment Pending</option>
                                </select>
                                <x.form-errors fieldName="status"/>
                            </div>
                        </div>
                        <div class="row my-4">
                            <div class="col-12">
                                <h4 class="formSectionTitle" style="color: #003B73; font-size: 25px; font-weight: bold;">
                                    Invoice Items
                                </h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <table class="table w-full invoiceItemsTable" id="lineItemsTable">
                                    <thead style="background-color: #003b73;">
                                    <tr>
                                        <th style="background-color: #003b73; color: #fff; font-size: 18px; font-weight: bold;">Description</th>
                                        <th style="background-color: #003b73; color: #fff; font-size: 18px; font-weight: bold;">Quantity</th>
                                        <th style="background-color: #003b73; color: #fff; font-size: 18px; font-weight: bold;">Price</th>
                                        <th style="background-color: #003b73; color: #fff; font-size: 18px; font-weight: bold;"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($lineItems as $index => $lineItem)
                                        <tr>
                                            <td><input type="text" name="lineItems[{{ $index }}][description]" value="{{ $lineItem->description }}"></td>
                                            <td><input type="number" name="lineItems[{{ $index }}][quantity]" value="{{ $lineItem->quantity }}"></td>
                                            <td><input type="number" name="lineItems[{{ $index }}][price]" value="{{ $lineItem->amount }}"></td>
                                            <td>
                                                <form action="" method="post">
                                                    @csrf
                                                    @method('destroy')
                                                    <button class="btn btn-danger ms-auto d-block"><i class="fas fa-minus"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td>
                                            <input type="text" name="lineItems[0][description]" id="description">
                                        </td>
                                        <td>
                                            <input type="number" name="lineItems[0][quantity]" id="quantity">
                                        </td>
                                        <td>
                                            <input type="number" step="any" name="lineItems[0][amount]" id="price">
                                        </td>
                                        <td>
                                            <button type="button" onclick="deleteRow(this)" class="btn btn-danger ms-auto d-block"><i class="fas fa-minus"></i></button>
                                        </td>
                                    </tr>
                                    </tbody>
                                    <tfoot style="background-color: #fff; border-bottom: 0;">
                                    <tr style="background-color: #fff; border-bottom: 0;">
                                        <td style="background-color: #fff; border-bottom: 0;"></td>
                                        <td style="background-color: #fff; border-bottom: 0;"></td>
                                        <td style="background-color: #fff; border-bottom: 0;"></td>
                                        <td class="d-flex justify-content-end" style="background-color: #fff; border-bottom: 0;">
                                            <button type="button" onclick="addRow()" class="mediumBlueBtn mt-2">Add Row</button>
                                        </td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5 offset-md-7">
                                <table class="table w-100 invoiceCreationTotalsTable">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <strong>Sub Total:</strong>
                                        </td>
                                        <td>£{{ $invoice->sub_total }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Discount:</strong></td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" name="invoice_discount" id="invoice_discount" step="any" value="{{ old('invoice_discount', $invoice->invoice_discount) }}">
                                                <span class="input-group-text">
                                                        %
                                                    </span>
                                                <x.form-errors fieldName="invoice_discount"/>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Tax/VAT:</strong></td>
                                        <td>{{ $invoice->tax_amount }}%</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Total:</strong></td>
                                        <td>£{{ $invoice->total }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="floatingInvoiceFormButtons">
                            <div class="row">
                                <div class="col-12 d-flex justify-content-end">
                                    <div class="btn-group">
                                        <button type="submit" name="submit_type" value="publish_and_record_payment" class="darkBlueOutlineBtn">
                                            Publish and Record Payment
                                        </button>
                                        <button type="submit" name="submit_type" value="publish_and_send" class="mediumBlueOutlineBtn">Publish and Send</button>
                                        <button type="submit" name="submit_type" value="save" class="mediumBlueBtn">Save</button>
                                    </div>
                                </div>
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
            document.getElementById('invoice_date').value = getTodayDate();
        });
        function addRow() {
            var tableBody = document.getElementById('lineItemsTable').getElementsByTagName('tbody')[0];

            // Create a new row and cells
            var newRow = tableBody.insertRow(tableBody.rows.length);
            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);
            var cell3 = newRow.insertCell(2);
            var cell4 = newRow.insertCell(3);

            // Find the last index used for line items
            var lastIndex = tableBody.rows.length - 1;

            // Increment the index for the new row
            var newIndex = lastIndex + 1;

            // Add input fields to cells with updated indices
            cell1.innerHTML = '<input type="text" name="lineItems[' + newIndex + '][description]" id="description">';
            cell2.innerHTML = '<input type="number" name="lineItems[' + newIndex + '][quantity]" id="quantity">';
            cell3.innerHTML = '<input type="number" step="any" name="lineItems[' + newIndex + '][amount]" id="price">';
            cell4.innerHTML = '<button type="button" onclick="deleteRow(this)" class="btn btn-danger ms-auto d-block"><i class="fas fa-minus"></i></button>';
        }

        function deleteRow(button) {
            // Get the row to be deleted
            var row = button.parentNode.parentNode;

            // Remove the row from the table
            row.parentNode.removeChild(row);
        }
    </script>
@endsection
