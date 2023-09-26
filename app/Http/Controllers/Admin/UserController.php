<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }


    public function index()
    {
        return view('admin.users.index', [
            'users' => $this->user->all()
        ]);
    }

    public function show($id)
    {
        return response()->json($this->user->findOrFail($id));
    }

    public function destroy($id)
    {
        try {
            $this->user->findOrFail($id)->update(['is_active' => false]);
            return redirect()->back()->with('success', 'User berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'User gagal dihapus');
        }
    }

    public function restore($id)
    {
        try {
            $this->user->findOrFail($id)->update(['is_active' => true]);
            return redirect()->back()->with('success', 'User berhasil direstore');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'User gagal direstore');
        }
    }



}
