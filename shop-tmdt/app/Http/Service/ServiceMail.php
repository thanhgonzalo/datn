<?php
/**
 * Created by PhpStorm.
 * User: ThanhND
 * Date: 12/23/2018
 * Time: 11:01 PM
 */

namespace App\Http\Service;


use Illuminate\Support\Facades\Mail;

class ServiceMail
{
    public function sendMailShip($shipmentOrder) {
        $email = $shipmentOrder->address_to->email;
        Mail::send('mail.shiporder', ['data' => $shipmentOrder], function ($message) use ($email) {
            $message->to($email, 'Artisans Web')
                ->subject('Mail xác nhận chuyển hàng');
            $message->from('thanhndbkhn@gmail.com','chothuongmaidientu');
        });
    }

    public function sendConfirm($order, $email) {
        Mail::send('mail.confirmorder', ['data' => $order], function ($message) use ($email) {
            $message->to($email, 'Artisans Web')
                ->subject('Xác nhận đơn hàng từ chothuongmaidientu');
            $message->from('thanhndbkhn@gmail.com','chothuongmaidientu');
        });
    }
}