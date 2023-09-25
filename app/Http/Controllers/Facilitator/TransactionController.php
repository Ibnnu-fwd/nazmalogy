<?php

namespace App\Http\Controllers\Facilitator;

use App\Http\Controllers\Controller;
use App\Interfaces\TransactionInterface;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    private $transaction;

    public function __construct(TransactionInterface $transaction)
    {
        $this->transaction = $transaction;
    }

    public function index()
    {
        return view('facilitator.transaction.index', [
            'transactions' => $this->transaction->getByAuthorId(auth()->user()->id)
        ]);
    }

    public function show($id)
    {
        return view('facilitator.transaction.show', [
            'transaction' => $this->transaction->getById($id)
        ]);
    }

    public function changeStatus($id, Request $request)
    {
        try {
            $this->transaction->changeStatus($id, $request->status);
            return redirect()->back()->with('success', 'Status transaksi berhasil diubah');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->with('error', 'Status transaksi gagal diubah');
        }
    }
    
    public function uploadProof($id, Request $request)
    {
        $request->validate([
            'payment_proof_file' => ['required', 'mimes:jpg,jpeg,png', 'max:2048']
        ]);

        try {
            $this->transaction->uploadProof($id, $request->all());
            return redirect()->back()->with('success', 'Bukti pembayaran berhasil diupload');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->with('error', 'Bukti pembayaran gagal diupload');
        }
    }
}
