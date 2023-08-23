<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    public function index(Request $request)
    {
        $pagetitle = 'Manage Brand';
        $pageTitle = 'Alternative to HRT - Brands';
        if($request->has('search')) {
           $search = $request->get('search');
          $brands = DB::Table('brand')->where('brandname', 'like', '%' . $search . '%')
          ->orderBy('id','desc')
          ->paginate(20);
       }else{
           $brands = DB::table('brand')->orderBy('id', 'desc')->paginate(20);
        }
           return view('admin.brand.index', compact('brands', 'pagetitle','pageTitle'));
            }


public function create()
{
    $pagetitle = 'Add Brand';
    $pageTitle = 'Alternative to HRT - Add Brand';
    return view('admin.brand.create', compact('pagetitle','pageTitle'));
}
      public function store(Request $request)
      {
          $request->validate(
              [
              'brandname' => 'required',
              'slug' => 'required',
          
          ],
              [
              'brandname.required' => 'Brand Name field is required',
              'slug.required' => 'Brand Sulg field is required',
              
          ]
          );
        $brand = DB::table('brand')->insertGetId([

           'brandname'=> $request->brandname,
           'slug'=>Str::slug( $request->slug,'-'),
           

            ]);
           
          return redirect()->route('brand')->with('success', 'Brand added successfully');

      }
      public function edit($id)
      {
          $pagetitle = 'Edit  Brand';
          $pageTitle = 'Alternative to HRT - Edit  Brand';
          $brands = DB::table('brand')->where('id', $id)->first();
          return view('admin.brand.edit', compact('pagetitle', 'brands','pageTitle'));
      }
    public function update(Request $request, $id)
    {
        $request->validate([
            'brandname' => 'required',
            'slug' => 'required',
          
        ],
            [
            'brandname.required' => 'Brand Name field is required',
            'slug.required' => 'Brand Sulg field is required',
          
        ]);
    $brand = DB::table('brand')->where('id', $id)->update([
        'brandname' => $request->brandname,
        'slug'=>Str::slug( $request->slug,'-'),
      ]);
        return redirect()->route('brand')->with('success', 'Brand  updated successfully');
    }
    
    public function delete($id)
    {
        DB::table('brand')->where('id', $id)->delete();
        return redirect()->route('brand')->with('success', 'Brand  deleted successfully');
    }

}
