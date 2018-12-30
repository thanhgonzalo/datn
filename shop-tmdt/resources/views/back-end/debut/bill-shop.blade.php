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
<div id="page" class="page" style="width: 28cm!important;">
    <div class="header">
        <div class="logo"><img src="{!!url('public/back-end/images/icon.png')!!}"/></div>
        <div class="company">Công ty thương mại điện tử chothuongmaidientu.com.vn</div>
    </div>
    <br/>
    <div class="title" style="color: #9a5f8b">
        PHIẾU THANH TOÁN HÀNG CHO SHOP
        <br/>
        -------oOo-------
    </div>
    <br/>
    <p>Thanh toán tiền cho hóa đơn : {!!$order->id!!}</p>

    <table class="TableData">
        <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Người thụ hưởng</th>
            <th>Số tài khoản</th>
            <th>Ngân hàng</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
        </tr>
        <?php
        $totalMoney = 0;
        foreach ($orderDetail as $key => $value) {
            $totalMoney += $value->qty * $value->price - $value->qty * $value->price * 2/100;
            $pos = $key + 1;
            $totalMoneyProduct = number_format(($value->qty * $value->price - $value->qty * $value->price * 2/100),0,",",".");
            $userShopName = $shop[$key]->name_user_shop;
            $idBank =  $shop[$key]->id_bank;
            $nameBank =  $shop[$key]->name_bank;
            $price = number_format(($value->price),0,",",".");
            echo "<tr>";
            echo "<td class=\"\">$pos</td>";
            echo "<td class=\"\">$value->name</td>";
            echo "<td class=\"\">$userShopName</td>";
            echo "<td class=\"\">$idBank</td>";
            echo "<td class=\"\">$nameBank</td>";
            echo "<td class=\"\"><div>$price</div></td>";
            echo "<td class=\"\" align='center'>$value->qty</td>";
            echo "<td class=\"\">$totalMoneyProduct</td>";
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
    <div class="footer-right"><?php echo $stringDayEm ?><br/>
        Nhân viên
    </div>
</div>
</body>
</html>