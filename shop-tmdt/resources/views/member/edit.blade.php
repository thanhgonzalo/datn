@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <table class="table table-bordered table-hover text-center">
                        <thead>
                            <tr>
                                <th colspan="2"> Lịch sử mua hàng : {!!Auth::user()->name !!}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Họ tên</td>
                                <td>{!!Auth::user()->name!!}</td>
                            </tr>
                            <tr>
                                <td>Địa chỉ E-mail</td>
                                <td>{!!Auth::user()->email!!}</td>
                            </tr>
                            <tr>
                                <td>Điện thoại</td>
                                <td>{!!Auth::user()->phone !!}</td>
                            </tr>
                            <tr>
                                <td>Địa chỉ Khách hàng</td>
                                <td>{!!Auth::user()->address!!}</td>
                            </tr>
                            <tr>
                                <td>Ngày đăng ký</td>
                                <td>{!!Auth::user()->created_at !!}</td>
                            </tr>
                        </tbody>
                    </table>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-center">
                        <thead>
                            <tr>
                                <th colspan="2"> Cập nhật thông tin khách hàng : {!!Auth::user()->name !!}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Họ tên</td>
                                <td>{!!Auth::user()->name!!}</td>
                            </tr>
                            <tr>
                                <td>Địa chỉ E-mail</td>
                                <td>{!!Auth::user()->email!!}</td>
                            </tr>
                            <tr>
                                <td>Điện thoại</td>
                                <td>{!!Auth::user()->phone !!}</td>
                            </tr>
                            <tr>
                                <td>Địa chỉ Khách hàng</td>
                                <td>{!!Auth::user()->address!!}</td>
                            </tr>
                            <tr>
                                <td>Ngày đăng ký</td>
                                <td>{!!Auth::user()->created_at !!}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
