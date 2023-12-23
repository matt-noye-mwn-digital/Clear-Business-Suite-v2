<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_time',
        'payment_method',
        'description',
        'amount_in',
        'amount_out',
        'fees',
        'transaction_id',
        'invoice_id',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function invoice(){
        return $this->belongsTo(Invoice::class);
    }
}
