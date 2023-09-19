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
        $this->referal     = $referal;
        $this->transaction = $transaction;
        $this->course      = $course;
    }

    public function getByFacilitatorId($userId)
    {
        return $this->referal
            ->where('user_id', $userId)
            ->where('expire_at', '>=', date('Y-m-d'))
            ->get();
    }

    public function getById($id)
    {
        return $this->referal->find($id);
    }

    public function store($userId, $data)
    {
        return $this->referal->create(array_merge($data, [
            'user_id'   => $userId,
            'expire_at' => date('Y-m-d', strtotime($data['expire_at'])),
            'ref_code'  => uniqid()
        ]));
    }

    public function update($id, $data)
    {
        return $this->referal->find($id)->update(array_merge($data, [
            'expire_at' => date('Y-m-d', strtotime($data['expire_at']))
        ]));
    }

    public function destroy($id)
    {
        return $this->referal->find($id)->update([
            'is_active' => '0'
        ]);
    }

    public function restore($id)
    {
        return $this->referal->find($id)->update([
            'is_active' => '1'
        ]);
    }

    public function getByUserEnrolledCourse($userId)
    {
        return $this->transaction
            ->where('user_id', $userId)
            ->where('status', Transaction::STATUS_PENDING)
            ->get()
            ->map(function ($transaction) {
                $course = $this->course
                    ->find($transaction->course_id);
                if ($course) {
                    $course->referral = $this->referal
                        ->where('user_id', $course->author_id)
                        ->first();
                    return $course;
                }
            })->filter()->values();
    }
}
