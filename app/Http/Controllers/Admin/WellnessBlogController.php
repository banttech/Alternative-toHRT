<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;

class WellnessBlogController extends Controller
{
    public function index(Request $request)
    {
        $pagetitle = 'Manage Wellness Blog';
        $pageTitle = 'Alternative to HRT - Wellness Blog';
        if ($request->has('search')) {
            $search = $request->get('search');
            $wellness_blogs = DB::Table('wellness_blog')->where('title', 'like', '%' . $search . '%')
                ->orwhere('description', 'like', '%' . $search . '%')->orwhere('name', 'like', '%' . $search . '%')
                ->orderBy('id', 'desc')
                ->paginate(20);
            $blogcategorys = DB::table('blogcategory')->orderBy('id', 'desc')->get();
        } else {
            $wellness_blogs = DB::table('wellness_blog')->orderBy('id', 'desc')->paginate(20);
            $blogcategorys = DB::table('blogcategory')->get();
        }
        return view('admin.wellness_blog.index', compact('wellness_blogs', 'blogcategorys', 'pagetitle','pageTitle'));
    }

    public function create()
    {
        $pagetitle = 'Add Wellness Blog';
        $pageTitle = 'Alternative to HRT - Add Wellness Blog';
        $blogcategorys = DB::table('blogcategory')->get();
        return view('admin.wellness_blog.create', compact('pagetitle', 'blogcategorys','pageTitle'));
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required',
                'description' => 'required',
                'image' => 'required|image|mimes:jpg,png,jpeg|max:2048|dimensions:max_width=800,max_height=800',
                'name' => 'required',
               
                'slug' => 'required',

            ],
            [
                'title.required' => 'Title field is required',
               
                'description.required' => 'Description field is required',
                'image.dimensions' => "Image size can't exceeds the size 800px X 800px",
                'mimes' => 'Please upload valid image. Only JPG, JPEG and PNG extensions are allowed.',
                'image.required' => 'Image field is required',
                'name.required' => 'Name field is required',
                'slug.required' => 'Blog Slug field is required',

            ]
        );
        $image = $request->file('image');
        $name = time() . '_wellness_blog.' . $image->getClientOriginalExtension();

        $destinationPath = public_path('admin_assets/images');
        //$alreadyExist = public_path('admin-assets/images/'.$name);
        $image->move($destinationPath, $name);
        $image = $name;

        $wellness_blog = DB::table('wellness_blog')->insertGetId([

            'title' => $request->title,
            'description' => $request->description,
            'title' => $request->title,
            'image' => $image,
            'tags' => $request->tags,
            'name' => $request->name,
            'category_id' => $request->category_id,
            'slug' => Str::slug($request->slug, '-'),


        ]);
        return redirect()->route('wellness_blog')->with('success', 'Blog added successfully');
    }
    public function edit($id)
    {
        $pagetitle = 'Edit Wellness Blog';
        $pageTitle = 'Alternative to HRT - Edit Wellness Blog';
        $wellness_blogs = DB::table('wellness_blog')->where('id', $id)->first();
        $blogcategorys = DB::table('blogcategory')->get();
        return view('admin.wellness_blog.edit', compact('pagetitle', 'wellness_blogs', 'blogcategorys','pageTitle'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'name' => 'required',
            'date' => 'required',
            
            'slug' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg|max:2048|dimensions:max_width=800,max_height=800',


        ], [
            'title.required' => 'Title field is required',
            'title.required' => 'Date field is required',
            'description.required' => 'Description field is required',
            'name.required' => 'Name field is required',
            'slug.required' => 'Slug field is required',
            'image.dimensions' => "Image size can't exceeds the size 800px X 800px",
            'mimes' => 'Please upload valid image. Only JPG, JPEG and PNG extensions are allowed.',

        ]);

        $oldwellnessblog = DB::table('wellness_blog')->where('id', $id)->first();

        $image = '';
        if ($request->file('image')) {
            $image = $request->file('image');
            $name = time() . '_wellness_blog.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('admin_assets/images');
            $image->move($destinationPath, $name);
            $image = $name;
        } else {
            $image = $oldwellnessblog->image;
        }
        $wellness_blog = DB::table('wellness_blog')->where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'name' => $request->name,
            'date' => $request->date,
            'image' => $image,
            'slug' => Str::slug($request->slug, '-'),
            'tags' => $request->tags,
            'category_id' => $request->category_id,
        ]);
        return redirect()->route('wellness_blog')->with('success', 'Blog  updated successfully');
    }

    public function delete($id)
    {
        DB::table('wellness_blog')->where('id', $id)->delete();
        return redirect()->route('wellness_blog')->with('success', ' Blog  deleted successfully');
    }
}
