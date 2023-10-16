@extends('layouts.admin')

@section('title')
<title>Add product</title>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    @include('partials.content-header', ['name' => 'product', 'key' => 'List'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('product.create')}}" class="btn btn-sm btn-primary float-right m-2"><i class="fas fa-plus fa-fw fa-xs"></i>Add</a>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                                <th scope="col">Thứ tự</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Danh mục</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <tr>
                                <th scope="row">1</th>
                                <td>Iphone 4</td>
                                <td>2.400.000</td>
                                <td>
                                    <img src="" alt="">
                                </td>
                                <td>Điện thoại</td>
                                <td>
                                    <a href="" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Delete</a>
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    
                </div>
            </div>  
        </div>
    </div>
</div>
@endsection