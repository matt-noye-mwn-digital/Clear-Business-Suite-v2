<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'invoice_date',
        'due_date',
        'invoice_number',
        'payment_method',
        'status',
        'invoice_discount',
        'tax_amount',
        'sub_total',
        'total'
    ];

    public function invoiceLineItem(){
        return $this->hasMany(InvoiceLineItem::class);
    }

    public function client(){
        return $this->belongsTo(User::class);
    }

    public function transaction(){
        return $this->hasMany(Transaction::class);
    }

    public function getStatus() {
        return match($this->status){
            'draft' => '<span class="badge text-bg-secondary">Draft</span>',
            'unpaid' => '<span class="badge text-bg-info">Unpaid</span>',
            'paid' => '<span class="badge text-bg-success">Paid</span>',
            'cancelled' => '<span class="badge text-bg-light">Cancelled</span>',
            'refunded' => '<span class="badge text-bg-info">Refunded</span>',
            'collections' => '<span class="badge text-bg-danger">Collections</span>',
            'payment_pending' => '<span class="badge text-bg-warning">Payment Pending</span>',
        };
    }
}
