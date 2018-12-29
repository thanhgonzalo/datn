@extends('back-end.layouts.master')
@section('content')
    <!-- main content - noi dung chinh trong chu -->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">Shop</li>
            </ol>
        </div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-10"><div class="form-group">
                                    <label for="inputLoai" class="col-sm-3 control-label"><strong> Danh sách shop </strong></label>
                                </div>
                            </div>
                            <div class="col-md-2">

                            </div>
                        </div>
                    </div>
                    <div class="panel-body" style="font-size: 12px;">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên shop</th>
                                    <th>Địa chỉ</th>
                                    <th>Số điện thoại</th>
                                    <th>Chủ shop</th>
                                    <th>Ngày mở shop</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($listShop as $shop)
                                        <tr>
                                            <td>{!!$shop->id!!}</td>
                                            <td>{!!$shop->name!!}</td>
                                            <td>{!!$shop->address!!}</td>
                                            <td>{!!$shop->phone!!}</td>
                                            <td>{!!$shop->name_user_shop!!}</td>
                                            <td>{!!$shop->created_at!!}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>    <!--/.main-->
    <!-- =====================================main content - noi dung chinh trong chu -->
@endsection