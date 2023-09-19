<?php

namespace App\Http\Controllers\User;

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
        return view('user.point.index', [
            'points' => $this->point->getByUserId(auth()->user()->id),
        ]);
    }
}
