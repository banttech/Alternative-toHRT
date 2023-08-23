<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;

class BlogCategoryController extends Controller
{
    public function index(Request $request)
    {
        $pagetitle = 'Manage Blog Category';
        $pageTitle = 'Alternative to HRT - Blog Category';
        if($request->has('search')) {
           $search = $request->get('search');
          $blogcategorys = DB::Table('blogcategory')->where('categoryname', 'like', '%' . $search . '%')
          ->orderBy('id','desc')
          ->paginate(20);
       }else{
           $blogcategorys = DB::table('blogcategory')->orderBy('id', 'desc')->paginate(20);
        }
           return view('admin.blogcategory.index', compact('blogcategorys', 'pagetitle','pageTitle'));
            }


public function create()
{
    $pagetitle = 'Add Blog Category';
    $pageTitle = 'Alternative to HRT - Add Blog Category';
    return view('admin.blogcategory.create', compact('pagetitle','pageTitle'));
}
      public function store(Request $request)
      {
          $request->validate(
              [
              'categoryname' => 'required',
              'slug' => 'required',
          
          ],
              [
              'categoryname.required' => 'Category Name field is required',
              'slug.required' => 'Category Sulg field is required',
              
          ]
          );
        $blogcategory = DB::table('blogcategory')->insertGetId([

           'categoryname'=> $request->categoryname,
           'slug'=>Str::slug( $request->slug,'-'),
           

            ]);
          return redirect()->route('blogcategory')->with('success', 'Category added successfully');

      }
      public function edit($id)
      {
          $pagetitle = 'Edit Blog Category';
          $pageTitle = 'Alternative to HRT - Edit Blog Category';
          $blogcategorys = DB::table('blogcategory')->where('id', $id)->first();
          return view('admin.blogcategory.edit', compact('pagetitle', 'blogcategorys','pageTitle'));
      }
    public function update(Request $request, $id)
    {
        $request->validate([
            'categoryname' => 'required',
            'slug' => 'required',
          
        ],
            [
            'categoryname.required' => 'Category Name field is required',
            'slug.required' => 'Category Sulg field is required',
          
        ]);
    $blogcategory = DB::table('blogcategory')->where('id', $id)->update([
        'categoryname' => $request->categoryname,
        'slug'=>Str::slug( $request->slug,'-'),
      ]);
        return redirect()->route('blogcategory')->with('success', 'Category  updated successfully');
    }
    
    public function delete($id)
    {
        DB::table('blogcategory')->where('id', $id)->delete();
        return redirect()->route('blogcategory')->with('success', 'Category  deleted successfully');
    }
}
