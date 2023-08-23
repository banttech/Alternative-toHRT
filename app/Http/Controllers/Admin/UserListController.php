<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;

class UserListController extends Controller
{
    public function index(Request $request){
        $pagetitle = 'Manage Users';
        $pageTitle = 'Alternative to HRT - Users List';
        if($request->has('search')){
            $search = $request->get('search');
            $users = DB::Table('users')
            ->where('firstname','like', '%' . $search . '%')->orwhere('lastname','like', '%' . $search . '%')->orwhere('email','like', '%' . $search . '%')
            ->orderBy('id','desc')->where('role_id','2')
            ->paginate(20);          
        }
        else{
            $users = DB::table('users')->where('role_id','2')->orderBy('id', 'desc')->paginate(20);
         }
        
           return view('admin.users.index',compact('users','pagetitle','pageTitle'));
     }
   
    public function create(){
        $pagetitle = 'Add User';
        $pageTitle = 'Alternative to HRT - Add User';
        return view('admin.users.create',compact('pagetitle','pageTitle'));
    }

    public function store(Request $request){
        $request->validate(
            [

            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed|regex:/[@$!%*#?&]/|regex:/[A-Z]/',
            'password_confirmation' => 'required|min:8|',
            'firstname' => 'required',
            'lastname' => 'required',
          ],
            [

            'email.required' => 'Email field  is required',
            'email.email' => 'Email is invalid',
            'email.unique' => 'Email already exists',
            'password.required' => 'Password field is required',
            'password_confirmation.required'=> 'Confirmation Password field is required',
            'password.regex'=>'Password must have at least 8 characters and contains uppercase letters, lowercase letters, numbers, and special characters',
            'firstname.required' => 'First Name field is required',
            'lastname.required' => 'Last Name field is required',
          ]
        );


        $users = DB::table('users')->insertGetId([

         'email' => $request->email,
         'password' =>Hash::make($request->password),
         'firstname' => $request->firstname,
         'lastname' =>$request->lastname,
         'role_id' => '2',
        ]);
        return redirect()->route('user')->with('success', 'User added successfully');

          
    }
    public function edit($id){
        $pagetitle = 'Edit User';
        $pageTitle = 'Alternative to HRT - Edit User';
        $users = DB::table('users')->where('id', $id)->first();
        return view('admin.users.edit',compact('pagetitle','users','pageTitle'));
    }

    public function update(Request $request, $id)
    {
  if ($request->password) {
      $request->validate(
        [

        'email' => 'required|email|unique:users,email,'.$id,
        'password' => 'min:8|regex:/[@$!%*#?&]/|regex:/[A-Z]/',
        'firstname' => 'required',
        'lastname' => 'required',
          ],
        [

        'email.required' => 'Email field  is required',
        'email.email' => 'Email field is invalid',
        'email.unique' => 'Email field already exists',
        'password.regex'=>'Password must have at least 8 characters and contains uppercase letters, lowercase letters, numbers, and special characters',
        'firstname.required' => 'First Name field is required',
        'lastname.required' => 'Last Name field is required',
          ]
        );
   }else{
    $request->validate(
        [

        'email' => 'required|email|unique:users,email,'.$id,
        'firstname' => 'required',
        'lastname' => 'required',
          ],
        [

        'email.required' => 'Email field is required',
        'email.email' => 'Email is invalid',
        'email.unique' => 'Email already exists',
        'firstname.required' => 'First Name field is required',
        'lastname.required' => 'Last Name field is required',
          ]
        );
}

    $users = DB::table('users')->where('id', $id)->update([

        'email' => $request->email,
        'password' =>Hash::make($request->password),
        'firstname' => $request->firstname,
        'lastname' =>$request->lastname,


        ]);
    return redirect()->route('user')->with('success', 'User  updated successfully');

    }
    public function delete($id){
        DB::table('users')->where('id',$id)->delete();
        return redirect()->route('user')->with('success', 'User deleted successfully');
    }

}
