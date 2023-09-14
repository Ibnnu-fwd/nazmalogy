<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Interfaces\GeneralTestimonialInterface;

class GeneralTestimonialController extends Controller
{
    private $generalTestimonial;
    private $user;

    public function __construct(GeneralTestimonialInterface $generalTestimonial)
    {
        $this->generalTestimonial = $generalTestimonial;
    }

    public function index()
    {
        return view('admin.general_testimonial.index',[
            'generalTestimonials' => $this->generalTestimonial->getAll(),
        ]);
    }

    public function show($id)
    {
        return response()->json($this->generalTestimonial->getById($id));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'rating' => 'required',
        ]);

        try {
            $this->generalTestimonial->store($request->all());
            return redirect()->back()->with('success', 'Testimonial berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Testimonial gagal ditambahkan');
        }
    }
    
    public function update($id, Request $request)
    {
        $request->validate([
            'title' => 'required',
            'rating' => 'required',

        ]);

        try {
            $this->generalTestimonial->update($id, $request->all());
            return redirect()->back()->with('success', 'Testimonial berhasil diupdate');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Testimonial gagal diupdate');
        }
    }

    public function destroy($id)
    {
        try {
            $this->generalTestimonial->destroy($id);
            return redirect()->back()->with('success', 'Testimonial berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Testimonial gagal dihapus');
        }
    }


}
