@extends('layouts.app')
@section('title', 'Thêm mới phiếu mượn sách')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>

                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Thêm mới phiếu mượn</h3>
                        </div>
                        <!-- /.card-header -->
{{--                        <form action="">--}}

                            @csrf
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa fa-search"></i>
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control" id="search-student-borrow"
                                                       placeholder="Tìm tên học sinh, mã học sinh">

                                            </div>
                                            <ul id="list-student-borrow-search" style="position: absolute;z-index: 1000"
                                                class="list-group"></ul>
                                        </div>
                                        <div class="form-group">
                                            <h6>Thông tin người mượn</h6>
                                            <hr>
                                            <div class="form-group row">
                                                <label for="name" class="col-sm-4 col-form-label">Tên học viên</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="name"
                                                           id="name-student-borrow" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email" class="col-sm-4 col-form-label">Email</label>
                                                <div class="col-sm-8">
                                                    <input type="email" class="form-control" name="email"
                                                           id="email-student-borrow" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="phone" class="col-sm-4 col-form-label">Phone</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="phone"
                                                           id="phone-student-borrow" disabled>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">

                                        <div class="form-group">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa fa-search"></i>
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control" id="search-book-borrow"
                                                       placeholder="Tìm tên sách">
                                            </div>
                                            <ul id="list-book-borrow-search" style="position: absolute;z-index: 1000"
                                                class="list-group"></ul>
                                        </div>
                                        <div class="form-group">
                                            <h6>Danh sách sách</h6>
                                            <hr>
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td>STT</td>
                                                    <td>Tên sách</td>
                                                    <td>Hình ảnh</td>
                                                    <td></td>
                                                </tr>
                                                <tr id="book-item">

                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <h6>Thông tin phiếu mượn</h6>
                                        <hr>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group row">
                                                <label for="borrow_date" class="col-sm-4 col-form-label" >Ngày
                                                    mượn</label>
                                                <div class="col-sm-8">
                                                    <input type="date" class="form-control" name="borrow_date"
                                                           id="borrow_date">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="borrow_return" class="col-sm-4 col-form-label" >Ngày
                                                    trả</label>
                                                <div class="col-sm-8">
                                                    <input type="date" class="form-control" name="borrow_return"
                                                           id="borrow_return">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <button class="btn btn-success" type="submit" id="create-borrow">Cho mượn</button>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="text"  id="studen-id" hidden>
                                    <input type="text" id="book-id" hidden>

                                </div>
                            </div>
{{--                        </form>--}}
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
@endsection
