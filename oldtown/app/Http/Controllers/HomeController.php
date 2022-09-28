<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        return view('view-profile');
    }

    public function viewEditImage()
    {
        return view('change-image');
    }

    public function updateImage(Request $request)
    {
        $user = User::find(Auth::id());
        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg|max:5048'
        ]);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }

            $image = $request->image->store('profile_images');
        }

        $user->update([
            'profile_images' => $image
        ]);

        return redirect(route('view_profile'))->with('status', 'Image updated!');
    }

    public function edit()
    {
         return view('edit-profile')->with('user', Auth::user());
    }

    public function viewDashboard()
    {
        $staffCount = User::where('role', 'staff')->count() ;

        return view('dashboard')->with(['staffcount' => $staffCount]);
    }

    public function viewEditPassword()
    {
        return view('change-password');
    }

    public function updatePassword(Request $request)
    {
        $user = User::find(Auth::id());

        # Validation
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed|min:8'
        ]);

        //Match The Old Password
        if(!Hash::check($request->old_password, $user->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }

        //Check Password
        if(Hash::check($request->password, $user->password)){
            return back()->with('error', 'New password cannot be same as old');
        }


        $user->update([
            'password'=> Hash::make($request->password)
        ]);

        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('login'))->with('status', 'Password Changed');
    }


    public function update(Request $request)
    {
        $id = Auth::id();

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'dob' => 'required',
            'contact_number' => 'required',
            'email' => 'unique:users,email,'.$id,
            'address' => 'required'
        ]);

        User::where('id', Auth::id())
                ->update([
                    'first_name' => $request->input('first_name'),
                    'last_name' => $request->input('last_name'),
                    'birthdate' => $request->input('dob'),
                    'contact_number' => $request->input('contact_number'),
                    'email' => $request->input('email'),
                    'address' => $request->input('address'),
                    'updated_at' => now()
              ]);


        return redirect(route('view_profile'))->with('status', 'Profile updated!');

    }

}
