<?php

namespace App\Repositories;

use App\Interfaces\PointTypeInterface;
use App\Models\Point;
use App\Models\PointType;

class PointTypeRepository implements PointTypeInterface
{
    private $pointType;
    private $point;

    public function __construct(PointType $pointType, Point $point)
    {
        $this->pointType = $pointType;
        $this->point     = $point;
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
        $pointType = $this->pointType->find($id)->update($data);
        $point     = $this->point->where('point_type_id', $id)->update(['amount' => $data['amount']]);

        return $pointType;
    }

    public function destroy($id)
    {
        return $this->pointType->find($id)->delete();
    }
}
