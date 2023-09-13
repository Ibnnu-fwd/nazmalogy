<?php

namespace App\Repositories;

use App\Interfaces\PointTypeInterface;
use App\Models\PointType;

class PointTypeRepository implements PointTypeInterface
{
    private $pointType;

    public function __construct(PointType $pointType)
    {
        $this->pointType = $pointType;
    }

    public function getAll()
    {
        return $this->pointType->all();
    }

    public function getById($id)
    {
        return $this->pointType->find($id);
    }

    public function store($data)
    {
        return $this->pointType->create($data);
    }

    public function update($id, $data)
    {
        return $this->pointType->find($id)->update($data);
    }

    public function destroy($id)
    {
        return $this->pointType->find($id)->delete();
    }
}
