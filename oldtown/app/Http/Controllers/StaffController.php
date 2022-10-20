<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
            'profile_images' => 'image|mimes:png,jpg,jpeg|max:5048',
            'first_name' => 'required|regex:/^[a-zA-Z]+$/u',
            'last_name' => 'required',
            'birthdate' => 'required|date',
            'contact_number' => 'required|phone:MY',
            'email' => 'email:rfc,dns|unique:users,email,',
            'address' => 'required',
            'created_at' => now()
        ]);

        if($request->file('profile_images')){
            $validatedData['profile_images'] = $request->file('profile_images')->store('profile_images');
        }

        $validatedData['birthdate'] = Carbon::createFromFormat('m/d/Y', $request->birthdate)->format('Y-m-d');

        User::create($validatedData);
        $this->sendMail($validatedData['email'], $validatedData['first_name'], $validatedData['last_name']);
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

        $validatedData = $request->validate([
            'profile_images' => 'image|mimes:png,jpg,jpeg|max:5048',
            'first_name' => 'required|regex:/^[a-zA-Z]+$/u',
            'last_name' => 'required',
            'birthdate' => 'required|date',
            'contact_number' => 'required|phone:MY',
            'email' => 'email:rfc,dns|unique:users,email,'.$id,
            'address' => 'required',
        ]);

        $validatedData['birthdate'] = Carbon::createFromFormat('m/d/Y', $request->birthdate)->format('Y-m-d');

        if($request->file('profile_images')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['profile_images'] = $request->profile_images->store('profile_images');
        }


        $staff->update($validatedData);

        return redirect()->route('view-staff')->with('status', 'Staff Succesfully Updated');
    }

    public function delete(Request $request)
    {
        $newarr = explode(',', $request->dataid);
        $id = $newarr[0];
        $image = $newarr[1];
        Storage::delete($image);
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
