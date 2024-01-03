<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function loginAdmin()
    {
        return view('admin.home.index');
    }
    public function index(Request $request)
    {
        // Lấy ngày từ request
        $selectedDate = $request->input('selectedDate');

        // Chuyển đổi định dạng ngày nếu cần thiết
        $selectedDate = date('Y-m-d', strtotime($selectedDate));

        // Thực hiện truy vấn để lấy thông tin thống kê doanh thu theo ngày
        $thongKeData = Order::where('created_at', 'LIKE', '%' . $selectedDate . '%')
            ->selectRaw('SUM(order_total) as totalRevenue, COUNT(order_id) as orderCount')
            ->first();

        // Lấy dữ liệu cần cho trang index
        $productCount = Product::count();
        $orderCount = Order::count();
        $totalRevenue = Order::sum('order_total');
        $customerCount = Customer::count();

        // Truyền biến $selectedDate vào view
        return view('admin.home.index', compact('productCount', 'orderCount', 'totalRevenue', 'customerCount', 'thongKeData', 'selectedDate'));
    }

    public function postloginAdmin(Request $request)
    {
    }

    public function showDashboard()
    {
    }
}
