@extends('layouts.admin')
<x-admin.page-top
    pageTitle="View Expense {{ $expense->reference }}"
/>
@section('content')
    <x-admin.page-hero
        title="View Expense {{ $expense->reference }}"
        displayButton="yes"
        buttonContent="All Expenses"
        buttonLink="{{ route('admin.expenses.index') }}"
    />

    <section class="pageMain">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table class="table w-100">
                        <tbody>
                            <tr>
                                <td><strong>Name</strong></td>
                                <td>{{ $expense->name }}</td>
                            </tr>
                            <tr>
                                <td><strong>Description</strong></td>
                                <td>{!! $expense->description !!}</td>
                            </tr>
                            <tr>
                                <td><strong>Date of Expense</strong></td>
                                <td>{{ date('d/m/Y', strtotime($expense->expense_date)) }}</td>
                            </tr>
                            <tr>
                                <td><strong>Amount</strong></td>
                                <td>{{ $expense->currency_symbol }}{{ $expense->amount }}</td>
                            </tr>
                            <tr>
                                <td><strong>Payment Method</strong></td>
                                <td>{{ $expense->paymentMethod->name }}</td>
                            </tr>
                            <tr>
                                <td><strong>Reference</strong></td>
                                <td>{{ $expense->reference }}</td>
                            </tr>
                            <tr>
                                <td><strong>Type of Expense</strong></td>
                                <td>
                                    @if($expense->expense_type)
                                        {{ $expense->expense_type }}
                                    @else
                                        --
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Receipt</strong></td>
                                <td>
                                    @if($expense->receipt)
                                        <a href="{{ Storage::url($expense->receipt) }}" target="_blank">
                                            <img class="img-fluid" src="{{ Storage::url($expense->receipt) }}" style="height: 300px; width: auto;">
                                        </a>
                                    @else
                                        No receipt available
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
