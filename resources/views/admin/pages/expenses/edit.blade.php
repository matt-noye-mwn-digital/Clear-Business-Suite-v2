@extends('layouts.admin')
<x-admin.page-top
    pageTitle="Edit Expense {{ $expense->reference }}"
    pageStyles=""
    pageScripts=""
/>
@section('content')
    <x-admin.page-hero
        title="Edit Expense {{ $expense->reference }}"
        displayButton="yes"
        buttonContent="All Expenses"
        buttonLink="{{ route('admin.expenses.index') }}"
    />

    {{ Breadcrumbs::render('admin.expenses.create') }}

    <section class="pageMain">
        <div class="container">
            <div class="row">
                <x-admin.errors/>
                <form action="{{ route('admin.expenses.update', $expense->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-12">
                            <label for="">Name *</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $expense->name) }}" required>
                            @error('name')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="">Description</label>
                            <textarea name="description" id="description" cols="30" rows="10" class="tinyEditor">{{ old('description', $expense->description) }}</textarea>
                            @error('description')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Date *</label>
                            <input type="date" name="expense_date" id="expense_date" value="{{ old('expense_date', $expense->expense_date) }}" required>
                            @error('expense_date')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="">Client</label>
                            <select name="client_id" id="client_id">
                                <option selected disabled>-- Choose a client --</option>
                                @foreach($clients as $client)
                                    <option value="{{ $client->id }}" @if($client->id == $expense->client_id) selected @endif>{{ $client->first_name }} {{ $client->last_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="">Amount *</label>
                            <div class="input-group-amount">
                                <select name="currency_code" id="currency_code" class="input-group-text" required>
                                    @foreach($currencies as $currency)
                                        <option value="{{ $currency->symbol }}" @if($currency->symbol == '£' || $currency->symbol == $expense->currency_symbol) selected @endif>{{ $currency->symbol }}</option>
                                    @endforeach
                                </select>
                                <input type="number" name="amount" id="amount" class="form-control" step="any" value="{{ old('amount', $expense->amount) }}" required>
                            </div>
                            @error('amount')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Payment Method *</label>
                            <select name="payment_method_id" id="payment_method_id">
                                <option selected disabled>-- Choose a payment method --</option>
                                @foreach($paymentMethods as $paymentMethod)
                                    <option value="{{ $paymentMethod->id }}" @if($paymentMethod->id == $expense->payment_method_id) selected @endif>{{ $paymentMethod->name }}</option>
                                @endforeach
                            </select>
                            @error('payment_method')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="">Expense Type</label>
                            <input type="text" name="expense_type" id="expense_type" value="{{ old('expense_type', $expense->expense_type) }}">
                            @error('expense_type')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="">Reference</label>
                            <input type="text" name="reference" id="reference" value="{{ old('reference', $expense->reference) }}">
                            @error('reference')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-lg-flex justify-content-lg-end">
                            <button type="submit" class="btn btn-lg darkBlueBtn">Save</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </section>
@endsection
