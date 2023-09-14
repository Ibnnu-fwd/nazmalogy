<?php

namespace App\Repositories;

use App\Interfaces\TransactionInterface;
use App\Models\Transaction;
use Illuminate\Support\Facades\Storage;

class TransactionRepository implements TransactionInterface
{
    private $transaction;

    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
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
}
