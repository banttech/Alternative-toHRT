<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class TermsConditionController extends Controller
{
    public function index(Request $request)
    {
        $pagetitle='Manage Terms And Conditions';
        $terms_conditions = DB::table('terms_conditions')->orderBy('id', 'desc')->paginate(20);

        return view('admin.terms_conditions.index', compact('terms_conditions', 'pagetitle'));
    }


    public function create()
    {
        $pagetitle = 'Add Terms And Conditions';
        $pageTitle = 'Alternative to HRT - Add Terms And Conditions';

        $terms_conditions = DB::table('terms_conditions')->orderBy('id', 'desc')->first();

        if($terms_conditions){

            return redirect()->route('terms-conditions.edit',$terms_conditions->id);

        }
    
        else{
            return view('admin.terms_conditions.create', compact('pagetitle','pageTitle'));
        }
       
       
    }
    public function store(Request $request)
    {
        $request->validate(
            [
            'terms_conditions' => 'required',


          ],
            [
            'terms_conditions.required' => 'Terms and conditions field is required',


          ]
        );
        $terms_conditions = DB::table('terms_conditions')->insertGetId([

           'terms_conditions'=> $request->terms_conditions,



            ]);
        return redirect()->route('terms-conditions')->with('success', 'Terms and conditions added successfully');

    }
    public function edit($id)
    {
        $pagetitle = 'Edit Terms And Conditions';
        $pageTitle = 'Alternative to HRT - Edit Terms And Conditions';
        $terms_conditions = DB::table('terms_conditions')->where('id', $id)->first();
        return view('admin.terms_conditions.edit', compact('pagetitle', 'terms_conditions','pageTitle'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'terms_conditions' => 'required',


          ],
            [
            'terms_conditions.required' => 'Terms And Conditions field is required',

          

        ]);
           $terms_conditions = DB::table('terms_conditions')->where('id', $id)->update([
        'terms_conditions' => $request->terms_conditions,
       
      ]);
      return redirect()->route('terms-conditions')->with('success', 'Terms and conditions added successfully');
    }

    public function delete($id)
    {
        DB::table('terms_conditions')->where('id', $id)->delete();
        return redirect()->route('terms-conditions')->with('success', 'Terms and conditions deleted successfully');
    }

}
