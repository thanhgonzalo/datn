<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{!!url('public/back-end/css/order.css')!!}" rel="stylesheet">
    <title>Document</title>
</head>

<body onload="window.print();">
<div id="page" class="page">
    <div class="header">
        <div class="logo"><img src="{!!url('public/back-end/images/xepso.jpg')!!}"/></div>
        <div class="company">C.Ty TNHH {{$shop->name}}</div>
    </div>
    <br/>
    <div class="title">
        HÓA ĐƠN THANH TOÁN
        <br/>
        -------oOo-------
    </div>
    <br/>
    <br/>
    Khách hàng : {!!$order->user->name!!} <span
            style="padding-left: 242px">Số điện thoại: {{$order->user->phone}}</span><br>
    <p style="padding-bottom: 5px">Địa chỉ : {{$order->user->address}}</p>

    <table class="TableData">
        <tr>
            <th>STT</th>
            <th>Tên</th>
            <th>Đơn giá</th>
            <th>Số</th>
            <th>Thành tiền</th>
        </tr>
        <?php
        //        session_start();
        //        $tongsotien = 0;
        //        if(isset($_SESSION['giohang'])){
        //            $pos = 1;
        $totalMoney = 0;
        foreach ($orderDetail as $key => $value) {
            $totalMoney += $value->qty * $value->price;
            $pos = $key + 1;
            $totalMoneyProduct = number_format(($value->qty * $value->price),0,",",".");
            echo "<tr>";
            echo "<td class=\"cotSTT\">$pos</td>";
            echo "<td class=\"cotTenSanPham\">$value->name</td>";
            echo "<td class=\"cotGia\"><div>$value->price</div></td>";
            echo "<td class=\"cotSoLuong\" align='center'>$value->qty</td>";
            echo "<td class=\"cotSo\">$totalMoneyProduct</td>";
            echo "</tr>";
        }
        ?>
        <tr>
            <td colspan="4" class="tong">Tổng cộng</td>
            <td colspan="4" class="tong"><?php echo number_format(($totalMoney),0,",",".")?></td></td>
        </tr>
    </table>
    <?php
        $day = getdate();
        $stringDayEm = 'Hà Nội, ngày ' .$day['mday']. ' tháng '.$day['mon'].' năm '.$day['year'];
        $stringDayCus = 'Hà Nội, ngày ' .'...'. ' tháng '.'...'.' năm '.'...';
    ?>
    <div class="footer-left"><?php echo $stringDayCus ?><br/>
        Khách hàng
    </div>
    <div class="footer-right"><?php echo $stringDayEm ?><br/>
        Nhân viên
    </div>
</div>
</body>
</html>