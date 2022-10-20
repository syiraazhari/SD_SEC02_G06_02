<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customer.homepage');
    }

    public function viewAboutUs()
    {
        return view('customer.about-us');
    }

    public function viewContactUs()
    {
        return view('customer.contact-us');
    }

    public function viewMenu($id)
    {
        $menus = DB::table('menus')->where('category_id', $id)->get();
        $categories = DB::table('categories')->get();
        $nameCategory = Category::where('id', '=', $id)->first();
        return view('customer.view-menu')->with([
            'menus' => $menus,
            'categories' => $categories,
            'nameCategory' => $nameCategory
        ]);
    }

    public function viewItem($id)
    {
        $menu = DB::table('menus')->where('id', $id)->get()->first();
        return view('customer.menu-item')->with([
            'menu' => $menu
        ]);
    }
}
