<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'expense_date',
        'amount',
        'client_id',
        'currency_code',
        'currency_symbol',
        'payment_method_id',
        'reference',
        'expense_type',
        'receipt',
    ];

    public function client(){
        return $this->belongsTo(User::class, 'client_id');
    }
    public function paymentMethod(){
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id');
    }
}
