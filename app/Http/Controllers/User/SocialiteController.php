<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Point;
use App\Models\PointType;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $userFromGoogle   = Socialite::driver('google')->user();
        $userFromDatabase = User::where('google_id', $userFromGoogle->getId())->first();

        if ($userFromDatabase) {
            $pointType = PointType::where('name', 'login')->first();
            Point::create([
                'user_id'       => $userFromDatabase->id,
                'point_type_id' => $pointType->id,
                'amount'        => $pointType->amount,
                'description'   => 'User login',
            ]);

            auth()->login($userFromDatabase);
            return redirect()->route('user.dashboard.index');
        }

        $user = User::create([
            'fullname'  => $userFromGoogle->getName(),
            'email'     => $userFromGoogle->getEmail(),
            'google_id' => $userFromGoogle->getId(),
            'password'  => password_hash('password', PASSWORD_DEFAULT),
        ]);

        $pointType = PointType::where('name', 'register')->first();
        Point::create([
            'user_id'       => $user->id,
            'point_type_id' => $pointType->id,
            'amount'        => $pointType->amount,
            'description'   => 'New user register',
        ]);

        $pointType = PointType::where('name', 'login')->first();
        Point::create([
            'user_id'       => $user->id,
            'point_type_id' => $pointType->id,
            'amount'        => $pointType->amount,
            'description'   => 'User login',
        ]);

        auth()->login($user);
        session()->regenerate();

        return redirect()->route('user.dashboard.index');
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect()->route('login');
    }
}
