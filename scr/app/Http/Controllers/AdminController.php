<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function loginAdmin()
    {
        return view('admin.home.index');
    }

    public function getKhachHangThanThiet()
    {
        return DB::table('order')
            ->select('order.customer_id', 'customers.customer_name', 'customers.customer_email', DB::raw('COUNT(order.order_id) as totalOrders'))
            ->join('customers', 'order.customer_id', '=', 'customers.customer_id')
            ->whereNull('order.deleted_at')
            ->groupBy('order.customer_id', 'customers.customer_name', 'customers.customer_email')
            ->having('totalOrders', '>', 1)
            ->orderBy('totalOrders', 'desc')
            ->limit(5)
            ->get();
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

        // Gọi hàm getKhachHangThanThiet để lấy thông tin khách hàng thân thiết
        $khachHangThanThiet = $this->getKhachHangThanThiet();
        //dd($khachHangThanThiet);

        // Truyền biến $selectedDate và $khachHangThanThiet vào view
        return view('admin.home.index', compact('productCount', 'orderCount', 'totalRevenue', 'customerCount', 'thongKeData', 'selectedDate', 'khachHangThanThiet'));
    }


    public function postloginAdmin(Request $request)
    {
    }

    public function showDashboard()
    {
    }
}
