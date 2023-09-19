<?php

namespace App\Repositories;

use App\Interfaces\TransactionInterface;
use App\Models\AttemptReferal;
use App\Models\Point;
use App\Models\PointType;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TransactionRepository implements TransactionInterface
{
    private $transaction;
    private $attemptReferal;
    private $pointType;
    private $point;

    public function __construct(Transaction $transaction, AttemptReferal $attemptReferal, PointType $pointType, Point $point)
    {
        $this->transaction    = $transaction;
        $this->attemptReferal = $attemptReferal;
        $this->pointType      = $pointType;
        $this->point          = $point;
    }

    public function getAll()
    {
        return $this->transaction->with('user', 'course')->get();
    }

    public function getById($id)
    {
        return $this->transaction->with('user', 'course')->find($id);
    }

    public function store($data)
    {
        if ($data['total_payment'] == 0) {
            $data['status'] = Transaction::STATUS_CONFIRM;
        }

        return $this->transaction->create($data);
    }

    public function update($data, $id)
    {
        $transaction = $this->transaction->find($id);

        if (isset($data['payment_proof_file'])) {
            if ($transaction->payment_proof_file != null) {
                Storage::delete($transaction->payment_proof_file);
            }

            $filenameProof = uniqid() . '.' . $data['payment_proof_file']->extension();
            $data['payment_proof_file']->storeAs('public/payment_proof', $filenameProof);
            $data['payment_proof_file'] = $filenameProof;

            chmod(storage_path('app/public/payment_proof/' . $filenameProof), 0755);
        }

        return $transaction->update($data);
    }

    public function destroy($id)
    {
        $transaction = $this->transaction->find($id);

        if ($transaction->payment_proof_file != null) {
            Storage::delete($transaction->payment_proof_file);
        }

        return $transaction->delete();
    }

    public function getByUserId($userId)
    {
        return $this->transaction->with('user', 'course')->where('user_id', $userId)->get();
    }

    public function uploadProof($id, $data)
    {
        $transaction = $this->transaction->find($id);

        if ($transaction->payment_proof_file != null) {
            Storage::delete($transaction->payment_proof_file);
        }

        $filename = uniqid() . '.' . $data['payment_proof_file']->extension();
        $data['payment_proof_file']->storeAs('public/payment_proof', $filename);
        $data['payment_proof_file'] = $filename;

        chmod(storage_path('app/public/payment_proof/' . $filename), 0755);

        $data['status'] = Transaction::STATUS_PAID;
        return $transaction->update($data);
    }

    public function changeStatus($id, $status)
    {
        return $this->transaction->find($id)->update(['status' => $status]);
    }

    public function getbyAuthorId($authorId)
    {
        return $this->transaction->with('user', 'course')->whereHas('course', function ($query) use ($authorId) {
            $query->where('author_id', $authorId);
        })->get();
    }

    public function attemptReferral($transactionId, $refCode)
    {
        try {
            DB::beginTransaction();

            $transaction = $this->transaction->with('course')->find($transactionId);

            if ($this->isInvalidReferral($transaction, $refCode)) {
                return false;
            }

            $this->updateTransactionRefCode($transaction, $refCode);
            $this->createAttemptReferral($transactionId, $refCode);
            $pointType = $this->pointType->where('name', 'referral')->first();
            $this->createPointRecord(auth()->user()->id, $pointType->id, $pointType->amount, 'attempt referral: ' . $refCode . ' → ' . $transaction->user->fullname);
            $this->createPointRecord($transaction->course->author_id, $pointType->id, $pointType->amount, 'get attempt ref: ' . $refCode . ' → ' . $transaction->user->fullname);

            DB::commit();
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollBack();
            return false;
        }
    }

    private function isInvalidReferral($transaction, $refCode)
    {
        return $transaction->ref_code == $refCode || $transaction->course->author_id == auth()->user()->id;
    }

    private function updateTransactionRefCode($transaction, $refCode)
    {
        $transaction->ref_code = $refCode;
        $transaction->save();
    }

    private function createAttemptReferral($transactionId, $refCode)
    {
        $attemptReferal = $this->attemptReferal
            ->where('transaction_id', $transactionId)
            ->where('ref_code', $refCode)
            ->where('user_id', auth()->user()->id)
            ->first();

        if (!$attemptReferal) {
            $this->attemptReferal->create([
                'user_id'        => auth()->user()->id,
                'transaction_id' => $transactionId,
                'ref_code'       => $refCode,
                'is_success'     => true,
            ]);
        }
    }

    private function createPointRecord($userId, $pointTypeId, $amount, $description)
    {
        $this->point->create([
            'user_id'       => $userId,
            'point_type_id' => $pointTypeId,
            'amount'        => $amount,
            'description'   => $description,
        ]);
    }
}
