<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class PrivacyPolicyController extends Controller
{
    public function index(Request $request)
    {
        $pagetitle='Manage Privacy Policy';
        $privacy_policys = DB::table('privacy_policy')->orderBy('id', 'desc')->paginate(20);

        return view('admin.privacy_policy.index', compact('privacy_policys', 'pagetitle'));
    }


    public function create()
    {

        $pagetitle = 'Add Privacy Policy';
        $pageTitle = 'Alternative to HRT - Add Privacy Policy';

        $privacy_policys = DB::table('privacy_policy')->first();

        if($privacy_policys) {

            return redirect()->route('privacy-policy.edit', $privacy_policys->id);

        } else {
            return view('admin.privacy_policy.create', compact('pagetitle','pageTitle'));
        }


    }
    public function store(Request $request)
    {
        $request->validate(
            [
            'privacy_policy' => 'required',


          ],
            [
            'privacy_policy.required' => 'Privacy Policy field is required',


          ]
        );
        $privacy_policy = DB::table('privacy_policy')->insertGetId([

           'privacy_policy'=> $request->privacy_policy,



            ]);
        return redirect()->route('privacy-policy')->with('success', 'Privacy Policy added successfully');

    }
    public function edit($id)
    {
        $pagetitle = 'Edit Privacy Policy';
        $pageTitle = 'Alternative to HRT - Edit Privacy Policy';
        $privacy_policys = DB::table('privacy_policy')->where('id', $id)->first();
        return view('admin.privacy_policy.edit', compact('pagetitle', 'privacy_policys','pageTitle'));
    }
    public function update(Request $request, $id)
    {
        $request->validate(
            [
            'privacy_policy' => 'required',


          ],
            [
            'privacy_policy.required' => 'Privacy Policy field is required',



        ]
        );
        $privacy_policy = DB::table('privacy_policy')->where('id', $id)->update([
            'privacy_policy' => $request->privacy_policy,

          ]);
        return redirect()->route('privacy-policy')->with('success', 'Privacy Policy added successfully');
    }

    public function delete($id)
    {
        DB::table('privacy_policy')->where('id', $id)->delete();
        return redirect()->route('privacy-policy')->with('success', 'Privacy Policy deleted successfully');
    }

}
