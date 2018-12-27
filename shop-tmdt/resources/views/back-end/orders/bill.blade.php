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
        <div class="company">C.Ty TNHH Salomon</div>
    </div>
    <br/>
    <div class="title">
        HÓA ĐƠN THANH TOÁN
        <br/>
        -------oOo-------
    </div>
    <br/>
    <br/>
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
//            $tongsotien = 0;
//            foreach($_SESSION['giohang'] as $i => $row)
//            {
//                $tongsotien += $row['sp_soluong']*$row['sp_dongia'];
                echo "<tr>";
                echo "<td class=\"cotSTT\">dsa</td>";
                echo "<td class=\"cotTenSanPham\">dsa</td>";
                echo "<td class=\"cotGia\"><div> DAta</div></td>";
                echo "<td class=\"cotSoLuong\" align='center'>Data</td>";
                echo "<td class=\"cotSo\">data</td>";
                echo "</tr>";
//            }
//        }
        ?>
        <tr>
            <td colspan="4" class="tong">Tổng cộng</td>
            <td colspan="4" class="tong">500k</td>
        </tr>
    </table>
    <div class="footer-left"> Cần thơ, ngày 16 tháng 12 năm 2014<br/>
        Khách hàng </div>
    <div class="footer-right"> Cần thơ, ngày 16 tháng 12 năm 2014<br/>
        Nhân viên </div>
</div>
</body>
</html>