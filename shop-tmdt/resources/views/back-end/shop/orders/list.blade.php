@extends('back-end.shop.master')
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
                                       <select name="statusOrder" id="inputLoai" class="form-control">
                                           <option {{ $orderStatus == 8 ? 'selected' : '' }} value="100" >———————Tất cả——————</option>
                                           <option {{ $orderStatus == 1 ? 'selected' : '' }} value="1" >————Đơn đã xác nhận————</option>
                                           <option value="234" {{ $orderStatus == 234 ? 'selected' : '' }}>—Đơn khách hàng chưa xác nhận—</option>
                                           <option value="5" {{ $orderStatus == 5 ? 'selected' : '' }} >———Đơn chưa xác nhận————</option>
                                           <option value="6" {{ $orderStatus == 6 ? 'selected' : '' }} >————Đơn đang gửi đi————</option>
                                           <option value="7" {{ $orderStatus == 7 ? 'selected' : '' }} >——Đơn đã gửi và kết thúc——</option>
                                           <option value="0" {{ $orderStatus == 0 ? 'selected' : '' }} >————Đơn hàng đã hủy————</option>
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
                                                   <span style="color:#d3b6b9;">Đã gửi hàng kết thúc</span>
                                               @elseif ($row->status == 0)
                                                   <span style="color:#c11f25;">Đơn hàng đã hủy</span>
                                               @elseif ($row->status != 5)
                                                   <span style="color:#902b2b;">Khách hàng chưa xác nhận</span>
                                               @endif
                                           </td>
                                           <td>
                                               <a href="{!!url('shops/donhang/detail/'.$row->id)!!}" title="Chi tiết">Chi tiết  </a> &nbsp;
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