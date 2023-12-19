<section class="singleInvoiceNav">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav>
                    <li class="invoiceNumber">
                        Invoice #{{ $invoice->invoice_number }}
                    </li>
                    <li>
                        <a href="{{ route('admin.invoices.edit', $invoice->id) }}" class="{{ Route::is('admin.invoices.edit') ? 'active' : '' }}">Summary</a>
                    </li>
                    <li>
                        <a class="addPaymentBtn @if($invoice->status != 'unpaid' || $invoice->status != 'collections' || $invoice->status != 'payment_pending') disabled @endif" href="{{ route('admin.invoices.add-payment-view', $invoice->id) }} {{ Route::is('admin.invoices.add-payment-view', $invoice->id) ? 'active' : '' }}" >Add Payment</a>
                    </li>
                    <li class="dropdown">
                        <a type="button" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">More</a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a href="">Mark as Draft</a>
                            </li>
                            <li>
                                <a href="">Mark as Unpaid</a>
                            </li>
                            <li>
                                <a href="">Mark as Paid</a>
                            </li>
                            <li>
                                <a href="">Mark as Cancelled </a>
                            </li>
                            <li>
                                <a href="">Mark as Refunded</a>
                            </li>
                            <li>
                                <a href="">Mark as Collections</a>
                            </li>
                            <li>
                                <a href="">
                                    Mark as Payment Pending
                                </a>
                            </li>
                            <hr>
                        </ul>
                    </li>
                </nav>
            </div>
        </div>
    </div>
</section>
