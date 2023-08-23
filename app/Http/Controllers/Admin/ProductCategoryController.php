<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;

class ProductCategoryController extends Controller
{
    public function index(Request $request)
    {
        $pagetitle = 'Manage Product Category';
        $pageTitle = 'Alternative to HRT - Product Category';
        if($request->has('search')) {
           $search = $request->get('search');
          $productcategorys = DB::Table('productcategory')->where('categoryname', 'like', '%' . $search . '%')
          ->orderBy('id','desc')
          ->paginate(20);
       }else{
           $productcategorys = DB::table('productcategory')->orderBy('id', 'desc')->paginate(20);
        }
           return view('admin.productcategory.index', compact('productcategorys', 'pagetitle','pageTitle'));
            }


public function create()
{
    $pagetitle = 'Add Product Category';
    $pageTitle = 'Alternative to HRT - Add Product Category';
    return view('admin.productcategory.create', compact('pagetitle','pageTitle'));
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
        $productcategory = DB::table('productcategory')->insertGetId([

           'categoryname'=> $request->categoryname,
           'slug'=>Str::slug( $request->slug,'-'),
           

            ]);
          return redirect()->route('productcategory')->with('success', 'Category added successfully');

      }
      public function edit($id)
      {
          $pagetitle = 'Edit Product Category';
          $pageTitle = 'Alternative to HRT - Edit Product Category';
          $productcategorys = DB::table('productcategory')->where('id', $id)->first();
          return view('admin.productcategory.edit', compact('pagetitle', 'productcategorys','pageTitle'));
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
    $productcategory = DB::table('productcategory')->where('id', $id)->update([
        'categoryname' => $request->categoryname,
        'slug'=>Str::slug( $request->slug,'-'),
      ]);
        return redirect()->route('productcategory')->with('success', 'Category  updated successfully');
    }
    
    public function delete($id)
    {
        DB::table('productcategory')->where('id', $id)->delete();
        return redirect()->route('productcategory')->with('success', 'Category  deleted successfully');
    }
}
