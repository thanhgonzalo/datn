<?php
/**
 * Created by PhpStorm.
 * User: ThanhND
 * Date: 12/23/2018
 * Time: 5:11 AM
 */

namespace App\Http\Controllers;


class GoShipController extends Controller
{
    public function requestapi() {
        // Xác thực
        $ch = curl_init();
        $header = array(
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbG123213'
        );

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

        curl_close ($ch);

        var_dump($server_output); exit;
    }
}