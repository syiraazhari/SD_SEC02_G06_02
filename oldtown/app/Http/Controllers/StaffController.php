<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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


    public function view($id)
    {
        $single = DB::table('users')->where('id', $id)->get();
        dd($single);
    }

}
