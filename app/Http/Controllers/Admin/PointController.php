<?php

namespace App\Http\Controllers\Admin;

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
            'point' => $this->point->getAll(),
        ]);
    }

    public function show($id)
    {
        return response()->json($this->point->getById($id));
    }
}
