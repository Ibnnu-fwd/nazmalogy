<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Point;
use App\Models\PointType;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'fullname' => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'min:8'],
        ]);

        $user = User::create([
            'fullname' => $request->fullname,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'user',
        ]);

        Point::create([
            'user_id'       => $user->id,
            'point_type_id' => PointType::where('name', 'register')->first()->id,
            'amount'        => 10,
        ]);

        event(new Registered($user));

        Auth::login($user);

        if ($user->role === 'admin') {
            return redirect(RouteServiceProvider::HOME);
        }

        if ($user->role === 'user') {
            return redirect(RouteServiceProvider::USER);
        }

        if ($user->role == 'facilitator') {
            return redirect(RouteServiceProvider::FACILITATOR);
        }

        Auth::logout();
    }
}
