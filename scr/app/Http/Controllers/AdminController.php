<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function loginAdmin(){ 
        return view('admin.home.index');
    }
    public function index()
    {
        return view('admin.home.index');
    }
    public function postloginAdmin(Request $request){
        
    }
}
