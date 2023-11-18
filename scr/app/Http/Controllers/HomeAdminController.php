<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeAdminController extends Controller
{
    public function index(){
        return view("home.home");
    }

    public function test(){
        return view("test");
    }
}
