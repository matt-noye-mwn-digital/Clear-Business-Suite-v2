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
                        <thead></thead>
                        <tbody>
                            @foreach($expenses as $expense)

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
