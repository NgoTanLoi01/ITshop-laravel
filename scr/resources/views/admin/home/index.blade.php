@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="container-fluid">
                <br>
                <h3>Thống kê</h3><br>
                {{-- Thống kê --}}
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                {{-- <h3>{{ $orderCount }}</h3> --}}
                                <p>Tổng số đơn hàng</p>
                            </div>
                            <div class="icon">
                                <!-- Thêm icon mới -->
                                <i class="fas fa-shopping-cart"></i> <!-- Ví dụ thêm icon sao mới -->
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                {{-- <h3>{{ number_format($totalRevenue) }} VNĐ</h3> --}}
                                <p>Tổng số doanh thu</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                {{-- <h3>{{ $customerCount }}</h3> --}}
                                <p>Tổng số khách hàng</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                {{-- <h3>{{ $productCount }}</h3> --}}
                                <p>Tổng số mặt hàng</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-laptop"></i>
                            </div>
                        </div>
                    </div>

                    <!-- ./col -->
                </div>
                <br>
                {{-- Biểu đồ thống kê --}}
                <div
                    style="display: flex; justify-content: center; margin: auto; border: 1px solid #ddd; padding: 10px; box-sizing: border-box;">
                    <div class="container">
                        <div class="col-lg-12">
                            <canvas id="myChart" style="width:100%; max-width:800px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
