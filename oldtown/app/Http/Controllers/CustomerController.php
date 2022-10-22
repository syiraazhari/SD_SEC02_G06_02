<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index()
    {
        $category = DB::table('categories')->get()->first();
        return view('customer.index', compact('category'));
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
        return view('customer.view-all-menu')->with([
            'menus' => $menus,
            'categories' => $categories,
            'nameCategory' => $nameCategory
        ]);
    }

    public function viewItem($id)
    {
        $menu = Menu::find($id);
        return view('customer.single-menu')->with([
            'menu' => $menu
        ]);
    }
}