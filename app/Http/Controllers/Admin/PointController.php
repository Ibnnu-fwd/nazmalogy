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

    public function index($users_id)
    {
        return view('admin.point.index', [
            'user_id'  => $users_id,
            'point' => $this->point->getByUserId($users_id),
        ]);
    }

    public function show($id)
    {
        return response()->json($this->point->getById($id));
    }
}
