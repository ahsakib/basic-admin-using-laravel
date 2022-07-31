<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\sub_catagory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Image;

class PostController extends Controller
{
    //__create method__//
    public function create()
    {
        $categories = Category::all();
        // $subcategories = sub_catagory::all();
        return view('post.create', compact('categories'));
    }
    //__store method with image__//
    public function store(Request $request)
    {
        $validated = $request->validate([

            'subcategory_id' => 'required',
            'tags' => 'required',
            'description' => 'required',
            'title' => 'required',
            // 'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);
        // dd($request->all());

        // $categories = sub_catagory::where('id', $request->subcategory_id)->first()->category_id;
        // $slug = Str::of($request->title)->slug('_');
        // $photo = $request->image;

        // if ($photo) {
        //     $photoname = $slug . '.' . $photo->getClientOriginalExtension();
        //     $imagepath = public_path() . '/media/';
        //     Image::make($photo)->resize(400, 600)->save($imagepath . $photoname);
        //     // $photo->move($imagepath, $photoname);
        //     Post::insert([
        //         'title' => $request->title,
        //         'category_id' => $categories,
        //         'subcategory_id' => $request->subcategory_id,
        //         'user_id' => Auth::id(),
        //         'slug' => $slug,
        //         'post_date' => $request->post_date,
        //         'description' => $request->description,
        //         'tags' => $request->tags,
        //         'status' => $request->status,
        //         'image' => 'public/media/' . $photoname,
        //     ]);
        // }

        $category_id = sub_catagory::where('id', $request->subcategory_id)->first()->category_id;

        $slug = Str::of($request->title)->slug('_');

        $post = new Post();
        $photo = $request->image;
        $post->category_id = $category_id;
        $post->subcategory_id = $request->subcategory_id;
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->slug = $slug;
        $post->post_date = $request->post_date;
        $post->description = $request->description;
        $post->tags = $request->tags;
        $post->status = $request->status;

        if ($photo) {
            $photopath = public_path() . '/media/';
            $photoname = $slug . '.' . $photo->getClientOriginalExtension();
            Image::make($photo)->resize(400, 600)->save($photopath . $photoname);
            $post->image = '/media/' . $photoname;
            $post->save();
            $notification = array('message' => 'data inserted', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }

        $post->save();
        $notification = array('message' => 'data inserted without image', 'alert-type' => 'success');
        return redirect()->back()->with($notification);

        // $notification = array('message' => 'data inserted', 'alert-type' => 'success');
        // return redirect()->back()->with($notification);
    }
    //__index method__//
    public function index()
    {
        $post = Post::all();
        return view('post.index', compact('post'));
    }
    //__delete method__//
    public function destroy($id)
    {
        $post = Post::find($id);
        // dd($post->image);

        $destination = public_path() . $post->image;
        // dd($destination);
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $post->delete();
        $notification = array('message' => 'data delete', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    //__edit method__//
    public function edit($id)
    {
        $post = Post::find($id);
        $category = Category::all();
        $subcategory = sub_catagory::all();
        return view('post.edit', compact('post', 'category', 'subcategory'));
    }
    //__update method__//
    public function update(Request $request, $id)
    {
        $validated = $request->validate([

            'subcategory_id' => 'required',
            'tags' => 'required',
            'description' => 'required',
            'title' => 'required',
        ]);
        $category_id = sub_catagory::where('id', $request->subcategory_id)->first()->category_id;

        $slug = Str::of($request->title)->slug('_');

        $post = Post::find($id);
        $photo = $request->image;
        $post->category_id = $category_id;
        $post->subcategory_id = $request->subcategory_id;
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->slug = $slug;
        $post->post_date = $request->post_date;
        $post->description = $request->description;
        $post->tags = $request->tags;
        $post->status = $request->status;

        if ($photo) {
            // $destination = public_path() . $post->image;
            if (File::exists($request->old_image)) {
                File::delete($request->old_image);
            }
            $photopath = public_path() . '/media/';
            $photoname = $slug . '.' . $photo->getClientOriginalExtension();
            Image::make($photo)->resize(400, 600)->save($photopath . $photoname);
            $post->image = '/media/' . $photoname;
            $post->update();
            $notification = array('message' => 'data inserted', 'alert-type' => 'success');
            return redirect()->route('post.index')->with($notification);
        }

        $post->update();
        $notification = array('message' => 'data inserted without image', 'alert-type' => 'success');
        return redirect()->route('post.index')->with($notification);
    }
}
