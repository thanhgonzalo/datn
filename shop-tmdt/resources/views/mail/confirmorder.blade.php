Chúng tôi gửi cho bạn 1 đơn hàng với:<br>
Mã đơn hàng: {{$data->id}}<br>
Tổng tiền  : {{$data->total}}<br>
Link confirm: <a href="{{ $link = url('dat-hang/confirm', $data->token)}}"> {{ $link }} </a>