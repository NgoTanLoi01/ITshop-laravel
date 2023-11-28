<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Slider;

class HomeAdminController extends Controller
{
    public function index(){
        $sliders = Slider::latest()->get();
        $categorys = Category::where('parent_id', 0)->get();
        $products = Product::latest()->take(10)->get();
        $productsSelling = Product::latest('views_count', 'desc')->take(12)->get();
        $categorysLimit = Category::where('parent_id', 0)->take(6)->get();
        return view("home.home", compact("sliders", "categorys", "products","productsSelling", "categorysLimit"));
    }

}
