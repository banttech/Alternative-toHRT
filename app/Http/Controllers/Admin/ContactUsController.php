<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ContactUsController extends Controller
{
    public function index(Request $request){
        $pagetitle = 'Manage Contacts';
        $pageTitle = 'Alternative to HRT - Contacts';
        if($request->has('search')) {
            $search = $request->get('search');
            $contacts = DB::Table('contactus')->where('name','like', '%' . $search . '%')
            ->orwhere('email','like', '%' . $search . '%')->orwhere('phone_no','like', '%' . $search . '%')
            ->orderBy('id','desc')
            ->paginate(20);
        }else{
            $contacts = DB::table('contactus')->orderBy('id', 'desc')->paginate(20);
        }
        return view('admin.contactus.index',compact('pagetitle','contacts','pageTitle'));
    }

    public function search(Request $request)
    {
       
     
       $pagetitle = 'Manage Contacts';
        return view('admin.contactus.index', compact('contacts', 'pagetitle','search'));
    }
    public function delete($id){

        DB::table('contactus')->where('id',$id)->delete();
        
        return redirect()->route('contact')->with('success','Contact deleted successfully');
    }
}
