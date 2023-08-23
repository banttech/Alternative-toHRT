<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CountryController extends Controller
{
    public function index(Request $request)
    {
        $pagetitle = 'Manage Countries';
        $pageTitle = 'Alternative to HRT - Countries';
        if($request->has('search')) {
           $search = $request->get('search');
          $countries = DB::Table('countries')->where('countryname', 'like', '%' . $search . '%')
          ->orderBy('id','desc')
          ->paginate(20);
       }else{
        $countries = DB::Table('countries')->orderBy('id', 'desc')->paginate(20);
        }
           return view('admin.countries.index', compact('countries', 'pagetitle','pageTitle'));
            }


public function create()
{
    $pagetitle = 'Add Country';
    $pageTitle = 'Alternative to HRT - Add Country';
    return view('admin.countries.create', compact('pagetitle','pageTitle'));
}
      public function store(Request $request)
      {
          $request->validate(
              [
              'countryname' => 'required',
              
          
          ],
              [
              'countryname.required' => 'Country Name field is required',
              
              
          ]
          );
        $countries = DB::table('countries')->insertGetId([

           'countryname'=> $request->countryname,
           
           

            ]);
          return redirect()->route('country')->with('success', 'Country added successfully');

      }
      public function edit($id)
      {
          $pagetitle = 'Edit  Country';
          $pageTitle = 'Alternative to HRT - Edit  Country';
          $countries = DB::table('countries')->where('id', $id)->first();
          return view('admin.countries.edit', compact('pagetitle', 'countries','pageTitle'));
      }
    public function update(Request $request, $id)
    {
        $request->validate([
            'countryname' => 'required',
           
          
        ],
            [
            'countryname.required' => 'Country Name field is required',
           
          
        ]);
    $countries = DB::table('countries')->where('id', $id)->update([
        'countryname' => $request->countryname,
        
      ]);
        return redirect()->route('country')->with('success', 'Country  updated successfully');
    }
    
    public function delete($id)
    {
        DB::table('countries')->where('id', $id)->delete();
        return redirect()->route('country')->with('success', 'Country  deleted successfully');
    }

}
