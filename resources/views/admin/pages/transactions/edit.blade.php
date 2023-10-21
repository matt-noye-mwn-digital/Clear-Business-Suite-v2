@extends('layouts.admin')
<x-admin.page-top
    pageTitle="Edit Transaction"
    pageStyles=""
    pageScripts=""
/>
@section('content')
    <x-admin.page-hero
        title="Edit Transactions"
        displayButton="yes"
        buttonContent="All Transactions"
        buttonLink="{{ route('admin.transactions.index') }}"
    />

    <x-admin.errors/>

    <section class="pageMain">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.transactions.update', $transaction->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Client</label>
                                <select name="user_id" id="user_id">
                                    <option >-- Select a client --</option>
                                    @foreach($clients as $client)
                                        <option value="{{ $client->id }}" @if($client->id == $transaction->user_id) selected @endif>{{ $client->first_name }} {{ $client->last_name }} - {{ $client->userDetails->company_name }}</option>
                                    @endforeach
                                </select>
                                <x.form-errors fieldName="user_id"/>
                            </div>
                            <div class="col-md-6">
                                <label for="">Date *</label>
                                <input type="date" name="date_time" id="date_time" value="{{ old('date_time', date('Y-m-d', strtotime($transaction->date_time))) }}" required>
                                <x.form-errors fieldName="date_time"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Amount in</label>
                                <input type="number" name="amount_in" id="amount_in" step="any" value="{{ old('amount_in', $transaction->amount_in) }}">
                                <x.form-errors fieldName="amount_in"/>
                            </div>
                            <div class="col-md-3">
                                <label for="">Amount out</label>
                                <input type="number" name="amount_out" id="amount_out" step="any" value="{{ old('amount_out', $transaction->amount_out) }}">
                                <x.form-errors fieldName="amount_out"/>
                            </div>
                            <div class="col-md-3">
                                <label for="">Fees</label>
                                <input type="number" name="fees" id="fees" step="any" value="{{ old('fees', $transaction->fees) }}">
                                <x.form-errors fieldName="fees"/>
                            </div>
                            <div class="col-md-3">
                                <label for="">Payment Method *</label>
                                <select name="payment_method" id="payment_method" required>
                                    <option>-- Select a payment method --</option>
                                    @foreach($paymentMethods as $paymentMethod)
                                        <option value="{{ $paymentMethod->name }}" @if($paymentMethod->name == $transaction->payment_method) selected @endif>{{ $paymentMethod->name }}</option>
                                    @endforeach
                                </select>
                                <x.form-errors fieldName="payment_method"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Transaction ID</label>
                                <input type="text" name="transaction_id" id="transaction_id" value="{{ old('transaction_id', $transaction->transaction_id) }}">
                                <x.form-errors fieldName="transaction_id"/>
                            </div>
                            <div class="col-md-6">
                                <label for="">Invoice ID</label>
                                <input type="text" name="invoice_id" id="invoice_id" value="{{ old('invoice_id', $transaction->invoice_id) }}">
                                <x.form-errors fieldName="invoice_id"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Description *</label>
                                <textarea name="description" id="description" cols="30" rows="10" class="tinyEditor" required>{{ old('description', $transaction->description) }}</textarea>
                                <x.form-errors fieldName="description"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-lg darkBlueBtn">Update Transaction</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
