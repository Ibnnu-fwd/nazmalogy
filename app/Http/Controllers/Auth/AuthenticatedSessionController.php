<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Point;
use App\Models\PointType;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Menampilkan form login.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /*
    * Memproses login.
    */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        $user = Auth::user();

        $role = $user->role;

        if ($role === 'admin') {
            return redirect()->intended(RouteServiceProvider::HOME);
        } elseif ($role === 'user') {
            $pointType = PointType::where('name', 'login')->first();
            $point     = Point::where('user_id', $user->id)->latest()->first();

            if (!$point || $point->created_at->diffInHours(now()) >= 24) {
                Point::create([
                    'user_id'       => $user->id,
                    'point_type_id' => $pointType->id,
                    'amount'        => $pointType->amount,
                ]);
            }

            return redirect('/');
        } elseif ($role === 'facilitator') {
            return redirect()->route('facilitator.index');
        }

        // Handle other roles or scenarios here if needed

        // logout
        Auth::logout();
        return redirect()->back()->with('error', 'Akun tidak ditemukan');
    }


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
