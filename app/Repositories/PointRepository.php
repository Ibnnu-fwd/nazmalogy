<?php

namespace App\Repositories;

use App\Interfaces\PointInterface;
use App\Models\Point;
use Illuminate\Support\Facades\DB;

class PointRepository implements PointInterface
{
    private $point;

    public function __construct(Point $point)
    {
        $this->point = $point;
    }

    public function getAll()
    {
        $data = $this->point
            ->select('user_id', DB::raw('SUM(amount) as points'))
            ->with('user')
            ->groupBy('user_id')
            ->get()
            ->map(function ($point) {
                return [
                    'id' => $point->user_id,
                    'name' => $point->user->fullname ?? 'Unknown', // Default to 'Unknown' if no user name is found
                    'points' => $point->points,
                ];
            });

        return $data;
    }

    public function getById($id)
    {
        return $this->point->findOrFail($id);
    }

    public function getByUserId($user_id)
    {
        $points = $this->point
            ->where('user_id', $user_id)
            ->with(['pointType', 'user'])
            ->orderBy('created_at', 'asc')
            ->get();

        $lastPoint = 0;

        foreach ($points as $point) {
            $point->last_point = $lastPoint;
            $point->total_point = $point->last_point + $point->amount;
            $lastPoint = $point->total_point;
        }

        return $points;
    }
}
