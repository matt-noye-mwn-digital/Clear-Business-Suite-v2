<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TransactionStoreRequest;
use App\Models\PaymentMethod;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class AdminTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = User::role('client')->get();
        $paymentMethods = PaymentMethod::all();

        $totalAmountIn = Transaction::sum('amount_in');
        $totalAmountOut = Transaction::sum('amount_out');
        $totalFees = Transaction::sum('fees');

        $transactions = Transaction::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.pages.transactions.index', compact('transactions', 'clients', 'paymentMethods', 'totalAmountIn', 'totalAmountOut', 'totalFees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = User::role('client')->get();
        $paymentMethods = PaymentMethod::all();

        return view('admin.pages.transactions.create', compact('clients', 'paymentMethods'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TransactionStoreRequest $request)
    {
        Transaction::create([
            'date_time' => $request->date_time,
            'payment_method' => $request->payment_method,
            'description' => $request->description,
            'amount_in' => $request->amount_in,
            'amount_out' => $request->amount_out,
            'fees' => $request->fees,
            'transaction_id' => $request-> transaction_id,
            'invoice_id' => $request->invoice_id,
            'user_id' => $request->user_id,
        ]);

        activity()->log(auth()->user()->first_name . ' ' . auth()->user()->last_name . ' has added a new transaction');
        return redirect('admin/transactions')->with('success', 'New transaction added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $transaction = Transaction::findOrFail($id);

        $clients = User::role('client')->get();
        $paymentMethods = PaymentMethod::all();

        return view('admin.pages.transactions.edit', compact('transaction', 'clients', 'paymentMethods'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $transaction = Transaction::find($id);

        $transaction->update([
            'date_time' => $request->input('date_time'),
            'payment_method' => $request->input('payment_method'),
            'description' => $request->input('description'),
            'amount_in' => $request->input('amount_in'),
            'amount_out' => $request->input('amount_out'),
            'fees' => $request->input('fees'),
            'transaction_id' => $request->input('transaction_id'),
            'invoice_id' => $request->input('invoice_id'),
            'user_id' => $transaction->user_id,
        ]);

        activity()->log(auth()->user()->first_name . ' ' . auth()->user()->last_name . ' has updated a transaction');
        return redirect('admin/transactions')->with('success', 'Transaction has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaction = Transaction::find($id);
        $transaction->delete();

        activity()->log(auth()->user()->first_name . ' ' . auth()->user()->last_name . ' has deleted a transaction ('>$transaction->id.')');
        return redirect('admin/transactions')->with('success', 'Transaction deleted successfully');
    }
}
