<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function index(){
        return view(view:'admin.product.index');
    }
}
