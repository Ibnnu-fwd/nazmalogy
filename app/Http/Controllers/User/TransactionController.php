<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Interfaces\CourseInterface;
use App\Interfaces\ReferalInterface;
use App\Interfaces\TransactionInterface;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    private $transaction;
    private $referal;
    private $course;

    public function __construct(TransactionInterface $transaction, ReferalInterface $referal, CourseInterface $course)
    {
        $this->transaction = $transaction;
        $this->referal = $referal;
        $this->course = $course;
    }

    public function index()
    {
        return view('user.transaction.index', [
            'transactions' => $this->transaction->getByUserId(auth()->user()->id),
        ]);
    }

    public function detail($id)
    {
        $course = $this->transaction->getById($id)->course;
        return response()->json($this->referal->getByFacilitatorId($course->author_id));
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
            'redirect' => route('user.transaction.index')
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
        return view('user.transaction.show', [
            'transaction' => $this->transaction->getById($id)
        ]);
    }

    public function attemptReferral($id, Request $request)
    {
        $request->validate([
            'ref_code' => ['required', 'exists:referals,ref_code']
        ]);

        // dd($request->all(), $id);

        try {
            $this->transaction->attemptReferral($id, $request->ref_code);
            return redirect()->back()->with('success', 'Kode referral berhasil digunakan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
