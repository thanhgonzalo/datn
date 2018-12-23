Chúng tôi đã gửi cho bạn 1 đơn hàng với:<br>
Mã đơn hàng: {{$data->order_id}}<br>
@if(isset($data->parcel->cod_amount))
    Tổng tiền  : {{$data->parcel->cod_amount}} đ<br>
    @endif
Phí vận chuyển : {{$data->delivery_fee}} đ<br>
<i style="color: red"> Chú ý : Đây là phí vận chuyển bên {{$data->carrier_name}}. Bạn vui lòng trả thêm khoản này</i><br>
Xin cám ơn!