<?php
/**
 * Created by PhpStorm.
 * User: ThanhND
 * Date: 12/17/2018
 * Time: 11:41 PM
 */

namespace App\Http\Controllers;



use App\Http\Service\ServiceOnePay;

class OnePayController extends Controller
{
    public function postorder() {

        $data = array(
            'Title' => 'Test',
            'AgainLink' => 'http://127.0.0.1/dat-hang?paymethod=onpay',
            'vpc_Amount' => 100 * 100,
            'vpc_Customer_Email' => 'thanhnd@gmail.com',
            'vpc_Customer_Id' => 'thanhnd@gmail.com',
            'vpc_Customer_Phone' => '0967211692',
            'vpc_MerchTxnRef' => '20181219224614121363325s',
            'vpc_OrderInfo' => 'Dat hang test',
            'vpc_ReturnURL' => 'http://127.0.0.1/paymentonepay',
            'vpc_SHIP_City' => 'Hà Nội',
            'vpc_SHIP_Country' => 'Viet Nam',
            'vpc_SHIP_Provice' => 'Cau Giay',
            'vpc_SHIP_Street01' => '108 Hoang Quoc Viet',
            'vpc_TicketNo' => '%3A%3A1',
        );
        $onePay = new ServiceOnePay($data);
        $url = $onePay->buildUrl();
//                $url = 'https://mtf.onepay.vn/onecomm-pay/vpc.op?Title=VPC+3-Party&vpc_AccessCode=D67342C2&vpc_Amount=100&vpc_Command=pay&vpc_Currency=VND&vpc_Customer_Email=support%40onepay.vn&vpc_Customer_Id=thanhvt&vpc_Customer_Phone=840904280949&vpc_Locale=vn&vpc_MerchTxnRef=20181219225448128483959&vpc_Merchant=ONEPAY&vpc_OrderInfo=JSECURETEST01&vpc_ReturnURL=http%3A%2F%2F127.0.0.1%2Fpaymentonepay&vpc_SHIP_City=Ha+Noi&vpc_SHIP_Country=Viet+Nam&vpc_SHIP_Provice=Hoan+Kiem&vpc_SHIP_Street01=39A+Ngo+Quyen&vpc_TicketNo=%3A%3A1&vpc_Version=2&vpc_SecureHash=2919A010AD6D62712C53EFEF87410D8C09C4B2E798B59EBB4977BE22749A9955';
//
//        $url = 'https://mtf.onepay.vn/onecomm-pay/vpc.op?Title=VPC+3-Party&vpc_AccessCode=D67342C2&vpc_Amount=100&vpc_Command=pay&vpc_Currency=VND&vpc_Customer_Email=support%40onepay.vn&vpc_Customer_Id=thanhvt&vpc_Customer_Phone=840904280949&vpc_Locale=vn&vpc_MerchTxnRef=20181219225448128483959&vpc_Merchant=ONEPAY&vpc_OrderInfo=JSECURETEST01&vpc_ReturnURL=http%3A%2F%2F127.0.0.1%2Fpaymentonepay&vpc_SHIP_City=Ha+Noi&vpc_SHIP_Country=Viet+Nam&vpc_SHIP_Provice=Hoan+Kiem&vpc_SHIP_Street01=39A+Ngo+Quyen&vpc_TicketNo=%3A%3A1&vpc_Version=2&vpc_SecureHash=2919A010AD6D62712C53EFEF87410D8C09C4B2E798B59EBB4977BE22749A9955';
        return redirect()->to($url)->send();
    }

    public function getorder() {
        var_dump('tvpc_ReturnURL
        
        
        tt'); exit;
    }
}