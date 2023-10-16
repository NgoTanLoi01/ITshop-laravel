<?php

namespace App\Http\Controllers;

use App\Components\Recusive;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    private $category ;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    public function index(){
        return view(view:'admin.product.index');
    }

    public function create(){
        $htmlOption = $this -> getCategory($parent_id =''); 
        return view('admin.product.add', compact(var_name: 'htmlOption'));
    }

    public function getCategory($parent_id) {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parent_id);
        return $htmlOption;
    }
    public function store(Request $request){
        $filename = $request->file('feature_image_path')->getClientOriginalName();
        $path = $request->file('feature_image_path')->storeAs('public/product', $filename);
    }
    
}
