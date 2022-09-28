<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\succesAddStaff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class StaffController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function viewAllStaff()
    {
        $staff = DB::table('users')->where('role', 'staff')->paginate(5);

        return view('admin.staff.view-staff')
                    ->with([
                        'allstaff' => $staff,
        ]);
    }

    public function viewAddStaff()
    {
        return view('admin.staff.add-staff');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'image' => 'image|mimes:png,jpg,jpeg|max:5048',
            'first_name' => 'required',
            'last_name' => 'required',
            'birthdate' => 'required',
            'contact_number' => 'required',
            'email' => 'required|unique:users,email,',
            'address' => 'required',
            'created_at' => now()
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('profile_images');
        }

        User::create($validatedData);
        $this->sendMail($request->email, $request->first_name, $request->last_name);

        return redirect()->route('view-staff')->with('status', 'Staff Succesfully Added');
    }

    public function show($id)
    {
        $staff = DB::table('users')->where('id', $id)->get();

        return view('admin.staff.view-single-staff')->with(['staff' => $staff]);
    }

    public function edit($id)
    {
        $staff = DB::table('users')->where('id', $id)->get();
        return view('admin.staff.edit-staff')->with(['staff' => $staff]);
    }

    public function update(Request $request, $id)
    {
        $staff = DB::table('users')->where('id', $id);
        $rules = [
            'image' => 'image|mimes:png,jpg,jpeg|max:5048',
            'first_name' => 'required',
            'last_name' => 'required',
            'birthdate' => 'required',
            'contact_number' => 'required',
            'email' => 'unique:users,email,'.$id,
            'address' => 'required'
        ];

        $validatedData = $request->validate($rules);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('profile_images');
        }

        $staff->update($validatedData);

        return redirect()->route('view-staff')->with('status', 'Staff Succesfully Updated');
    }

    public function delete($id)
    {
        DB::table('users')->delete($id);
        return redirect(route('view-staff'));
    }

    public function sendMail($email, $first_name, $last_name)
    {
        $name = $first_name . ' ' . $last_name;
        Mail::to($email)->send(new succesAddStaff($email, $name));
        return redirect()->route('view-staff')->with('status', 'Staff Succesfully Added');
    }


}
