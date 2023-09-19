<?php

namespace App\Http\Controllers\Facilitator;

use App\Http\Controllers\Controller;
use App\Interfaces\TransactionInterface;
use Illuminate\Http\Request;

class EnrollPaymentController extends Controller
{
    private $transaction;

    public function __construct(TransactionInterface $transaction)
    {
        $this->transaction = $transaction;
    }

    public function index()
    {
        return view('facilitator.enroll.index', [
            'transactions' => $this->transaction->getByUserId(auth()->user()->id)
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id'     => ['required', 'exists:courses,id'],
            'user_id'       => ['required', 'exists:users,id'],
            'price'         => ['required'],
            'sub_total'     => ['required'],
            'total_payment' => ['required'],
        ]);


        $this->transaction->store($request->all());
        return response()->json([
            'status' => true,
            'redirect' => route('facilitator.transaction-member.index')
        ]);
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

    public function show($id)
    {
        return view('facilitator.enroll.show', [
            'transaction' => $this->transaction->getById($id)
        ]);
    }
}
