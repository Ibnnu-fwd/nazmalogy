<?php

namespace App\Http\Controllers\Facilitator;

use App\Http\Controllers\Controller;
use App\Interfaces\PointInterface;
use Illuminate\Http\Request;

class PointController extends Controller
{
    private $point;

    public function __construct(PointInterface $point)
    {
        $this->point = $point;
    }

    public function index()
    {
        return view('admin.point.index', [
            'points' => $this->point->getAll(),
        ]);
    }

    public function show($id)
    {
        return response()->json($this->point->getById($id));
    }

    public function history($id)
    {
        return view('admin.point.history', [
            'points' => $this->point->getByUserId($id),
        ]);
    }
}
