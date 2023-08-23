<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class SuccessStoriesController extends Controller
{
    public function index(Request $request){
        $pagetitle = 'Manage Success Stories';
        $pageTitle = 'Alternative to HRT - Success Stories';

        if($request->has('search')){
            $search = $request->get('search');
            $success_stories = DB::Table('success_stories')
            ->where('description','like', '%' . $search . '%')->orwhere('name','like', '%' . $search . '%')
            ->orderBy('id','desc')
            ->paginate(20);          
        }
        else{
            $success_stories = DB::table('success_stories')->orderBy('id', 'desc')->paginate(20);
         }
        
           return view('admin.success_stories.index',compact('success_stories','pagetitle','pageTitle'));
     }
   
    public function create(){
        $pagetitle = 'Add Success Story';
        $pageTitle = 'Alternative to HRT - Add Success Story';
        return view('admin.success_stories.create',compact('pagetitle','pageTitle'));
    }

    public function store(Request $request){
        $request->validate([
            
            'description' => 'required',
            'name' => 'required',
          ],
          [
          
            'description.required' => 'Description field is required',
            'name.required' => 'Name field is required1',
          ]);
          $success_stories = DB::table('success_stories')->insertGetId([
          
           'description' => $request->description,
           'name' => $request->name

          ]);
          return redirect()->route('success_stories')->with('success', 'Story added successfully');
          
    }
    public function edit($id){
        $pagetitle = 'Edit Success Story';
        $pageTitle = 'Alternative to HRT - Edit Success Story';
        $success_stories = DB::table('success_stories')->where('id', $id)->first();
        return view('admin.success_stories.edit',compact('pagetitle','success_stories','pageTitle'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
          
            'description' => 'required',
            'name' => 'required',
    
        ], [
            
            'description.required' => 'Description field is required',
            'name.required' => 'Name field is required1',
    
        ]);

            $success_stories = DB::table('success_stories')->where('id', $id)->update([
           
            'description' => $request->description,
            'name' => $request->name,
            
        ]);
        return redirect()->route('success_stories')->with('success', 'Story  updated successfully');
    }
    public function delete($id){
        DB::table('success_stories')->where('id',$id)->delete();
        return redirect()->route('success_stories')->with('success', 'Story  deleted successfully');
    }
}
