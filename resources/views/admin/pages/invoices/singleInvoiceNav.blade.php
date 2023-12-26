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
                    @if($invoice->status != 'paid')
                        <li>
                            <a class="addPaymentBtn @if($invoice->status != 'unpaid' || $invoice->status != 'collections' || $invoice->status != 'payment_pending') disabled @endif" href="{{ route('admin.invoices.add-payment-view', $invoice->id) }} {{ Route::is('admin.invoices.add-payment-view', $invoice->id) ? 'active' : '' }}" >Add Payment</a>
                        </li>
                    @endif
                    <li class="dropdown">
                        <a type="button" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">More</a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <form action="{{ route('admin.invoices.mark-as-draft', $invoice->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit">Mark as Draft</button>
                                </form>
                            </li>
                            <li>
                                <form action="{{ route('admin.invoices.mark-as-unpaid', $invoice->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit">Mark as Unpaid</button>
                                </form>
                            </li>
                            <li>
                                <form action="{{ route('admin.invoices.mark-as-paid', $invoice->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit">Mark as Paid</button>
                                </form>
                            </li>
                            <li>
                                <form action="{{ route('admin.invoices.mark-as-cancelled', $invoice->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit">Mark as Cancelled</button>
                                </form>
                            </li>
                            <li>
                                <form action="{{ route('admin.invoices.mark-as-refunded', $invoice->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit">Mark as Refunded</button>
                                </form>
                            </li>
                            <li>
                                <form action="{{ route('admin.invoices.mark-as-collections', $invoice->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit">Mark as Collections</button>
                                </form>
                            </li>
                            <li>
                                <form action="{{ route('admin.invoices.mark-as-pending', $invoice->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit">Mark as Pending</button>
                                </form>
                            </li>
                            <hr>
                        </ul>
                    </li>
                </nav>
            </div>
        </div>
    </div>
</section>
