<?php

use App\Models\Invoice;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('admin-invoices-index', function(BreadcrumbTrail $trail){
    $trail->parent('admin-dashboard');
    $trail->push('Invoices', route('admin.invoices.index'));
});
Breadcrumbs::for('admin-invoices-create', function(BreadcrumbTrail $trail){
    $trail->parent('admin-invoices-index');
    $trail->push('Create Invoice', route('admin.invoices.create'));
});
Breadcrumbs::for('admin-invoices-edit', function(BreadcrumbTrail $trail, Invoice $invoice){
    $trail->parent('admin-invoices-index');
    $trail->push('Edit Invoice ' . $invoice->invoice_number, route('admin.invoices.edit', $invoice->id));
});
Breadcrumbs::for('admin-invoices-add-payment', function(BreadcrumbTrail $trail, Invoice $invoice){
    $trail->parent('admin-invoices-index');
    $trail->push('Add Payment to Invoice ' . $invoice->invoice_number, route('admin.invoices.add-payment-view', $invoice->id));
});
