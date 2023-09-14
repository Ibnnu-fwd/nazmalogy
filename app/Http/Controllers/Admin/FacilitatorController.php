<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\FacilitatorInterface;
use Illuminate\Http\Request;

class FacilitatorController extends Controller
{
    private $facilitator;

    public function __construct(FacilitatorInterface $facilitator)
    {
        $this->facilitator = $facilitator;
    }

    public function index()
    {
        return view('admin.facilitator.index', [
            'facilitators' => $this->facilitator->getAll()
        ]);
    }

    public function show($id)
    {
        return response()->json($this->facilitator->getById($id));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fullname' => ['required'],
            'email'    => ['required', 'email', 'unique:users,email'],
        ]);

        try {
            $this->facilitator->store($request->all());
            return redirect()->back()->with('success', 'Facilitator berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Facilitator gagal ditambahkan');
        }
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'fullname' => ['required'],
            'email'    => ['required', 'email', 'unique:users,email,' . $id],
        ]);

        try {
            $this->facilitator->update($id, $request->all());
            return redirect()->back()->with('success', 'Facilitator berhasil diubah');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Facilitator gagal diubah');
        }
    }

    public function destroy($id)
    {
        try {
            $this->facilitator->destroy($id);
            return redirect()->back()->with('success', 'Facilitator berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Facilitator gagal dihapus');
        }
    }

    public function restore($id)
    {
        try {
            $this->facilitator->restore($id);
            return redirect()->back()->with('success', 'Facilitator berhasil dikembalikan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Facilitator gagal dikembalikan');
        }
    }
}
