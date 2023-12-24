<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Slider;
use App\Models\Order;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Rules\Captcha;
use Barryvdh\DomPDF\Facade as PDF;
use Shipping;

session_start();

class CheckoutController extends Controller
{
    private $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }
    public function login_checkout()
    {
        return view('home.login_checkout');
    }

    public function add_customer(Request $request)
    {
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_email'] = $request->customer_email;

        $data['customer_password'] = Hash::make($request->customer_password);

        $customer_id = DB::table('customers')->insertGetId($data);

        Session::put('customer_id', $customer_id);
        Session::put('customer_name', $request->customer_name);

        return Redirect::to('/checkout');
    }


    public function checkout()
    {
        $customer_id = Session::get('customer_id');
        $shipping_info = DB::table('shipping')->where('customer_id', $customer_id)->first();
        $customer_info = DB::table('customers')->where('customer_id', $customer_id)->first();

        return view('home.checkout', compact('shipping_info', 'customer_info'));
    }

    public function save_checkout_customer(Request $request)
    {
        $data = array();
        $data['customer_id'] = Session::get('customer_id'); // Thêm dòng này
        $data['shipping_name'] = $request->input('shipping_name');
        $data['shipping_phone'] = $request->input('shipping_phone');
        $data['shipping_email'] = $request->input('shipping_email');
        $data['shipping_notes'] = $request->input('shipping_notes');
        $data['shipping_address'] = $request->input('shipping_address');

        $shipping_id = DB::table('shipping')->insertGetId($data);

        Session::put('shipping_id', $shipping_id);

        return redirect('/payment');
    }


    public function payment()
    {
        return view('home.payment');
    }

    public function order_place(Request $request)
    {
        //insert payment_method
        $data = array();
        $data['payment_method'] = $request->payment_option;
        $data['payment_status'] = 'Đang chờ xử lý';
        $payment_id = DB::table('payment')->insertGetId($data);

        //insert order
        $order_data = array();
        $order_data['customer_id'] = Session::get('customer_id');
        $order_data['shipping_id'] = Session::get('shipping_id');
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = round(Cart::total(0, '.', '') / (1 + 0.21), 2);
        $order_data['order_status'] = 'Đang chờ xử lý';
        $order_id = DB::table('order')->insertGetId($order_data);

        //insert order_details
        $content = Cart::content();
        foreach ($content as $v_content) {
            $order_d_data = array();
            $order_d_data['order_id'] = $order_id;
            $order_d_data['product_id'] = $v_content->id;
            $order_d_data['product_name'] = $v_content->name;
            $order_d_data['product_price'] = $v_content->price;
            $order_d_data['product_sales_quantity'] = $v_content->qty;
            $order_d_data['tax'] = 0;

            DB::table('order_details')->insert($order_d_data);

            //giảm số lượng sản phẩm trong giỏ hàng
            DB::table('products')
                ->where('id', $v_content->id)
                ->decrement('quantity', $v_content->qty);
        }

        if ($data['payment_method'] == 1) {
            echo 'Thanh toán thẻ ATM';
        } elseif ($data['payment_method'] == 2) {
            Cart::destroy();
            return view('home.handcash');
        } else {
            echo 'Thanh toán thẻ ghi nợ';
        }

        // return Redirect::to('/payment');
    }


    public function logout_checkout()
    {
        Session::flush();
        return Redirect::to('/login-checkout');
    }

    public function login_customer(Request $request)
    {
        $email = $request->email_account;
        $password = Hash::make($request->password_account);
        $result = DB::table('customers')->where('customer_email', $email)->first();

        if ($result && Hash::check($request->password_account, $result->customer_password)) {
            // Đúng mật khẩu
            Session::put('customer_id', $result->customer_id);
            return Redirect::to('/checkout');
        } else {
            // Sai mật khẩu
            return Redirect::to('/login-checkout');
        }
    }

    public function manage_order()
    {
        $all_order = DB::table('order')
            ->join('customers', 'order.customer_id', '=', 'customers.customer_id')
            ->select('order.*', 'customers.customer_name')
            ->orderBy('order.order_id', 'desc')->get();
        $manage_order = view('admin.order.manage_order')->with('all_order', $all_order);
        return view('admin.order.manage_order', compact('all_order', 'manage_order'));
    }

    public function view_order($orderId)
    {
        $order_by_id = DB::table('order')
            ->join('customers', 'order.customer_id', '=', 'customers.customer_id')
            ->join('shipping', 'order.shipping_id', '=', 'shipping.shipping_id')
            ->join('order_details', 'order.order_id', '=', 'order_details.order_id')
            ->select('order.*', 'customers.*', 'shipping.*', 'order_details.*')
            ->where('order.order_id', $orderId)
            ->get();
        $manager_order_by_id = view('admin.order.view_order')->with('order_by_id', $order_by_id);
        return view('admin.order.view_order', compact('order_by_id', 'manager_order_by_id'));
    }

    public function print_order($checkoutcode)
    {
        $pdf = app('dompdf.wrapper');
        $pdf->loadHTML($this->print_order_convert($checkoutcode));
        return $pdf->stream();
    }

    public function print_order_convert($checkoutcode)
    {
        // Thực hiện truy vấn SQL để lấy dữ liệu đơn hàng
        $order_by_id = DB::table('order')
            ->join('customers', 'order.customer_id', '=', 'customers.customer_id')
            ->join('shipping', 'order.shipping_id', '=', 'shipping.shipping_id')
            ->join('order_details', 'order.order_id', '=', 'order_details.order_id')
            ->select('order.*', 'customers.*', 'shipping.*', 'order_details.*')
            ->where('order.order_id', $checkoutcode)
            ->get();
    
    
        $output = '<!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <style>
                        @font-face {
                            font-family: "DejaVu Sans";
                            src: url("path/to/your/font.woff2") format("woff2");
                        }

                        table {
                            font-family: "DejaVu Sans", sans-serif;
                            width: 100%;
                            border-collapse: collapse;
                            margin-bottom: 20px;
                        }

                        table, th, td {
                            border: 1px solid #ddd;
                        }

                        th, td {
                            padding: 8px;
                            text-align: left;
                        }

                        h5 {
                            font-weight: bold;
                            padding: 8px;
                            background-color: #d2e2ef;
                            text-align: center;
                            font-family: "DejaVu Sans", sans-serif;
                        }

                        .logo {
                            max-width: 100px;
                            margin-bottom: 10px;
                            border-radius: 50%; 
                            vertical-align: middle;
                        }

                        .logo + p {
                            text-align: center;
                            display: inline-block;
                            vertical-align: middle;
                            margin-left: -12px;
                        }

                        h2 {
                            text-align: center;
                            font-family: "DejaVu Sans", sans-serif;
                        }
                        .thongtin1,
                        .thongtin2 {
                            
                            display: inline-block;
                            vertical-align: top; 
                            font-family: "DejaVu Sans", sans-serif;
                        }

                        .thongtin2 {
                            font-size: 15px;
                            margin-left: 60px; 
                        }
                        h3{
                            text-align: center;
                            font-family: "DejaVu Sans", sans-serif; 
                        }
                        span{
                            color: #fcb941;
                        }
                        .thongtin1{
                            color: #fcb941;
                        }
                    </style>
                        <title>In Đơn Hàng</title>
                    </head>
                    <body> 
                    <div class="thongtin1" >
                        <img class="logo" src="AdminLTE/dist/img/login_logo.png" alt="Logo">
                        <p class="shop"><b>NGO TAN LOI <br> DIGITAL <br> TECHNOLOGIES</b></p>
                    </div>
                    <div class="thongtin2">
                        <p><b>SĐT:</b> 033 712 0073</p>
                        <p><b>Địa chỉ:</b> Nguyễn Thiện Thành, Phường 5, Trà Vinh</p>
                        <p><b>Mã số thuế: </b>02GTT0/01</p>
                    </div>
                    <h2>HÓA ĐƠN BÁN HÀNG <br> -------oOo-------</h2>
                    
                        <h5><b>THÔNG TIN VẬN CHUYỂN</b></h5>
                        <table>
                            <thead>
                                <tr>
                                    <th scope="col">Tên khách hàng</th>
                                    <th scope="col">Địa chỉ</th>
                                    <th scope="col">Số điện thoại</th>
                                    <th scope="col">Ghi chú đơn hàng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>' . $order_by_id->first()->shipping_name . '</td>
                                    <td>' . $order_by_id->first()->shipping_address . '</td>
                                    <td>' . $order_by_id->first()->shipping_phone . '</td>
                                    <td>' . $order_by_id->first()->shipping_notes . '</td>
                                </tr>
                            </tbody>
                        </table>
                        <h5><b>CHI TIẾT ĐƠN HÀNG</b></h5>
                        <table>
                            <thead>
                                <tr>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Tổng tiền</th>
                                </tr>
                            </thead>
                            <tbody>';
    
                                $totalAmount = 0;
    
                                foreach ($order_by_id as $order) {
                                    $output .= '<tr>
                                                    <td>' . $order->product_name . '</td>
                                                    <td>' . $order->product_sales_quantity . '</td>
                                                    <td>' . number_format(floatval($order->product_price)) . ' VNĐ</td>
                                                    <td>' . number_format(floatval($order->product_price * $order->product_sales_quantity)) . ' VNĐ</td>
                                                </tr>';
                                    $totalAmount += $order->product_price * $order->product_sales_quantity;
                                }
                                $output .= '<tr>
                                    <td colspan="3"></td>
                                    <td><b>Tổng thanh toán:</b> ' . number_format($totalAmount) . ' VNĐ <br>  <b>Bằng chữ: </b>' . convertNumberToWords($totalAmount) . ' VNĐ</td>
                                </tr>
                        </tbody>
                    </table>
                    <h3><span>NGO TAN LOI DIGITAL TECHNOLOGIES </span> <br> CẢM ƠN QUÝ KHÁCH ĐÃ MUA SẮM TẠI CỬA HÀNG. </h3>
                </body>
            </html>';
        return $output;
    }
    

    public function send_mail($orderId)
    {
        // Lấy thông tin đơn hàng từ database (bạn có thể sử dụng mã checkoutcode để lấy đúng đơn hàng)
        $order_by_id = DB::table('order')
            ->join('customers', 'order.customer_id', '=', 'customers.customer_id')
            ->join('shipping', 'order.shipping_id', '=', 'shipping.shipping_id')
            ->join('order_details', 'order.order_id', '=', 'order_details.order_id')
            ->select('order.*', 'customers.*', 'shipping.*', 'order_details.*')
            ->where('order.order_id', $orderId)
            ->get();
    
        $to_name = "NGO TAN LOI Digital Technologies";
        $to_email = "ngotanloi2424@gmail.com";
    
        $data = array(
            "name" => $to_name,
            "body" => 'Cảm ơn bạn đã đặt hàng. Đơn hàng của bạn đang được xử lý.',
            "order" => $order_by_id, // Thêm thông tin đơn hàng vào mảng $data
        );
    
        Mail::send("home.send_mail", $data, function ($message) use ($to_name, $to_email) {
            $message->to($to_email)->subject('Thông tin đơn hàng');
            $message->from($to_email, $to_name);
    
            $message->attach(public_path('AdminLTE/dist/img/login_logo.png'), [
                'as' => 'logo',
                'mime' => 'image/png',
            ]);
        });
    
        return redirect('/manage-order')->with('message', '');
    }
    
}
