<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Order;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $orders = Order::all();
        return view('transactions.create', compact('orders'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'amount' => 'required|numeric',
            'payment_method' => 'required',
        ]);

        Transaction::create($validatedData);

        return redirect()->route('transactions.index')->with('success', 'Транзакция успешно создана.');
    }

    public function show(Transaction $transaction)
    {
        return view('transactions.show', compact('transaction'));
    }

    public function edit(Transaction $transaction)
    {
        $orders = Order::all();
        return view('transactions.edit', compact('transaction', 'orders'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $validatedData = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'amount' => 'required|numeric',
            'payment_method' => 'required',
        ]);

        $transaction->update($validatedData);

        return redirect()->route('transactions.index')->with('success', 'Транзакция успешно обновлена.');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('transactions.index')->with('success', 'Транзакция успешно удалена.');
    }
}
