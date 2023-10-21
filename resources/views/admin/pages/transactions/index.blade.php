@extends('layouts.admin')
<x-admin.page-top
    pageTitle="Transactions"
    pageStyles=""
    pageScripts=""
/>
@section('content')
    <x-admin.page-hero
        title="All Transactions"
        displayButton="false"
    />

    <section class="pageMain transactionPageMain">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex justify-content-end mb-4">
                    <button type="button" class="darkBlueBtn addTransactionCollapseToggler" data-bs-toggle="collapse" data-bs-target="#addNewTransactionCollapse" aria-expanded="false">
                        Add Transaction <i class="fas fa-chevron-down"></i>
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="collapse" id="addNewTransactionCollapse">
                    <div class="col-12">
                        <form action="{{ route('admin.transactions.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Client</label>
                                    <select name="user_id" id="user_id">
                                        <option selected disabled>-- Select a client --</option>
                                        @foreach($clients as $client)
                                            <option value="{{ $client->id }}">{{ $client->first_name }} {{ $client->last_name }} - {{ $client->userDetails->company_name }}</option>
                                        @endforeach
                                    </select>
                                    <x.form-errors fieldName="user_id"/>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Date *</label>
                                    <input type="date" name="date_time" id="date_time" value="{{ old('date_time') }}" required>
                                    <x.form-errors fieldName="date_time"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="">Amount in</label>
                                    <input type="number" name="amount_in" id="amount_in" step="any" value="{{ old('amount_in') }}">
                                    <x.form-errors fieldName="amount_in"/>
                                </div>
                                <div class="col-md-3">
                                    <label for="">Amount out</label>
                                    <input type="number" name="amount_out" id="amount_out" step="any" value="{{ old('amount_out') }}">
                                    <x.form-errors fieldName="amount_out"/>
                                </div>
                                <div class="col-md-3">
                                    <label for="">Fees</label>
                                    <input type="number" name="fees" id="fees" step="any" value="{{ old('fees') }}">
                                    <x.form-errors fieldName="fees"/>
                                </div>
                                <div class="col-md-3">
                                    <label for="">Payment Method *</label>
                                    <select name="payment_method" id="payment_method" required>
                                        <option>-- Select a payment method --</option>
                                        @foreach($paymentMethods as $paymentMethod)
                                            <option value="{{ $paymentMethod->name }}">{{ $paymentMethod->name }}</option>
                                        @endforeach
                                    </select>
                                    <x.form-errors fieldName="payment_method"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Transaction ID</label>
                                    <input type="text" name="transaction_id" id="transaction_id" value="{{ old('transaction_id') }}">
                                    <x.form-errors fieldName="transaction_id"/>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Invoice ID</label>
                                    <input type="text" name="invoice_id" id="invoice_id" value="{{ old('invoice_id') }}">
                                    <x.form-errors fieldName="invoice_id"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="">Description *</label>
                                    <textarea name="description" id="description" cols="30" rows="10" class="tinyEditor" required>{{ old('description') }}</textarea>
                                    <x.form-errors fieldName="description"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-lg darkBlueBtn">Add Transaction</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <canvas id="transactionsLineChart"></canvas>
                    <script>
                        var ctx = document.getElementById('transactionsLineChart').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: [
                                    @foreach ($transactions as $transaction)
                                        '{{ $transaction->created_at->format('Y-m-d') }}',
                                    @endforeach
                                ],
                                datasets: [{
                                    label: 'Net Revenue',
                                    data: [
                                        @foreach ($transactions as $transaction)
                                            {{ $transaction->amount_in - $transaction->amount_out }},
                                        @endforeach
                                    ],
                                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                    borderColor: 'rgba(255, 99, 132, 1)',
                                    borderWidth: 1
                                },
                                    {
                                        label: 'Fees',
                                        data: [
                                            @foreach ($transactions as $transaction)
                                                {{ $transaction->fees }},
                                            @endforeach
                                        ],
                                        backgroundColor: 'rgba(255, 255, 132, 0.2)',
                                        borderColor: 'rgba(255, 255, 132, 1)',
                                        borderWidth: 1
                                    }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                }
                            }
                        });
                    </script>
                </div>
                <div class="col-md-4">
                    <div class="transactionAmountItem">
                        <div class="row align-items-center">
                            <div class="col-md-3">
                                <i class="fa-solid fa-coins"></i>
                            </div>
                            <div class="col-md-9">
                                <h5 class="">Total Income</h5>
                                <h3 class="">£{{ $totalAmountIn }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="transactionAmountItem">
                        <div class="row align-items-center">
                            <div class="col-md-3">
                                <i class="fa-solid fa-sterling-sign"></i>
                            </div>
                            <div class="col-md-9">
                                <h5 class="">Total Fees</h5>
                                <h3 class="">£{{ $totalFees }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="transactionAmountItem">
                        <div class="row align-items-center">
                            <div class="col-md-3">
                                <i class="fa-solid fa-calculator"></i>
                            </div>
                            <div class="col-md-9">
                                <h5 class="">Total Expense</h5>
                                <h3 class="">£{{ $totalAmountOut }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pageMain">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Client Name</th>
                                <th>Date</th>
                                <th>Payment Method</th>
                                <th>Description</th>
                                <th>Amount In</th>
                                <th>Amount Out</th>
                                <th>Fees</th>
                                <th class="actions">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transactions as $transaction)
                                <tr>
                                    <td>
                                        @if($transaction->user_id)
                                            <a href="{{ route('admin.clients.show', $transaction->user_id) }}">{{ $transaction->user->first_name }} {{ $transaction->user->last_name }}</a>
                                        @else
                                            --
                                        @endif
                                    </td>
                                    <td>
                                        {{ date('d/m/Y', strtotime($transaction->date_time)) }}
                                    </td>
                                    <td>{{ $transaction->payment_method }}</td>
                                    <td>{!! $transaction->description !!}</td>
                                    <td>£@if($transaction->amount_in){{ $transaction->amount_in }}@else 0.00 @endif</td>
                                    <td>£@if($transaction->amount_out){{ $transaction->amount_out }}@else 0.00 @endif</td>
                                    <td>£@if($transaction->fees){{ $transaction->fees }}@else 0.00 @endif</td>
                                    <td class="actions">
                                        <div class="btn-group">
                                            <a href="{{ route('admin.transactions.edit', $transaction->id) }}" class="edit-btn"><i class="fas fa-edit"></i></a>
                                            <a href="" class='confirm-delete-btn'><i class="fas fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mt-2">
                    {{ $transactions->links() }}
                </div>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function() {
            // Add a click event listener to the button
            $('button.addTransactionCollapseToggler').on('click', function() {
                // Check if the button has the 'collapsed' class
                if ($(this).hasClass('collapsed')) {
                    // If it has the 'collapsed' class, set the icon to fa-chevron-down
                    $(this).find('i').removeClass('fa-chevron-up').addClass('fa-chevron-down');
                } else {
                    // If it doesn't have the 'collapsed' class, set the icon to fa-chevron-up
                    $(this).find('i').removeClass('fa-chevron-down').addClass('fa-chevron-up');
                }
            });
        });
    </script>
@endsection
