<?php

namespace App\Http\Controllers\Facilitator;

use App\Http\Controllers\Controller;
use App\Interfaces\ReferalInterface;
use Illuminate\Http\Request;

class ReferalController extends Controller
{
    private $referal;

    public function __construct(ReferalInterface $referal)
    {
        $this->referal = $referal;
    }

    public function index()
    {
        return view('facilitator.referal.index', [
            'referals' => $this->referal->getByFacilitatorId(auth()->user()->id)
        ]);
    }

    public function show($id)
    {
        return response()->json($this->referal->getById($id));
    }

    public function store(Request $request)
    {
        $request->validate([
            'expire_at' => 'required'
        ]);

        try {
            $this->referal->store(auth()->user()->id, $request->all());
            return redirect()->back()->with('success', 'Kode referal berhasil dibuat');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Kode referal gagal dibuat');
        }
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'expire_at' => 'required'
        ]);

        try {
            $this->referal->update($id, $request->all());
            return redirect()->back()->with('success', 'Kode referal berhasil diperbarui');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Kode referal gagal diperbarui');
        }
    }

    public function destroy($id)
    {
        $this->referal->destroy($id);
        return redirect()->back()->with('success', 'Kode referal berhasil dihapus');
    }

    public function restore($id)
    {
        $this->referal->restore($id);
        return redirect()->back()->with('success', 'Kode referal berhasil direstore');
    }
}
