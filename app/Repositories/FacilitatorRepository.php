<?php

namespace App\Repositories;

use App\Interfaces\FacilitatorInterface;
use App\Models\User;

class FacilitatorRepository implements FacilitatorInterface
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getAll()
    {
        return $this->user->where('role', 'facilitator')->get();
    }

    public function getById($id)
    {
        return $this->user->where('role', 'facilitator')->findOrFail($id);
    }

    public function store($data)
    {
        $data['role'] = 'facilitator';
        $data['password'] = password_hash('password', PASSWORD_DEFAULT);
        return $this->user->create($data);
    }

    public function update($id, $data)
    {
        $facilitator = $this->user->where('role', 'facilitator')->findOrFail($id);
        $facilitator->update($data);
        return $facilitator;
    }

    public function destroy($id)
    {
        return $this->user->where('role', 'facilitator')->findOrFail($id)->update(['is_active' => false]);
    }

    public function restore($id)
    {
        return $this->user->where('role', 'facilitator')->findOrFail($id)->update(['is_active' => true]);
    }
}
