@extends('back-end.shop.master')
@section('assets')
    <link href="{!!url('public/back-end/css/addproduct.css')!!}" rel="stylesheet">
    <link href="{!!url('public/back-end/css/all.css')!!}" rel="stylesheet">
    <link href="{!!url('public/back-end/css/font-awesome.min.css')!!}" rel="stylesheet">
    <link href="{!!url('public/back-end/css/editor.css')!!}" rel="stylesheet">
@endsection
@section('content')

    <div class="container col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="product">
            <div class="post-nav clearfix">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs sroll-nav" role="tablist" style=" z-index: 5;">
                    <!--<li role="presentation" class="active"><a href="#" aria-controls="first" role="tab" data-toggle="tab">Đăng bán mới</a></li>-->
                    <li role="presentation" class=""><a href="#cdt-base" aria-controls="first" role="tab"
                                                        data-toggle="tab">Cơ bản</a></li>
                    <li role="presentation" class=""><a href="#cdt-category" aria-controls="first" role="tab"
                                                        data-toggle="tab" style="color: #a94442">Danh mục</a></li>
                    <li role="presentation" class="active"><a href="#cdt-info-price" aria-controls="first" role="tab"
                                                              data-toggle="tab" style="color: #8a6d3b">Thông tin giá & khuyến mại</a>
                    </li>
                    <li role="presentation" class=""><a href="#cdt-detail-image" aria-controls="first" role="tab"
                                                        data-toggle="tab" style="color: #3c763d">Chi tiết &amp; Ảnh</a>
                    </li>
                    <li role="presentation" class=""><a href="#cdt-config-shipment" aria-controls="first" role="tab"
                                                        data-toggle="tab" style="color: #31708f">Cấu hình vận chuyển</a>
                    </li>
                    <li class="help-busy"><a
                                href="https://www.chodientu.vn/tro-giup/tro-giup-ban-hang/huong-dan-dang-mot-tin-ban--604982063071"
                                class="text-right "><i class="fa fa-question-circle"></i> Hướng dẫn đăng bán</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content maincontent maincontent-tab  clearfix">
                    <input type="hidden" name="shopId" value="510588148168">
                    <div role="tabpanel" class="tab-pane tab-seller active" id="first">
                        <div class="box-form">
                            <form class="form-horizontal" id="up-item">
                                <input type="hidden" value="0" name="category">
                                <input type="hidden" value="0" name="mf">
                                <input type="hidden" value="0" name="shopCategoryId">
                                <input type="hidden" value="" name="modelId">
                                <input type="hidden" value="" name="id">
                                <input type="hidden" value="0" name="id_Sku">

                                <div class="panel panel-primary" id="cdt-base">
                                    <div class="panel-heading"><h3 class="panel-title">Thông tin cơ bản</h3></div>
                                    <div class="panel-body">
                                        <div class="form-group" rel="titleItem">
                                            <label for="titleItem" class="col-sm-2 control-label text-bold">Tiêu đề tin
                                                bán: <span class="text-danger">*</span>
                                                <!--i class="fa fa-star text-danger"></i--></label>
                                            <div class="col-sm-10">
                                                <div class="info-helpkey">
                                                    <input maxlength="180" type="text" class="form-control form-title"
                                                           id="itemTitle"
                                                           placeholder="Đặt tên dễ hiểu, chính xác, hấp dẫn, phù hợp SEO để hiển thị lên đầu công cụ tìm kiếm Google."
                                                           onkeypress="additemnew.countCharacters(this);">
                                                    <span class="text-danger hi-notice" for="error_name"></span>
                                                </div>
                                                <p class="text-chart"><span class="text-danger">0/180</span> ký tự</p>
                                                <p>
                                                    <span class="text-bold">Ví dụ:</span> Máy ảnh số Sony Cybershot
                                                    S8500 14 Megapixel hoặc Áo Polo Raplph Lauren cổ V màu vàng</p>
                                            </div>
                                        </div>

                                        <div class="form-group" rel="miniDecription">
                                            <label for="miniDecription" class="col-sm-2 control-label  text-bold">Các
                                                điểm nổi bật chính của sản phẩm:
                                            </label>

                                            <div class="col-sm-10">
                                                <textarea class="form-control" maxlength="300" for="miniDecription"
                                                          rows="5"
                                                          placeholder="Các điểm nổi bật chính của sản phẩm"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group" rel="miniDecription">
                                            <label for="miniDecription" class="col-sm-2 control-label  text-bold">Các packet
                                                đi kèm
                                            </label>

                                            <div class="col-sm-10">
                                                <textarea class="form-control" maxlength="300" for="miniDecription"
                                                          rows="5"
                                                          placeholder="Các packet đi kèm"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group dropdown-group dropdown-weights" rel="convertWeight"
                                             style="display:none; margin-top: 5px">
                                            <label for="wightItem" class="col-sm-2 control-label"></label>
                                            <div class="col-sm-10">
                                                <div class="dropdown-details clearfix" role="alert">
                                                    <div class="form-weight clearfix">
                                                        <button type="button" class="close" rel="wightItem"
                                                                aria-label="Close"><span aria-hidden="true">×</span>
                                                        </button>
                                                        <div class="gr-size clearfix">
                                                            <div class="title-weight">
                                                                <span>Điền kích thước</span><br>
                                                                <span class="text-title">* Chỉ áp dụng cho hàng hoá cồng kềnh</span>
                                                            </div>
                                                            <ul class="list-inline clearfix">
                                                                <li>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control"
                                                                               placeholder="Chiều dài"
                                                                               aria-describedby="basic-addon2"
                                                                               name="dataLength">
                                                                        <span class="input-group-addon form-addon"
                                                                              id="basic-addon2">cm</span>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control"
                                                                               placeholder="Chiều rộng"
                                                                               aria-describedby="basic-addon2"
                                                                               name="dataWidth">
                                                                        <span class="input-group-addon form-addon"
                                                                              id="basic-addon2">cm</span>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control"
                                                                               placeholder="Chiều cao"
                                                                               aria-describedby="basic-addon2"
                                                                               name="dataHeight">
                                                                        <span class="input-group-addon form-addon"
                                                                              id="basic-addon2">cm</span>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="gr-radio">
                                                            <label>Chọn hình thức chuyển phát:</label>
                                                            <div class="form-inline">
                                                                <div class="radio">
                                                                    <label>
                                                                        <input type="radio" name="shipmentChange"
                                                                               value="FAST" checked=""> Chuyển phát
                                                                        nhanh
                                                                    </label>
                                                                </div>
                                                                <div class="radio">
                                                                    <label>
                                                                        <input type="radio" name="shipmentChange"
                                                                               value="SLOW"> Chuyển phát tiết kiệm
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="button" class="btn btn-right btn-weight"
                                                                onclick="additemnew.calcWeight()">Quy đổi ra trọng lượng
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--BOX thông tin chung -->
                                <div class="panel panel-danger" style="margin-top: 10px" id="cdt-category">
                                    <div class="panel-heading"><h3 class="panel-title">Thông tin danh mục</h3></div>
                                    <div class="panel-body">

                                        <div class="form-group form-lp" rel="viewCateOfItem">
                                            <label for="viewCateOfItem" class="col-sm-2 control-label text-bold">Danh
                                                mục sản phẩm: <span class="text-danger">*</span></label>
                                            <div class="col-sm-10">
                                                <div class="btn-chose">
                                                    <button type="button" class="btn btn-default text-uppercase"><i
                                                                class="fa fa-folder-open"></i> Chọn
                                                    </button>
                                                </div>

                                                <div class="edit-text">
                                                    <p class="if-danhmuc" style="margin-left:0px;line-height: 28px;">
                                                        <span class="color-blue" for="categoryName"></span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group form-hidden" rel="chosenCateOfItem">
                                            <label for="viewCateOfItem" class="dropdown-list-pd col-sm-2 control-label text-bold" style="margin-top: 10px">Category:</label>
                                            <div class="col-sm-10">
                                                <div class="dropdown-list-pd">
                                                    <div class="info-list-pd clearfix">
                                                        <ul for="0" level="1">
                                                            <select>
                                                                <option value="" selected>None</option>
                                                                <option value="">Mobile - Điện thoại</option>
                                                                <option value="">LAPTOP - Máy tính xách tay</option>
                                                                <option value="">Asus - ZenFones</option>
                                                                <option value="">Samsung</option>
                                                                <option value="">DELL</option>
                                                                <option value="">ASUS</option>
                                                                <option value="">HP</option>
                                                                <option value="">TIN TỨC - KHUYỄN MẠI</option>
                                                                <option value="">QUẢNG CÁO - BANNER</option>
                                                                <option value="">Apple (Iphone)</option>
                                                                <option value="">OPPO</option>
                                                                <option value="">Sony</option>
                                                                <option value="">LENOVO</option>
                                                                <option value="">PC - Máy bộ</option>
                                                                <option value="">Máy bộ DELL</option>
                                                                <option value="">Máy bộ Asus - Gamming</option>
                                                                <option value="">Tin Công Nghệ</option>
                                                                <option value="">Tin khuyễn mại</option>
                                                            </select>
                                                        </ul>
                                                    </div>


                                                </div><!-- end .dropdown-list-pd -->
                                            </div>
                                        </div>
                                        <div class="form-group form-hidden" rel="chosenCateOfItem">
                                            <label for="viewCateOfItem" class="dropdown-list-pd col-sm-2 control-label text-bold" style="margin-top: 10px">CPU:</label>
                                            <div class="col-sm-10">
                                                <div class="dropdown-list-pd">
                                                    <div class="info-list-pd clearfix">
                                                        <ul for="0" level="1">
                                                            <select>
                                                                <option value="" selected>None</option>
                                                                <option value="">Exynos 8890, 8 Nhân</option>
                                                                <option value="">Apple A10</option>
                                                                <option value="">snapdragon 821 2.5 Ghz</option>
                                                                <option value="">Intel, Celeron, N3050, 1.60 GHz</option>
                                                                <option value="">Core i5 650 3.2 Ghz/ Cache 4M/ 2.5 GT/s </option>
                                                                <option value="">Intel core I5 6300HQ</option>
                                                                <option value="">Intel Core i3 2100</option>
                                                            </select>
                                                        </ul>
                                                    </div>
                                                </div><!-- end .dropdown-list-pd -->
                                            </div>
                                        </div>
                                        <div class="form-group form-hidden" rel="chosenCateOfItem">
                                            <label for="viewCateOfItem" class="dropdown-list-pd col-sm-2 control-label text-bold" style="margin-top: 10px">Ram:</label>
                                            <div class="col-sm-10">
                                                <div class="dropdown-list-pd">
                                                    <div class="info-list-pd clearfix">
                                                        <ul for="0" level="1">
                                                            <select>
                                                                <option value="" selected>None</option>
                                                                <option value="">	DDR3L (1 khe RAM), 2 GB, 1600 MHz</option>
                                                                <option value="">4G</option>
                                                                <option value="">3G</option>
                                                                <option value="">6G</option>
                                                                <option value="">DDRam3 Dual Channel 4GB bus 1333 (2GB x 2)</option>
                                                                <option value="">8G DDR4 2100</option>
                                                                <option value="">4G DDR3</option>
                                                            </select>
                                                        </ul>
                                                    </div>


                                                </div><!-- end .dropdown-list-pd -->
                                            </div>
                                        </div>
                                        <div class="form-group form-hidden" rel="chosenCateOfItem">
                                            <label for="viewCateOfItem" class="dropdown-list-pd col-sm-2 control-label text-bold" style="margin-top: 10px">Screen:</label>
                                            <div class="col-sm-10">
                                                <div class="dropdown-list-pd">
                                                    <div class="info-list-pd clearfix">
                                                        <ul for="0" level="1">
                                                            <select>
                                                                <option value="" selected>None</option>
                                                                <option value="">5.1 inch (1440 x 2560 pixels)</option>
                                                                <option value="">15.6 inch, HD (1366 x 768 pixels)</option>
                                                                <option value="">Gigabyte H81-DS2</option>
                                                                <option value="">ASUS H61-DS2</option>
                                                            </select>
                                                        </ul>
                                                    </div>
                                                </div><!-- end .dropdown-list-pd -->
                                            </div>
                                        </div>
                                        <div class="form-group form-hidden" rel="chosenCateOfItem">
                                            <label for="viewCateOfItem" class="dropdown-list-pd col-sm-2 control-label text-bold" style="margin-top: 10px">VGA:</label>
                                            <div class="col-sm-10">
                                                <div class="dropdown-list-pd">
                                                    <div class="info-list-pd clearfix">
                                                        <ul for="0" level="1">
                                                            <select>
                                                                <option value="" selected>None</option>
                                                                <option value="">Mali-T880 MP12</option>
                                                                <option value="">chip apple 6 nhân</option>
                                                                <option value="">adreno900</option>
                                                                <option value="">Intel® HD Graphics, Share (Dùng chung bộ nhớ với RAM)</option>
                                                                <option value="">Intel® HD Graphics</option>
                                                                <option value="">GTX 950M 4G GDDR4</option>
                                                                <option value="">Intel hd </option>
                                                            </select>
                                                        </ul>
                                                    </div>


                                                </div><!-- end .dropdown-list-pd -->
                                            </div>
                                        </div>
                                        <div class="form-group form-hidden" rel="chosenCateOfItem">
                                            <label for="viewCateOfItem" class="dropdown-list-pd col-sm-2 control-label text-bold" style="margin-top: 10px">Storage:</label>
                                            <div class="col-sm-10">
                                                <div class="dropdown-list-pd">
                                                    <div class="info-list-pd clearfix">
                                                        <ul for="0" level="1">
                                                            <select>
                                                                <option value="" selected>None</option>
                                                                <option value="">HDD, 500 GB</option>
                                                                <option value="">250GB SATA 7200 rpm </option>
                                                                <option value="">1T HDD, 128G SSD</option>
                                                                <option value="">256 G HDD</option>
                                                                <option value="">32 GB</option>
                                                                <option value="">256 G</option>
                                                                <option value="">128 G</option>
                                                            </select>
                                                        </ul>
                                                    </div>


                                                </div><!-- end .dropdown-list-pd -->
                                            </div>
                                        </div>
                                        <div class="form-group form-hidden" rel="chosenCateOfItem">
                                            <label for="viewCateOfItem" class="dropdown-list-pd col-sm-2 control-label text-bold" style="margin-top: 10px">Extend Memory:</label>
                                            <div class="col-sm-10">
                                                <div class="dropdown-list-pd">
                                                    <div class="info-list-pd clearfix">
                                                        <ul for="0" level="1">
                                                            <select>
                                                                <option value="" selected>None</option>
                                                                <option value="">MicroSD (T-Flash)</option>
                                                                <option value="">có</option>
                                                                <option value="">Case thường</option>
                                                            </select>
                                                        </ul>
                                                    </div>


                                                </div><!-- end .dropdown-list-pd -->
                                            </div>
                                        </div>
                                        <div class="form-group form-hidden" rel="chosenCateOfItem">
                                            <label for="viewCateOfItem" class="dropdown-list-pd col-sm-2 control-label text-bold" style="margin-top: 10px">Cam 1:</label>
                                            <div class="col-sm-10">
                                                <div class="dropdown-list-pd">
                                                    <div class="info-list-pd clearfix">
                                                        <ul for="0" level="1">
                                                            <select>
                                                                <option value="" selected>None</option>
                                                                <option value="">12MP</option>
                                                                <option value="">dual 12 MP</option>
                                                                <option value="">0.9 MP(16:9)</option>
                                                                <option value="">Intel FAN Chuẩn</option>
                                                                <option value="">INTEL FAN</option>
                                                            </select>
                                                        </ul>
                                                    </div>


                                                </div><!-- end .dropdown-list-pd -->
                                            </div>
                                        </div>
                                        <div class="form-group form-hidden" rel="chosenCateOfItem">
                                            <label for="viewCateOfItem" class="dropdown-list-pd col-sm-2 control-label text-bold" style="margin-top: 10px">Cam 2:</label>
                                            <div class="col-sm-10">
                                                <div class="dropdown-list-pd">
                                                    <div class="info-list-pd clearfix">
                                                        <ul for="0" level="1">
                                                            <select>
                                                                <option value="" selected>None</option>
                                                                <option value="">CTS 350W</option>
                                                                <option value="">5 MP</option>
                                                                <option value="">7MP</option>
                                                                <option value="">350W CTS</option>
                                                            </select>
                                                        </ul>
                                                    </div>


                                                </div><!-- end .dropdown-list-pd -->
                                            </div>
                                        </div>
                                        <div class="form-group form-hidden" rel="chosenCateOfItem">
                                            <label for="viewCateOfItem" class="dropdown-list-pd col-sm-2 control-label text-bold" style="margin-top: 10px">Sim:</label>
                                            <div class="col-sm-10">
                                                <div class="dropdown-list-pd">
                                                    <div class="info-list-pd clearfix">
                                                        <ul for="0" level="1">
                                                            <select>
                                                                <option value="" selected>None</option>
                                                                <option value="">1 Sim Micro</option>
                                                                <option value="">2 Sim Micro</option>
                                                            </select>
                                                        </ul>
                                                    </div>


                                                </div><!-- end .dropdown-list-pd -->
                                            </div>
                                        </div>
                                        <div class="form-group form-hidden" rel="chosenCateOfItem">
                                            <label for="viewCateOfItem" class="dropdown-list-pd col-sm-2 control-label text-bold" style="margin-top: 10px">Kết nối:</label>
                                            <div class="col-sm-10">
                                                <div class="dropdown-list-pd">
                                                    <div class="info-list-pd clearfix">
                                                        <ul for="0" level="1">
                                                            <select>
                                                                <option value="" selected>None</option>
                                                                <option value="">Wi-Fi 802.11 a/b/g/n/ac, dual-band, DLNA, Wi-Fi Direct, Wi-Fi hotspot</option>
                                                                <option value="">802.11b/g/n, Bluetooth v4.0</option>
                                                                <option value="">USB, VGA, COM, Display Port </option>
                                                                <option value="">Wi-Fi 802.11 a/b/g/n/ac, Linning</option>
                                                                <option value="">Wi-Fi 802.11 a/b/g/n/, LAN 1G</option>
                                                            </select>
                                                        </ul>
                                                    </div>


                                                </div><!-- end .dropdown-list-pd -->
                                            </div>
                                        </div>
                                        <div class="form-group form-hidden" rel="chosenCateOfItem">
                                            <label for="viewCateOfItem" class="dropdown-list-pd col-sm-2 control-label text-bold" style="margin-top: 10px">PIN:</label>
                                            <div class="col-sm-10">
                                                <div class="dropdown-list-pd">
                                                    <div class="info-list-pd clearfix">
                                                        <ul for="0" level="1">
                                                            <select>
                                                                <option value="" selected>None</option>
                                                                <option value="">Li-Ion 4 cell</option>
                                                                <option value="">3000mAh</option>
                                                                <option value="">2890mAh</option>
                                                                <option value="">Li-Ion 4 cell</option>
                                                                <option value="">4Cel</option>
                                                            </select>
                                                        </ul>
                                                    </div>


                                                </div><!-- end .dropdown-list-pd -->
                                            </div>
                                        </div>
                                        <div class="form-group form-hidden" rel="chosenCateOfItem">
                                            <label for="viewCateOfItem" class="dropdown-list-pd col-sm-2 control-label text-bold" style="margin-top: 10px">Hệ Điều Hành:</label>
                                            <div class="col-sm-10">
                                                <div class="dropdown-list-pd">
                                                    <div class="info-list-pd clearfix">
                                                        <ul for="0" level="1">
                                                            <select>
                                                                <option value="" selected>None</option>
                                                                <option value="">Andoid 6.0</option>
                                                                <option value="">IOS 10.0</option>
                                                                <option value="">Andoid 7.0</option>
                                                                <option value="">Windows 10 bản dùng thử</option>
                                                                <option value="">Cài sẵn Windows 7 bản quyền</option>
                                                                <option value="">Windows 10 bản dùng thử</option>
                                                                <option value="">Windows 10 bản quyền</option>
                                                            </select>
                                                        </ul>
                                                    </div>
                                                </div><!-- end .dropdown-list-pd -->
                                            </div>
                                        </div>
                                        <div class="form-group form-hidden" rel="chosenCateOfItem">
                                            <label for="viewCateOfItem" class="dropdown-list-pd col-sm-2 control-label text-bold" style="margin-top: 10px">Note:</label>
                                            <div class="col-sm-10">
                                                <div class="dropdown-list-pd">
                                                    <textarea class="form-control" maxlength="300" for="miniDecription" rows="5" placeholder="Note"></textarea>
                                                </div>
                                        </div>
                                    </div>
                                </div><!--BOX Danh Mục -->
                                <div class="panel panel-warning active" id="cdt-info-price" style="margin-top: 10px">
                                    <div class="panel-heading"><h3 class="panel-title">Thông tin giá & khuyến mại</h3></div>
                                    <div class="panel-body">
                                        <div class="form-group form-lp" rel="viewCateOfItem">
                                            <label for="viewCateOfItem" class="col-sm-2 control-label text-bold">Giá <span class="text-danger">*</span></label>
                                            <div class="col-sm-10">
                                                <div class="form-group dropdown-group dropdown-price-one">
                                                    <label for="wightItem" class="col-sm-2 control-label"></label>
                                                    <div class="col-sm-12">
                                                        <div class="dropdown-details clearfix" role="alert">
                                                            <div class="form-weight clearfix">
                                                                <div class="" rel="priceOfItem">
                                                                    <div class="col-lg-10 col-lg-offset-2"
                                                                         style="margin-left: 6%;">
                                                                        <span class="text-danger hi-notice"
                                                                              for="error_sellPrice"
                                                                              style="display: block;"></span>
                                                                        <span class="text-danger hi-notice"
                                                                              for="error_startPrice"
                                                                              style="display: block;"></span>
                                                                    </div>

                                                                    <div class="col-md-10">
                                                                        <div class="form-inline clearfix">
                                                                            <div class="form-left text-left col-sm-6"
                                                                                 style="float:left;">
                                                                                <label class="text-bold">Giá bán: <span
                                                                                            class="text-danger">*</span></label>
                                                                                <div class="input-group">
                                                                                    <input type="text"
                                                                                           class="form-control inputnumber"
                                                                                           name="priceItem"
                                                                                           placeholder="Giá bán phải lớn hơn 1.000 đ"
                                                                                           value="">
                                                                                    <span class="input-group-addon">đ</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-right form-model col-sm-6">

                                                                                <label class="lb-oldprice text-bold">Giá
                                                                                    gốc:</label>
                                                                                <div class="input-group ip-price">
                                                                                    <input type="text"
                                                                                           class="form-control inputnumber"
                                                                                           name="oldPriceItem"
                                                                                           placeholder="">
                                                                                    <span class="input-group-addon">đ</span>
                                                                                </div>

                                                                            </div>
                                                                        </div>

                                                                    </div>


                                                                    <div class="col-lg-10 col-lg-offset-2">
                                                                        <span class="text-danger hi-notice"
                                                                              style="display: none">Lỗi gì đó ...</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group dropdown-group dropdown-price-multi"
                                                     style="display: none">
                                                    <label for="wightItem" class="col-sm-2 control-label"></label>
                                                    <div class="col-sm-12">
                                                        <div class="dropdown-details clearfix" role="alert">
                                                            <div class="clearfix"
                                                                 style="background: #eee;padding: 15px;">
                                                                <span class="text-uppercase">Cài đặt giá theo thuộc tính</span>
                                                                <div class="content-title clearfix">
                                                                    <div class="content-top">
                                                                        <table class="table">
                                                                            <thead>
                                                                            <tr>
                                                                                <th width="40%" class="text-center">
                                                                                    Ảnh/Mô tả mã hàng <i
                                                                                            class="fa fa-question-circle"></i>
                                                                                </th>
                                                                                <th width="20%" class="text-center">Màu
                                                                                    sắc
                                                                                </th>
                                                                                <th width="40%" class="text-center">
                                                                                    Cỡ/số lượng/giá
                                                                                </th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody rel="tableSKU">

                                                                            <tr rel="719">
                                                                                <td>
                                                                                    <div class="form-setting">
                                                                                        <div class="hi-thumb">
                                                                                            <a>
                                                                                                <input rel="colorSKU_719"
                                                                                                       name="image719"
                                                                                                       id="image"
                                                                                                       type="file"
                                                                                                       style="display: none"
                                                                                                       onchange="additemnew.addImageColorSKUByLocal('719');">
                                                                                                <img data-toggle="tooltip"
                                                                                                     data-placement="top"
                                                                                                     title=""
                                                                                                     data-original-title="Upload ảnh"
                                                                                                     rel="colorSKU_719"
                                                                                                     name="img-upload-item719"
                                                                                                     src="/public/back-end/images/demo.jpg">
                                                                                            </a>
                                                                                        </div>
                                                                                        <div class="hi-input">
                                                                                            <input type="text"
                                                                                                   rel="colorSKU_719"
                                                                                                   class="form-control"
                                                                                                   for="name"
                                                                                                   onchange="additemnew.changeColorSave('719');"
                                                                                                   onkeypress="additemnew.countCharacters(this,80);"
                                                                                                   maxlength="80"
                                                                                                   placeholder="Tên mã hàng"
                                                                                                   value="">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <div class="input-group">
                                                                                        <input type="text"
                                                                                               rel="colorSKU_719"
                                                                                               class="form-control undisabled"
                                                                                               for="color"
                                                                                               aria-label="..."
                                                                                               placeholder="Màu sắc"
                                                                                               value=""
                                                                                               onchange="additemnew.onChangeLastSKUColor('719')"
                                                                                               disabled="">
                                                                                        <div class="input-group-btn">
                                                                                            <button type="button"
                                                                                                    rel="colorSKU_719"
                                                                                                    class="btn btn-default dropdown-toggle btn-caret"
                                                                                                    style=""
                                                                                                    data-toggle="dropdown"
                                                                                                    aria-haspopup="true"
                                                                                                    aria-expanded="false">
                                                                                                <span class="caret"></span>
                                                                                            </button>
                                                                                        </div><!-- /btn-group -->
                                                                                        <ul class="dropdown-menu dropdown-menu-right dropdown-menu dropdown-menu-color"
                                                                                            style="width: 215px; height: 200px; overflow: auto; display: none;"
                                                                                            rel="colorSKU_719">
                                                                                        </ul>
                                                                                    </div>
                                                                                    <!-- /input-group -->
                                                                                </td>
                                                                                <td>
                                                                                    <button type="button"
                                                                                            name="addbutton"
                                                                                            class="btn btn-default btn-blue btn-fa">
                                                                                        <i class="fa fa-plus-circle"
                                                                                           rel="719" for="colorSKU"></i>
                                                                                    </button>
                                                                                    <div class="input-group">
                                                                                        <input type="text"
                                                                                               rel="colorSKU_719"
                                                                                               class="form-control undisabled"
                                                                                               for="skuSize"
                                                                                               aria-label="..."
                                                                                               placeholder="Cỡ/số lượng/giá. Chọn bên ~>"
                                                                                               disabled="">
                                                                                        <div class="input-group-btn">
                                                                                            <button type="button"
                                                                                                    rel="sizeSKU_719"
                                                                                                    class="btn btn-default dropdown-toggle btn-caret"
                                                                                                    data-toggle="dropdown"
                                                                                                    aria-haspopup="true"
                                                                                                    aria-expanded="false">
                                                                                                <i class="fa fa-cog"
                                                                                                   aria-hidden="true"></i>
                                                                                            </button>
                                                                                        </div><!-- /btn-group -->
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group dropdown-group dropdown-product" rel="skuOfItem">
                                            <label for="inputEmail3" class="col-sm-2 control-label"></label>
                                        </div>
                                        <div class="form-group" rel="miniDecription">
                                            <label for="miniDecription" class="col-sm-2 control-label  text-bold">
                                                Khuyến mại 1
                                            </label>

                                            <div class="col-sm-10">
                                                <textarea class="form-control" maxlength="300" for="miniDecription" rows="5" placeholder="Khuyến mại 1"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group" rel="miniDecription">
                                            <label for="miniDecription" class="col-sm-2 control-label  text-bold">
                                                Khuyến mại 2
                                            </label>

                                            <div class="col-sm-10">
                                                <textarea class="form-control" maxlength="300" for="miniDecription" rows="5" placeholder="Khuyến mại 2"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group" rel="miniDecription">
                                            <label for="miniDecription" class="col-sm-2 control-label  text-bold">
                                                Khuyến mại 3
                                            </label>

                                            <div class="col-sm-10">
                                                <textarea class="form-control" maxlength="300" for="miniDecription" rows="5" placeholder="Khuyến mại 3"></textarea>
                                            </div>
                                        </div>

                                    </div>
                                </div><!--BOX Thông tin giá & khuyến mại-->
                                <div class="panel panel-success" id="cdt-detail-image" style="margin-top: 10px">
                                    <div class="panel-heading"><h3 class="panel-title">Thông tin chi tiết &amp; ảnh sản
                                            phẩm</h3></div>
                                    <div class="panel-body">
                                        <div class="form-group form-details" rel="detailOfItem">
                                            <label for="detailItem" class="col-sm-2 control-label text-bold">Mô tả chi
                                                tiết sản phẩm: <span class="text-danger">*</span>
                                                <!--i class="fa fa-star text-danger"></i--></label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" maxlength="300" for="miniDecription" rows="5" placeholder="Các điểm nổi bật chính của sản phẩm"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-10 col-lg-offset-2">
                                            <span class="text-danger hi-notice" for=""></span>
                                        </div>
                                        <div class="form-group form-photo-product" rel="imageOfItem">
                                            <label for="imageOfItem" class="col-sm-2 control-label text-bold">Hình ảnh
                                                sản phẩm: <span class="text-danger">*</span>
                                                <!--i class="fa fa-star text-danger"></i--></label>
                                            <div class="col-sm-10">
                                                <!--<div class="info-photo-product clearfix dropzone">-->
                                                <div class="info-photo-product clearfix">
                                                    <ul class="list-inline list-pd-scroll">
                                                        <li>
                                                            <div class="img-thumb add-news">
                                                                <div class="user-thumb">
                                                                    <span class="user-thumb-html"><img
                                                                                src="/public/back-end/images/avatar-user.jpg"
                                                                                rel="upload"></span>
                                                                    <input type="file" name="imageItems" rel="imageItem"
                                                                           class="chose-file"
                                                                           onchange="additemnew.addImageByLocal()"
                                                                           multiple="">
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="img-thumb add-news" data-toggle="modal"
                                                                 data-target="#myModal">
                                                                <a href="javascript:;">
                                                                    <i class="fa fa-link"></i>
                                                                    <p>Thêm ảnh <br> từ internet</p>
                                                                </a>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <div class="slider-left-porduct clearfix">
                                                        <div id="content-5"
                                                             class="abses content horizontal-images light">
                                                            <ul for="view">
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="stateItem" class="col-sm-2 control-label text-bold">Gán tag sản
                                                phẩm:</label>
                                            <div class="col-sm-3">
                                                <div class="input-group">
                                                    <input type="text" name="tag" class="form-control"
                                                           placeholder="Nhập tag liên quan...">
                                                    <span class="input-group-btn">
                                                    <button class="btn btn-success" type="button" style="height: 34px;"
                                                            onclick="additemnew.addTag()">Thêm tag</button>
                                                </span>
                                                </div><!-- /input-group -->
                                            </div>
                                            <div class="col-sm-7 tags-html">

                                            </div>
                                        </div>
                                    </div>
                                </div><!--BOX Chi tiết sản phẩm & ảnh SP -->

                            </form>
                            <div class="panel panel-info" id="cdt-config-shipment">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Cấu hình phí vận chuyển</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group form-tranfer clearfix">
                                        <label for="inputPassword3" class="col-sm-2 control-label text-right text-bold">Phí
                                            vận chuyển:</label>
                                        <div class="col-sm-10 pvc">
                                            <div class="radio">
                                                <label class="radio-btn">
                                                    <input type="radio" name="shipmentType" value="1">Phí vận chuyển
                                                    linh hoạt
                                                    <p>Phí vận chuyển linh hoạt theo địa chỉ người mua và cân nặng sản
                                                        phẩm <span class="text-bold">(theo bảng phí ChợĐiệnTử)</span>
                                                    </p>
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label class="radio-btn">
                                                    <input type="radio" name="shipmentType" id="ship-radio2" value="2">Phí
                                                    vận chuyển cố định toàn quốc
                                                </label>
                                                <div class="input-group input-click" style="width:30%; display:none;">
                                                    <input type="text" onkeyup="textUtils.changeNumber(this);"
                                                           name="shipmentTypePrice" class="form-control" placeholder="">
                                                    <span class="input-group-addon form-addon"
                                                          id="basic-addon2">đ</span>
                                                </div>
                                            </div>
                                            <div class="radio">
                                                <label class="radio-btn">
                                                    <input type="radio" name="shipmentType" value="3">Miễn phí vận
                                                    chuyển
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!--BOX cấu hình phí vận chuyển -->

                        </div>
                        <div class="bottom-btn text-right">
                            <ul class="list-inline">

                                <li>
                                    <button class="btn btn-default" onclick="additemnew.saveTemporary();" type="button">
                                        <i class="fa fa-save"></i><br>Lưu tạm
                                    </button>
                                </li>

                                <li>
                                    <button class="btn btn-default btn-cancel"
                                            onclick="window.location = '/userv2/item.html'" type="button"><i
                                                class="fa fa-close"></i><br>Huỷ
                                    </button>
                                </li>
                                <li>
                                    <button class="btn btn-default btn-right" onclick="additemnew.addItem();"
                                            type="button"><i class="fa fa-send"></i><br>
                                        Đăng bán

                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="second">

                    </div><!-- end .box-tab -->
                </div>
            </div><!-- end .maincontent -->
        </div><!--end .pd-item -->
        <div class="modal fade" id="myModal" tabindex="0" role="dialog" aria-labelledby="myModalLabel"
             style="display: none;">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content modal-push modal-push-repository">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">× Đóng lại</span></button>
                        <span>Hãy nhập link sản phẩm:</span>
                    </div>
                    <div class="modal-body">
                        <div class="input-group">
                            <input type="text" class="form-control" name="imageUrl"
                                   placeholder="Nhập URL hình ảnh vào đây">
                            <span class="input-group-btn">
                            <button class="btn btn-default btn-caret" type="button">OK</button>
                        </span>
                        </div><!-- /input-group -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection