@extends('layouts.admin')

@section('title')
<title>Trang chủ</title>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    @include('partials.content-header', ['name' => 'Category', 'key' => 'List'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('categories.create') }}" class="btn btn-sm btn-primary float-right m-2"><i class="fas fa-plus fa-fw fa-xs"></i>Add</a>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Thứ tự</th>
                                <th scope="col">Tên danh mục</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <th scope="row">{{ $category->id }}</th>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <a href="{{route('categories.edit', ['id' => $category ->id])}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i>Edit</a>
                                    <a href="{{route('categories.delete', ['id' => $category ->id])}}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i>Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    {{ $categories->links('pagination::bootstrap-4') }}
                </div>
            </div>  
        </div>
    </div>
</div>
@endsection