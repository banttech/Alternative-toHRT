<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
        $pageTitle = 'Alternative to HRT - Admin Dashboard';
    return view('admin.index',compact('pageTitle'));
    }
}
