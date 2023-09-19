<?php

namespace App\Repositories;

use App\Interfaces\ReferalInterface;
use App\Models\Referal;

class ReferalRepository implements ReferalInterface
{
    private $referal;

    public function __construct(Referal $referal)
    {
        $this->referal = $referal;
    }

    public function getByFacilitatorId($userId)
    {
        return $this->referal->where('user_id', $userId)->get();
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
}
