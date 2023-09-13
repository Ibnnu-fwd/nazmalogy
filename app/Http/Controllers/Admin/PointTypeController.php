<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\PointTypeInterface;
use Illuminate\Http\Request;

class PointTypeController extends Controller
{
    private $pointType;

    public function __construct(PointTypeInterface $pointType)
    {
        $this->pointType = $pointType;
    }

    public function index()
    {
        return view('admin.point_types.index', [
            'pointTypes' => $this->pointType->getAll(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:point_types,name',
            'amount' => 'required|integer|min:1',
        ]);

        try {
            $this->pointType->store($request->all());
            return redirect()->back()->with('success', 'Tipe poin berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Tipe poin gagal ditambahkan');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:point_types,name,' . $id,
            'amount' => 'required|integer|min:1',
        ]);

        try {
            $this->pointType->update($id, $request->all());
            return redirect()->back()->with('success', 'Tipe poin berhasil diperbarui');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Tipe poin gagal diperbarui');
        }
    }

    public function show($id)
    {
        return response()->json($this->pointType->getById($id));
    }

    public function destroy($id)
    {
        try {
            $this->pointType->destroy($id);
            return redirect()->back()->with('success', 'Tipe poin berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Tipe poin gagal dihapus');
        }
    }
}
