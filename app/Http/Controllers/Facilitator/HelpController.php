<?php

namespace App\Http\Controllers\Facilitator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HelpController extends Controller
{
    public function index()
    {
        return view('facilitator.help.index');
    }
}
