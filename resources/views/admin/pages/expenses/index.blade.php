@extends('layouts.admin')

<x-admin.page-top
    pageTitle="All Expenses"
    pageStyles=""
    pageScripts=""
/>
@section('content')
    <x-admin.page-hero
        title="All Expenses"
        displayButton="yes"
        buttonContent="Create Expense"
        buttonLink="{{ route('admin.expenses.create') }}"
    />

    {{ Breadcrumbs::render('admin.expenses-index') }}

    <section class="pageMain">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table class="table w-100 table-hover clickableTable">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Amount</th>
                            <th>Reference #</th>
                            <th>Client</th>
                            <th>Payment Method</th>
                            <th class="actions">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($expenses as $expense)
                                <tr>
                                    <td>{{ $expense->name }}</td>
                                    <td>{{ $expense->currency_symbol }}{{ $expense->amount }}</td>
                                    <td>{{ $expense->reference }}</td>
                                    <td>
                                        @if($expense->client_id)
                                            {{ $expense->client->first_name }} {{ $expense->client->last_name }}
                                        @else
                                            --
                                        @endif
                                    </td>
                                    <td>
                                        {{ $expense->paymentMethod->name }}
                                    </td>
                                    <td class="actions">
                                        <div class="btn-group">
                                            <a href="{{ route('admin.expenses.show', $expense->id) }}" class="view-btn">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.expenses.edit', $expense->id) }}" class="edit-btn">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.expenses.destroy', $expense->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="confirm-delete-btn"><i class="fas fa-trash"></i></button>
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
