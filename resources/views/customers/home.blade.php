@extends('layouts.core.customerHome')
@section('title','Danh sách ')
@section('content')
    <!-- Content Header (Page header) -->
{{--    <section class="content-header">--}}
{{--        <div class="container-fluid">--}}
{{--            <div class="row mb-2">--}}
{{--                <div class="col-sm-6">--}}

{{--                </div>--}}
{{--                <div class="col-sm-6">--}}
{{--                    <ol class="breadcrumb float-sm-right">--}}
{{--                        <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
{{--                        <li class="breadcrumb-item active">Danh sách</li>--}}
{{--                    </ol>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div><!-- /.container-fluid -->--}}
{{--    </section>--}}

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <a class="btn btn-success" href="{{ route('books.create') }}">Đăng ký</a>
                                <a class="btn btn-success" href="{{ route('books.create') }}">Đăng Nhập</a>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên</th>
                                    <th>Mô tả</th>
                                    <th>Ảnh</th>
                                    <th>Trạng thái</th>
                                    <th>Giá</th>
                                    <th>Thể loại</th>
                                    <th colspan="1">Hoạt động</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($books as $key => $book)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $book->name }}</td>
                                        <td>{{ $book->desc }}</td>
                                        <td>
                                            @if($book->image)
                                                <img src="{{ asset('storage/' . $book->image) }}" alt=""
                                                     style="width: 150px">
                                            @else
                                                {{'chưa có ảnh '}}
                                            @endif
                                        </td>
                                        <td>{{ $book->status }}</td>
                                        <td>{{ $book->price }}</td>
                                        <td>{{ $book->category->name }}</td>
                                        <td>
                                            <div class="card-body">
                                                <a href="{{route('customer.addToCart',$book->id)}}" type="button" class="btn btn-warning">Add To Cart</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
