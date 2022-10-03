<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DB::table('categories')->get();
        return view('admin.menu.category.categories')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.menu.category.add-category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|regex:^[a-zA-Z]+$^',
        ]);

        Category::create([
            'name' => $request->category,
            'created_at' => now(),
        ]);

        return redirect()
            ->route('category-view')
            ->with('status', 'Category Created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = DB::table('categories')
            ->where('id', $id)
            ->get();
        return view('admin.menu.category.edit-category')->with('category', $category);
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
        $category = DB::table('categories')->where('id', $id);

        $request->validate([
            'categories' => 'regex:^[a-zA-Z]+$^',
            'updated_at' => now(),
        ]);

        $category->update([
            'name' => $request->category,
            'updated_at' => now(),
        ]);

        return redirect()
            ->route('category-view')
            ->with('status', 'Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->dataid;
        DB::table('categories')->delete($id);
        return redirect()->route('category-view');
    }
}
