<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function viewChangePassword($id)
    {
        return view('change-password');
    }

    public function changePassword(Request $request)
    {

        $user = User::find(Auth::id());
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required|min:8',
        ]);

        if(Hash::check($request->password, $user->password)){
            return back()->with('error', 'New password cannot be same as old');
        }

        $user->update([
            'password'=> Hash::make($request->password)
        ]);


        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('status', 'Password Changed');

    }
}
