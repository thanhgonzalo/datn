@extends('back-end.layouts.master')
@section('content')
    <!-- main content - noi dung chinh trong chu -->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">Dơn đặt hàng</li>
            </ol>
        </div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <form class="search_type_order">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-10"><div class="form-group">
                                    <label for="inputLoai" class="col-sm-3 control-label"><strong> Chọn sản phẩm </strong></label>
                                    <div class="col-md-6" style="padding-top: 5px; width: 300px;">
                                        <select name="typeDebt" id="inputLoai" class="form-control">
                                            <option value="7" {{ $typeDebt == 7 ? 'selected' : '' }} >—Đơn cần thanh toán cho shop——</option>
                                            <option value="0" {{ $typeDebt == 0 ? 'selected' : '' }} >————Đơn hàng đã hủy————</option>
                                            <option value="8" {{ $typeDebt == 8 ? 'selected' : '' }} >——Đã trả tiền lại cho khách——</option>
                                            <option value="9" {{ $typeDebt == 9 ? 'selected' : '' }} >———Đã thanh toán cho shop———</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <button class="btn btn-info"> Tìm kiếm</button>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-2">
                            </div>
                        </div>
                    </div>
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
                        <div class="panel-body" style="font-size: 13px;">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên khách hàng</th>
                                        <th>Địa chỉ</th>
                                        <th>Điện thoại</th>
                                        <th>Email</th>
                                        <th>Ngày đặt</th>
                                        <th>Thành tiền</th>
                                        <th>Trạng thái</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $row)
                                        <tr>
                                            <td>{!!$row->id!!}</td>
                                            <td>{!!$row->name!!}</td>
                                            <td>{!!$row->address!!}</td>
                                            <td>{!!$row->phone!!}</td>
                                            <td>{!!$row->email!!}</td>
                                            <td>{!!$row->created_at!!}</td>
                                            <td>{!!$row->total!!} Vnd</td>
                                            <td>
                                                @if($row->status == 1)
                                                    <span style="color:#27ae60;"> Đã xác nhận</span>
                                                @elseif ($row->status == 5)
                                                    <span style="color:#d35400;">Chưa xác nhận gửi hàng (KH đã xác nhận)</span>
                                                @elseif ($row->status == 6)
                                                    <span style="color:#1c1cd3;">Đang gửi hàng</span>
                                                @elseif ($row->status == 7)
                                                    <span style="color:#d3b6b9;">Đơn cần thanh toán cho shop</span>
                                                @elseif ($row->status == 8)
                                                    <span style="color:#d38a25;">Đã hoàn tiền cho khách</span>
                                                @elseif ($row->status == 9)
                                                    <span style="color:#a85cd3;">Đã thanh toán cho shop</span>
                                                @elseif ($row->status == 0)
                                                    <span style="color:#c11f25;">Đơn hàng đã hủy</span>
                                                @elseif ($row->status != 5)
                                                    <span style="color:#902b2b;">Khách hàng chưa xác nhận</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{!!url('admin/congno/detail/'.$row->id)!!}" title="Chi tiết">Chi tiết  </a> &nbsp;
                                                {{--<a href="{!!url('shops/donhang/del/'.$row->id)!!}"  title="Xóa" onclick="return xacnhan('Xóa danh mục này ?')"> Hủy bỏ</a>--}}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {!! $data->render() !!}
                        </div>
                    </div>
                </form>
            </div>
        </div><!--/.row-->
    </div>    <!--/.main-->
    <!-- =====================================main content - noi dung chinh trong chu -->
@endsection