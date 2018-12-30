@extends('back-end.shop.master')
@section('content')
    <!-- main content - noi dung chinh trong chu -->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                        <svg class="glyph stroked home">
                            <use xlink:href="#stroked-home"></use>
                        </svg>
                    </a></li>
                <li class="active">Doanh thu shop</li>
            </ol>
        </div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="inputLoai" class="col-sm-3 control-label"><strong> Doanh thu
                                        shop</strong></label>
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
                        <div class="panel-body" style="font-size: 13px; margin: auto 75px;">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên khách hàng</th>
                                        <th>Địa chỉ</th>
                                        <th>Điện thoại</th>
                                        <th>Ngày đặt</th>
                                        <th>Thành tiền</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $totalMoneyProduct = 0;
                                    foreach ($data as $row) {
                                        $total = number_format(($row->total), 0, ",", ".");
                                        $totalMoneyProduct += $row->total;
                                        echo "<tr>";
                                        echo "<td>$row->id</td>";
                                        echo "<td>$row->name</td>";
                                        echo "<td>$row->address</td>";
                                        echo "<td>$row->phone</td>";
                                        echo "<td>$row->created_at</td>";
                                        echo "<td>$total</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                    <tr style="border-bottom: 1px solid #dddddd">
                                        <td colspan="5" class="tong" style="border-right: 1px solid #dddddd; "><b>Tổng
                                                cộng</b></td>
                                        <td colspan="4" class="tong">
                                            <b><?php echo number_format(($totalMoneyProduct), 0, ",", ".")?> đ</b></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            {!! $data->render() !!}
                        </div>
                    </div>
                </div>
            </div><!--/.row-->
        </div>    <!--/.main-->
    </div>s
    <!-- =====================================main content - noi dung chinh trong chu -->
@endsection