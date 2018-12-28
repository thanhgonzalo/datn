<?php
/**
 * Created by PhpStorm.
 * User: nguyenducthanh
 * Date: 12/23/2018
 * Time: 2:30 PM
 */

namespace App\Http\Service;


class ServiceGoShip
{
    private $header;

    public function __construct() {
        $this->header = array(
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbG.....'
        );
    }

    public function callGoShip() {
        // Xác thực
        $ch = curl_init();

        $body = array(
            'username'      => 'thanhkthh5@gmail.com',
            'password'      => '12345rty',
            'client_id'     => 38,
            'client_secret' => 'c7MacYfeIP507rPUixZjf6B1VgAjEzGknQCGLi5w'
        );
        $url = 'http://sandbox.goship.io/api/v2/login';
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$body);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $server_output = curl_exec ($ch);
        $server_output = json_decode($server_output);
        curl_close ($ch);

        return $server_output;
    }

    public function getInfoShipment($order, $token) {
        $url = 'http://sandbox.goship.io/api/v2/shipments';
        $this->header = array(
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization: Bearer '.$token
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $shipmentInfo = curl_exec ($ch);
        str_replace('bool(true)', '', $shipmentInfo);
        curl_close ($ch);
        $shipmentInfo = json_decode($shipmentInfo);
        $listShip = $shipmentInfo->data;
        $shipOrder = null;
        foreach ($listShip as $shipment) {
            if($shipment->order_id == $order->id) {
                $shipOrder = $shipment;
                break;
            }
        }
        return $shipOrder;
    }
    public function createShipment($order, $token) {
        $url = 'http://sandbox.goship.io/api/v2/shipments';
        $this->header = array(
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization: Bearer '.$token
        );
        $cod = 0;
        if($order->type == 'cod') {
            $cod = $order->total;
        }
        $shipment = [
            'shipment' => [
                'rate'         => 'MTFfN181OTg=',
                'order_id'     => $order->id,
                'address_from' => [
                    'name'     => 'Nguyễn Đức Thành',
                    'phone'    => '0967211692',
                    'street'   => '106 Hoàng Quốc Việt',
                    'ward'     => '113',
                    'district' => '100900',
                    'city'     => '100000'
                ],
                'address_to'   => [
                    'name'     => $order->name,
                    'phone'    => $order->phone,
                    'street'   => $order->address,
                    'email'    => $order->email,
                    'district' => '100200',
                    'city'     => '100000'
                ],
                'parcel'       => [
                    'cod'     => $cod,
                    'weight'   => '220',
                    'width'    => '15',
                    'height'   => '15',
                    'length'   => '15',
                    'metadata' => 'Hàng dễ vỡ, vui lòng nhẹ tay.'
                ]
            ]
        ];
        $ch = curl_init();
        $shipment = json_encode($shipment);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->header);
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $shipment);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $server_output = curl_exec ($ch);
        $server_output = json_decode($server_output);
        return $server_output;
    }
    public function getFee($orderId, $token) {
        // Get info shop, customer to create OrderShip

        // Code demo
        $this->header = array(
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization: Bearer '.$token
        );
        $shipment = [
            'shipment' => [
                'address_from' => [
                    'district' => '100900',
                    'city'     => '100000'
                ],
                'address_to'   => [
                    'district' => '100200',
                    'city'     => '100000'
                ],
                'parcel'       => [
                    'cod'   => 500000,
                    'weight'   => '220',
                    'width'    => '15',
                    'height'   => '15',
                    'length'   => '15',
                ]
            ]
        ];
        $ch = curl_init();
        $shipment = json_encode($shipment);
        $url = 'http://sandbox.goship.io/api/v2/rates';

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->header);
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$shipment);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

        $shimentOutput = curl_exec ($ch);
//        $message = curl_error($ch);
        $shimentOutput = json_decode($shimentOutput);

        curl_close ($ch);

        return $shimentOutput;
    }
}