<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\Expense;
use App\Models\PaymentMethod;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenses = Expense::orderBy('expense_date', 'asc')
            ->get();
        return view('admin.pages.expenses.index', compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $currencies = Currency::all();
        $paymentMethods = PaymentMethod::all();
        $clients = User::role('client')->orderBy('id', 'asc')->get();
        return view('admin.pages.expenses.create', compact('currencies', 'paymentMethods', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'max:15000'],
            'expense_date' => ['required', 'date'],
            'amount' => ['required', 'numeric'],
            'client_id' => ['nullable', 'integer'],
            'currency_code' => ['nullable', 'string'],
            'currency_symbol' => ['nullable', 'string'],
            'payment_method_id' => ['required', 'integer'],
            'reference' => ['nullable', 'string', 'max:255'],
            'expense_type' => ['nullable', 'string', 'max:255'],
            'receipt' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg,webp'],
        ]);

        //setup the receipt image upload/captcha
        if($request->hasFile('receipt')){
            $receipt = $request->file('receipt');
            $fileName = time().'_'.$receipt->getClientOriginalName();
            $folder = 'public/expenses';

            $receiptPath = $receipt->storeAs($folder, $fileName);
        }
        else {
            $receiptPath = NULL;
        }

        $clientId = $request->input('client_id');

        if($clientId){
            $clientId = $validated['client_id'];
        }
        else {
            $clientId = NULL;
        }

        Expense::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'expense_date' => $validated['expense_date'],
            'client_id' => $clientId,
            'currency_code' => $validated['currency_code'],
            'currency_symbol' => $validated['currency_code'],
            'amount' => $validated['amount'],
            'payment_method_id' => $validated['payment_method_id'],
            'expense_type' => $validated['expense_type'],
            'reference' => $validated['reference'],
            'receipt' => $receiptPath,
        ]);

        activity()->log(auth()->user()->first_name . ' ' . auth()->user()->last_name . ' has recorded an expense with reference ' . $validated['reference']);

        return redirect('admin/expenses')->with('success', 'Expense created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $expense = Expense::findOrFail($id);

        return view('admin.pages.expenses.show', compact('expense'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $expense = Expense::findOrFail($id);

        $currencies = Currency::all();
        $paymentMethods = PaymentMethod::all();
        $clients = User::role('client')->orderBy('id', 'asc')->get();

        return view('admin.pages.expenses.edit', compact('expense', 'currencies', 'paymentMethods', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $expense = Expense::findOrFail($id);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'max:15000'],
            'expense_date' => ['required', 'date'],
            'amount' => ['required', 'numeric'],
            'client_id' => ['nullable', 'integer'],
            'currency_code' => ['nullable', 'string'],
            'currency_symbol' => ['nullable', 'string'],
            'payment_method_id' => ['required', 'integer'],
            'reference' => ['nullable', 'string', 'max:255'],
            'expense_type' => ['nullable', 'string', 'max:255'],
            'receipt' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg,webp'],
        ]);

        //setup the receipt image upload/captcha
        if($request->hasFile('receipt')){
            $receipt = $request->file('receipt');
            $fileName = time().'_'.$receipt->getClientOriginalName();
            $folder = 'public/expenses';

            $receiptPath = $receipt->storeAs($folder, $fileName);
        }
        else {
            $receiptPath = $expense->receipt;
        }

        $clientId = $request->input('client_id');

        if($clientId){
            $clientId = $validated['client_id'];
        }
        else {
            $clientId = NULL;
        }
        $expense->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'expense_date' => $validated['expense_date'],
            'client_id' => $clientId,
            'currency_code' => $validated['currency_code'],
            'currency_symbol' => $validated['currency_code'],
            'amount' => $validated['amount'],
            'payment_method_id' => $validated['payment_method_id'],
            'expense_type' => $validated['expense_type'],
            'reference' => $validated['reference'],
            'receipt' => $receiptPath,
        ]);

        activity()->log(auth()->user()->first_name . ' ' . auth()->user()->last_name . ' has updated an expense with reference ' . $validated['reference']);

        return redirect('admin/expenses')->with('success', 'Expense updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $expense = Expense::findOrFail($id);

        if($expense->receipt){
            Storage::delete($expense->receipt);
        }

        $expense->delete();

        return redirect('admin/expenses')->with('success', 'Expense deleted successfully');
    }
}
