<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class BlogCommentsController extends Controller
{
   public function store(Request $request,$id){
  
    {
        $request->validate(
            [
            'name' => 'required',
            'email' => 'required',
           
            'message' => 'required',
        
        ],
            [
            'name.required' => 'Name field is required',
            'email.required' => 'Email field is required',
          
            'message.required' => 'Message field is required',
            
        ]
        );
      $comments = DB::table('comments')->insertGetId([
         'blog_id'=> $id,
         'name'=> $request->name,
         'email'=> $request->email,
         'your_website'=> $request->your_website,
         'message'=> $request->message,
         'status'=> 'disapproved',
        
          ]);
        return redirect()->back()->with('success', 'Please wait for the admin approval');

    }
   }
}
