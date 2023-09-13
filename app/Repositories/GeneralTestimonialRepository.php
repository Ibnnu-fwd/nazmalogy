<?php

namespace App\Repositories;

use App\Interfaces\GeneralTestimonialInterface;
use App\Models\GeneralTestimonial;

class GeneralTestimonialRepository implements GeneralTestimonialInterface
{
    private $generalTestimonial;

    public function __construct(GeneralTestimonial $generalTestimonial)
    {
        $this->generalTestimonial = $generalTestimonial;
    }

    public function getAll()
    {
        return $this->generalTestimonial->with('user')->get();
    }

    public function getById($id)
    {
        return $this->generalTestimonial->find($id);
    }

    public function store($data)
    {
        return $this->generalTestimonial->create($data);
    }

    public function update($id, $data)
    {
        return $this->generalTestimonial->where('id', $id)->update($data);
    }

    public function destroy($id)
    {
        return $this->generalTestimonial->destroy($id);
    }
}
