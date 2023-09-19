<?php

namespace App\Interfaces;

interface ReferalInterface
{
    public function getByFacilitatorId($userId);
    public function getById($id);
    public function store($userId, $data);
    public function update($id, $data);
    public function destroy($id);
    public function restore($id);
    public function getByUserEnrolledCourse($userId);
}
