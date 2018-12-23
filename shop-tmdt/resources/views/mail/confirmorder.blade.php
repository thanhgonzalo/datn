Chúng tôi gửi cho bạn 1 đơn hàng với:<br>
Mã đơn hàng: {{$data->id}}<br>
Tổng tiền  : {{$data->total}}<br>
Link confirm: <a href="{{ $link = url('dat-hang/confirm', $data->token)}}"> {{ $link }} </a><br>

<i style="color: red"> Chú ý : Đơn hàng này chưa kèm phí ship, Khi hàng được xuất kho chúng tôi sẽ gửi 1 email xác nhận khác </i><br>
Xin cám ơn!