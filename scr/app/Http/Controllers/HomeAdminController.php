<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class HomeAdminController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->get();
        $categorys = Category::where('parent_id', 0)->get();
        $products = Product::latest()->take(10)->get();
        $productsSelling = Product::latest('views_count', 'desc')->take(12)->get();
        //$productsFeatures = Product::latest('features', 'desc')->take(12)->get();
        $categorysLimit = Category::where('parent_id', 0)->take(6)->get();

        return view("home.home", compact("sliders", "categorys", "products", "productsSelling", "categorysLimit"));
    }

    public function detail($slug)
    {
        $product = Product::where("slug", $slug)->first();
        $related = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->get();
        return view('home.detail', compact('product', 'related'));
    }

    public function search(Request $request)
    {
        $keywords = $request->keywords_submit;
        $productsSelling = Product::latest('views_count', 'desc')->take(12)->get();
        $search_product = DB::table('products')->where('name', 'like', '%' . $keywords . '%')->get();
        return view("home.search", compact("productsSelling"))->with('search_product', $search_product);
    }

    public function product_all(Request $request)
    {
        $products = Product::latest()->get();
        return view('home.product_all', compact('products'));
    }

    public function yeu_thich()
    {
        return view('home.yeu_thich');
    }

    public function lien_he()
    {
        return view('home.lien_he');
    }

    // public function send_mail()
    // {
    //     $to_name = "NGO TAN LOI Digital Technologies";
    //     $to_email = "ngotanloi2424@gmail.com";

    //     $data = array(
    //         "name" => $to_name,
    //         "body" => 'Cảm ơn bạn đã đặt hàng. Đơn hàng của bạn đang được xử lý.'
    //     );

    //     Mail::send("home.send_mail", $data, function ($message) use ($to_name, $to_email) {
    //         $message->to($to_email)->subject('Thông tin đơn hàng');
    //         $message->from($to_email, $to_name);

    //         // Sử dụng attach thay vì embed
    //         $message->attach(public_path('AdminLTE/dist/img/login_logo.png'), [
    //             'as' => 'logo',
    //             'mime' => 'image/png', // Kiểu MIME của hình ảnh
    //         ]);
    //     });

    //     return redirect('/manage-order')->with('message', '');
    // }
}
