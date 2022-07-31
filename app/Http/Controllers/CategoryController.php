<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        //__query builder__
        // $category=DB::table('categories')->get();

        //__Eloquent orm__
        $category = Category::all();
        return view('category.index', compact('category'));
    }
    public function create()
    {
        return view('category.create');

    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ]);
        // $category = new Category();
        // $category->category_name = $request->category_name;
        // $category->category_slug = Str::of($request->category_name)->slug('_');
        // $category->save();

        Category::insert([
            'category_name' => $request->category_name,
            'category_slug' => Str::of($request->category_name)->slug('_'),
        ]);

        // return redirect()->back();
        $notification = array('message' => 'category inserted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);

    }
    public function edit($id)
    {
        $data = DB::table('categories')->where('id', $id)->first();
        return view('category.edit', compact('data'));
    }
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->update([
            'category_name' => $request->category_name,
            'category_slug' => Str::of($request->category_name)->slug('_'),
        ]);
        // return redirect()->route('category.index');
        $notification = array('message' => 'category updated!', 'alert-type' => 'success');
        return redirect()->route('category.index')->with($notification);
    }
    public function destroy($id)
    {
        // Category::find($id)->delete();
        Category::destroy($id);
        // return redirect()->back();
        $notification = array('message' => 'category delete!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);

    }
}
