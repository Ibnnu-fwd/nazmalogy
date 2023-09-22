<?php

namespace App\Repositories;

use App\Interfaces\ReferalInterface;
use App\Models\Course;
use App\Models\Referal;
use App\Models\Transaction;

class ReferalRepository implements ReferalInterface
{
    private $referal;
    private $transaction;
    private $course;

    public function __construct(Referal $referal, Transaction $transaction, Course $course)
    {
        $this->referal = $referal;
        $this->transaction = $transaction;
        $this->course = $course;
    }

    public function getByFacilitatorId($userId)
    {
        return $this->referal
            ->where('user_id', $userId)
            ->get();
    }

    public function getById($id)
    {
        return $this->referal->find($id);
    }

    public function store($userId, $data)
    {
        $expireDate = \Carbon\Carbon::parse($data['expire_at']);
        $currentDate = \Carbon\Carbon::now();

        // Memastikan tanggal kadaluarsa tidak kurang dari hari ini
        if ($expireDate->lessThan($currentDate)) {
            throw new \Exception('Tanggal kadaluarsa tidak valid.');
        }

        $referal = $this->referal->create([
            'user_id' => $userId,
            'expire_at' => $expireDate,
            'ref_code' => uniqid(),
            'is_active' => 1, // Set data sebagai aktif saat pertama kali dibuat
        ]);

        // Memeriksa dan menghapus data yang telah kadaluarsa
        return $referal;
    }

    public function update($id, $data)
    {
        return $this->referal->find($id)->update(
            array_merge($data, [
                'expire_at' => date('Y-m-d', strtotime($data['expire_at'])),
            ]),
        );
    }

    public function autoDeleteExpiredData()
    {
        $currentDate = \Carbon\Carbon::now();

        // Menghapus data yang telah kadaluarsa
        $this->referal->where('expire_at', '<', $currentDate)->delete();
        // membuat data yang telah kadaluarsa menjadi tidak aktif
        // $this->referal->where('expire_at', '<', $currentDate)->update([
        //     'is_active' => 0,
        // ]);
    }

    public function destroy()
    {
        $this->autoDeleteExpiredData();
    }

    public function restore($id)
    {
        return $this->referal->find($id)->update([
            'is_active' => 1, // Mengubah status is_active menjadi true
        ]);
    }

    public function getByUserEnrolledCourse($userId)
    {
        return $this->transaction
            ->where('user_id', $userId)
            ->where('status', Transaction::STATUS_PENDING)
            ->get()
            ->map(function ($transaction) {
                $course = $this->course->find($transaction->course_id);
                if ($course) {
                    $course->referral = $this->referal->where('user_id', $course->author_id)->first();
                    return $course;
                }
            })
            ->filter()
            ->values();
    }
}
