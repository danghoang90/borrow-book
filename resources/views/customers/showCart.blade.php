@extends('layouts.core.customerHome')
@section('title','Danh sách ')
@section('content')
    <!-- Content Header (Page header) -->
{{--    <section class="content-header">--}}
{{--        <div class="container-fluid">--}}
{{--            <div class="row mb-2">--}}
{{--                <div class="col-sm-6">--}}

{{--                    --}}{{--                </div>--}}
{{--                    --}}{{--                <div class="col-sm-6">--}}
{{--                    --}}{{--                    <ol class="breadcrumb float-sm-right">--}}
{{--                    --}}{{--                        <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
{{--                    --}}{{--                        <li class="breadcrumb-item active">Danh sách</li>--}}
{{--                    --}}{{--                    </ol>--}}
{{--                    --}}{{--                </div>--}}
{{--                    --}}{{--            </div>--}}
{{--                </div><!-- /.container-fluid -->--}}
{{--    </section>--}}

    <!-- Main content -->
    <section class="content">
        <div class="col-12 col-md-10">
            <input type="text" class="form-control " id="search-user">
            <ul id="list-user-search" class="list-group"></ul>
        </div>
{{--        <div class="container-fluid">--}}
{{--            <div class="row">--}}
{{--                <div class="col-12">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-header">--}}
{{--                            <h3 class="card-title">--}}
{{--                                <a class="btn btn-success" href="{{ route('books.create') }}">Đăng ký</a>--}}
{{--                                <a class="btn btn-success" href="{{ route('books.create') }}">Đăng Nhập</a>--}}
{{--                            </h3>--}}
{{--                        </div>--}}
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-dark">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Số Lượng</th>
                                    <th scope="col">Tổng Giá</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $totalPrice =0; $totalQuantity=0; @endphp
                                @foreach($cart as $key => $item)
                                    @php
                                        $total= $item['price']*$item['quantity'];
                                        $totalPrice += $total;
                                        $quantity =$item['quantity'];
                                        $totalQuantity += $quantity;
                                    @endphp
                                <tr>
                                    <th scope="row">{{$key}}</th>
                                    <td>{{$item['name']}}</td>
                                    <td>{{$item['price']}}</td>
                                    <td><input name="quantity" type="number" value="{{$item['quantity']}}"></td>
                                    <td>{{$total}}</td>
                                    <td><button data-id="{{$user->id}}" class="btn btn-danger delete-user"><i class="fas fa-trash"></i></button></td>
{{--                                    <td><a href="{{route('customer.updateCart',$key,'quantity')}}">Cập Nhật</a></td>--}}
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th scope="col">Tổng</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col">{{$totalQuantity}}</th>
                                    <th scope="col">{{$totalPrice}}</th>
                                </tr>
                                </tfoot>
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

