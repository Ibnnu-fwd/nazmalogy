<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        return view('user.profile.index', [
            'user' => auth()->user()
        ]);
    }

    public function update($id, Request $request)
    {
        $user = $this->user->where('id', $id)->first();

        if ($request->hasFile('avatar')) {

            // check if user has avatar
            if ($user->avatar) {
                Storage::delete('public/avatar/' . $user->avatar);
            }

            $avatarFile = $request->file('avatar'); // Get the uploaded file
            $extension = $avatarFile->getClientOriginalExtension(); // Get the file extension
            $filenameAvatar = uniqid() . '.' . $extension; // Generate a unique filename with extension

            $avatarFile->storeAs('public/avatar', $filenameAvatar); // Store the file
            chmod(storage_path('app/public/avatar/' . $filenameAvatar), 0755);

            $user->avatar = $filenameAvatar;
        }

        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->phone = $request->phone;
        $user->birth = Carbon::parse($request->birth)->format('Y-m-d');

        $user->save();


        return redirect()->back()->with('success', 'Profile berhasil diupdate');
    }
}
