<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class BlogCommentsController extends Controller
{
    public function index(Request $request)
    {
        $pagetitle = 'Manage Blog Comments';
        $pageTitle = 'Alternative to HRT - Blog Comments';
        if($request->has('search')) {
            $search = $request->get('search');
            $comments = DB::Table('comments')->where('name', 'like', '%' . $search . '%')->orwhere('email', 'like', '%' . $search . '%')->orwhere('phone', 'like', '%' . $search . '%')
            ->orderBy('id', 'desc')
            ->paginate(20);
        } else {
            $comments = DB::table('comments')->orderBy('id', 'desc')->paginate(20);
        }
        return view('admin.comments.index', compact('comments', 'pagetitle','pageTitle'));
    }


    public function approved($id)
    {
       
        $comments = DB::table('comments')->where('id', $id)->update([
            'status' =>'approved',
           
          ]);
        return redirect()->route('comment')->with('success', 'Status approved successfully');
    }


    public function disapproved($id)
    {
        $comments = DB::table('comments')->where('id', $id)->update([
            'status' =>'disapproved',
           
          ]);
        return redirect()->route('comment')->with('success', 'Status disapproved successfully');
    }

    public function delete($id)
    {
        DB::table('comments')->where('id', $id)->delete();
        return redirect()->route('comment')->with('success', 'Comment deleted successfully');
    }
}
