<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\sub_catagory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Sub_catagoryController extends Controller
{
    //__index method__//
    public function index()
    {
        // $data = DB::table('sub_catagories')->leftJoin('categories', 'sub_catagories.category_id', 'categories.id')->select('categories.category_name', 'sub_catagories.*')->get();
        // return response()->json($data);
        $data = sub_catagory::all();
        return view('subcategory.index', compact('data'));
    }
    //__create method__//
    public function create()
    {
        $categories = Category::all();
        return view('subcategory.create', compact('categories'));
    }
    //__store method__//
    public function store(Request $request)
    {
        $validated = $request->validate([
            'subcategory_choose' => 'required',
            'subcategory_name' => 'required|unique:sub_catagories|max:255',
        ]);

        $subcategory = new sub_catagory();
        $subcategory->category_id = (int) $request->subcategory_choose;
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->subcategory_slug = Str::of($request->subcategory_name)->slug('_');
        $subcategory->save();

        $notification = array('message' => 'sub category inserted', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    //__destroy method__//
    public function destroy($id)
    {
        sub_catagory::destroy($id);
        $notification = array('message' => 'sub category deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
    //__edit method__//
    public function edit($id)
    {
        $categories = Category::all();
        $data = sub_catagory::find($id);
        return view('subcategory.edit', compact('categories', 'data'));
    }
    //__update method
    public function update(Request $request, $id)
    {
        $subcategory = sub_catagory::find($id);
        $subcategory->category_id = $request->subcategory_choose;
        $subcategory->subcategory_name = $request->subcategory_name;
        // $subcategory->subcategory_slug = Str::of($request->subcategory_name)->slug('_');
        $subcategory->save();

        // $subcategory->update();

        $notification = array('message' => 'subcategory updated!', 'alert-type' => 'success');
        return redirect()->route('subcategory.index')->with($notification);
    }
}
