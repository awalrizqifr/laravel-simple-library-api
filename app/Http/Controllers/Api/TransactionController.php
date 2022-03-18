<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransactionRequest;
use App\Http\Resources\TransactionResource;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('book', 'student')->get();
        return TransactionResource::collection($transactions);
    }

    public function store(TransactionRequest $request)
    {
        $transactions = Transaction::create($request->validated());
        return new TransactionResource($transactions);
    }

    public function show(Transaction $transaction)
    {
        return new TransactionResource($transaction);
    }

    public function update(Transaction $transaction, TransactionRequest $request)
    {
        $transaction->update($request->validated());
        return new TransactionResource($transaction);
    }

    public function destroy(Transaction $transaction) {
        $transaction->delete();
        return response()->noContent();
    }
}