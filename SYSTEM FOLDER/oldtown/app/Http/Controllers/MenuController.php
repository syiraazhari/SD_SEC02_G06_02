<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.menu.menus.view-menu');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = DB::table('categories')->get();

        return view('admin.menu.menus.add-menu')->with(['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'menu_images' => 'required|image|mimes:png,jpg,jpeg|max:5048',
            'menu_name' => 'required',
            'cost_price' => 'required',
            'selling_price' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'created_at' => now(),
        ]);


        if ($request->file('menu_images')) {
            $validatedData['menu_images'] = $request->file('menu_images')->store('menu_images');
        }

        Menu::create($validatedData);

        return redirect()
            ->route('menu-view')
            ->with('status', 'Menu Succesfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menus = Menu::where('id', $id)->get();

        return view('admin.menu.menus.view-single-menu')->with(['menus' => $menus]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menus = Menu::where('id', $id)->get();
        $categories = DB::table('categories')->get();

        return view('admin.menu.menus.edit-menu')
                ->with([
                    'menus' => $menus,
                    'categories' => $categories
                ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $menu = DB::table('menus')->where('id', $id);

        $validatedData = $request->validate([
            'menu_images' => 'image|mimes:png,jpg,jpeg|max:5048',
            'menu_name' => 'required',
            'cost_price' => 'required',
            'selling_price' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'created_at' => now(),
        ]);


        if($request->file('menu_images')){
            $validatedData['menu_images'] = $request->file('menu_images')->store('menu_images');
        }

        $menu->update($validatedData);

        return redirect()->route('menu-view')->with('status', 'Menu Succesfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $newarr = explode(',', $request->dataid);
        $id = $newarr[0];
        $image = $newarr[1];
        Storage::delete($image);
        DB::table('menus')->delete($id);
        return redirect(route('menu-view'));
    }
}
