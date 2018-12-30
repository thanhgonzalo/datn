@extends('back-end.layouts.master')
@section('content')
    <!-- main content - noi dung chinh trong chu -->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">Chi tiết đơn hàng </li>
            </ol>
        </div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <form action="" method="POST" role="form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="panel panel-default">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @elseif (Session()->has('flash_level'))
                            <div class="alert alert-success">
                                <ul>
                                    {!! Session::get('flash_massage') !!}
                                </ul>
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th> Họ-tên khách hàng</th>
                                    <th>Địa chỉ</th>
                                    <th>Điện thoại</th>
                                    <th>Ngày đặt</th>
                                    <th>Tổng tiền</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{!!$order->id!!}</td>
                                    <td>{!!$order->user->name!!}</td>
                                    <td>{!!$order->user->address!!}</td>
                                    <td>{!!$order->user->phone!!}</td>
                                    <td>{!!$order->created_at!!}</td>
                                    <td>{!! number_format($order->total) !!} Vnđ</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="panel-heading">
                            Chi tiết sản phẩm trong đơn đặt hàng
                        </div>
                        <div class="panel-body" style="font-size: 12px;">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Hình ảnh</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Tên chủ shop</th>
                                        <th>Số lượng </th>
                                        <th>Giá bán</th>
                                        <th>Trạng thái</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($data as $key => $row)
                                        <tr>
                                            <td name="id_product">{!!$row->id!!}</td>
                                            <input type="hidden" value="{!!$row->id!!}" name="id_shop[]">
                                            <input type="hidden" value="{!!$row->qty!!}" name="qty[]">
                                            <td> <img src="{!!url('public/uploads/products/'.$row->images)!!}" alt="iphone" width="50" height="40"></td>
                                            <td>{!!$row->name!!}</td>
                                            <td>{{$shop[$key]->name_user_shop}}</td>
                                            <td name="qty">{!!$row->qty!!} </td>
                                            <td>{!! number_format($row->price) !!} Vnđ</td>
                                            <td>
                                                @if($order->status == 1)
                                                    <span style="color:#27ae60;"> Đã xác nhận</span>
                                                @elseif ($order->status == 5)
                                                    <span style="color:#d35400;">Chưa xác nhận gửi hàng (KH đã xác nhận)</span>
                                                @elseif ($order->status == 6)
                                                    <span style="color:#1c1cd3;">Đang gửi hàng</span>
                                                @elseif ($order->status == 7)
                                                    <span style="color:#d3b6b9;">Đã gửi hàng kết thúc</span>
                                                @elseif ($order->status == 8)
                                                    <span style="color:#d38a25;">Đã hoàn tiền cho khách</span>
                                                @elseif ($order->status == 9)
                                                    <span style="color:#a85cd3;">Đã thanh toán cho shop</span>
                                                @elseif ($order->status == 0)
                                                    <span style="color:#c11f25;">Đơn hàng đã hủy</span>
                                                @elseif ($order->status != 5)
                                                    <span style="color:#902b2b;">Khách hàng chưa xác nhận</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @if($order->status == 5)
                        <button type="submit" onclick="return xacnhan('Xác nhận đơn hàng này ?')"  class="btn btn-danger"> Xác nhận đơn hàng </button>
                    @elseif ($order->status == 7)
                        <input type="hidden" name="order-debut" value="{{$order->id}}">
                        <input type="hidden" name="order-status" value="{{$order->status}}">
                        <button type="submit" onclick="return xacnhan('Gửi tiền cho các shop')"  class="btn btn-success">Xuất hóa đơn gửi tiền cho shop </button>
                    @elseif ($order->status == 0)
                        <input type="hidden" name="order-debut" value="{{$order->id}}">
                        <input type="hidden" name="order-status" value="{{$order->status}}">
                        <button type="submit" onclick="return xacnhan('Gửi lại tiền cho khách')"  class="btn btn-danger"> Gửi tiền lại cho khách hàng </button>
                    @endif
                </form>
            </div>
        </div><!--/.row-->
    </div>    <!--/.main-->
    <!-- =====================================main content - noi dung chinh trong chu -->
@endsection