<?php

namespace App\Interfaces;

interface TransactionInterface
{
    public function getAll();
    public function getById($id);
    public function store($data);
    public function update($data, $id);
    public function destroy($id);

    public function getByUserId($userId);
    public function uploadProof($id, $data);
    public function changeStatus($id, $status);

    public function getByAuthorId($authorId);
    public function attemptReferral($transactionId, $refCode);
}
