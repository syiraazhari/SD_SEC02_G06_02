<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffCount = User::where('role', 'staff')->count();

        return view('staff.staff-dashboard', compact('staffCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $title = 'View Profile';
        $staff = Auth::user();

        return view('staff.pages.staff-view-profile')->with( 'staff', $staff);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $staff = Auth::user();

        return view('staff.pages.staff-edit-profile')->with('staff',$staff);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = Auth::id();

        $request->validate([
            'name' => 'required',
            'dob' => 'required',
            'contact_number' => 'required',
            'email' => 'unique:users,email,'.$id,
            'address' => 'required'
        ]);

        User::where('id', Auth::id())
                ->update([
                    'name' => $request->input('name'),
                    'birthdate' => $request->input('dob'),
                    'contact_number' => $request->input('contact_number'),
                    'email' => $request->input('email'),
                    'address' => $request->input('address'),
              ]);
        return redirect('/staff/profile')->with('status', 'Profile updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function viewChangePassword()
    {
        return view('staff.pages.change-password');
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
