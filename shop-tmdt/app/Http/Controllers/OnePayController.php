<?php
/**
 * Created by PhpStorm.
 * User: ThanhND
 * Date: 12/17/2018
 * Time: 11:41 PM
 */

namespace App\Http\Controllers;



use App\Http\Model\Orders;
use App\Http\Model\Orders_detail;
use App\Http\Service\ServiceOnePay;
use App\Http\Service\ServiceProduct;
use Cart;
use Illuminate\Support\Facades\Auth;
use Session;

class OnePayController extends Controller
{
    public function postorder() {

        // Insert into order

        $order = new Orders();
        $total =0;
        $serviceProduct = new ServiceProduct();
        $strShopIdFail = "";

        foreach (Cart::content() as $row) {
            $total = $total + ( $row->qty * $row->price);
            // Check number products in shop
            $checkNumberProducts = $serviceProduct->checkNumberProducts($row->id, $row->qty);
            $arrayShopIdFail =  array();
            $arrayQty = array();
            if(is_numeric($checkNumberProducts)) {
                $arrayShopIdFail[] = $row->id;
                $arrayQty[] = $checkNumberProducts;
            }
            if($arrayShopIdFail != null) {
                foreach ($arrayShopIdFail as $key => $value) {
                    $strShopIdFail .= "\t" .'. Sản phẩm số '. $arrayShopIdFail[$key] . ' còn ' . $arrayQty[$key] .' chiếc'."\n";
                }
            }
        }
        if($strShopIdFail != "") {
            return redirect()->route('getcart')
                ->with(['flash_error'=>'result_msg',
                    'err_massage'=>' Sản phẩm bạn chọn quá nhiều so với kho hàng '.$strShopIdFail, 'total_count'=>$total]);
        }

        // Insert into order
        $order->c_id = Auth::user()->id;
        $order->qty = Cart::count();
        $order->sub_total = floatval($total);
        $order->total =  floatval($total);
        $order->status = 4;
        $order->type = 'onepay';
        $order->note = 'Thanh toán qua onepay';
        $order->created_at = new \DateTime();
        $order->save();
        $o_id =$order->id;

        foreach (Cart::content() as $row) {
            // Insert to orders details
            $detail = new Orders_detail();
            $detail->pro_id = $row->id;
            $detail->qty = $row->qty;
            $detail->o_id = $o_id;
            $detail->created_at = new \DateTime();
            $detail->save();

            // Update qty in products table
            //$serviceProduct->updateQty($row->id, $row->qty);
        }

        $data = array(
            'Title' => 'Test',
            'AgainLink' => 'http://chothuongmaidientu.com.vn/dat-hang?paymethod=onpay',
            'vpc_Amount' => $total,
            'vpc_Customer_Email' => 'thanhnd@gmail.com',
            'vpc_Customer_Id' => 'thanhnd@gmail.com',
            'vpc_Customer_Phone' => '0967211692',
            'vpc_MerchTxnRef' => '20181219224614121363325419',
            'vpc_OrderInfo' => 'Dat hang test',
            'vpc_ReturnURL' => 'http://chothuongmaidientu.com.vn/paymentonepay',
            'vpc_SHIP_City' => 'Hà Nội',
            'vpc_SHIP_Country' => 'Viet Nam',
            'vpc_SHIP_Provice' => 'Cau Giay',
            'vpc_SHIP_Street01' => '108 Hoang Quoc Viet',
            'vpc_TicketNo' => '%3A%3A1',
        );
        $onePay = new ServiceOnePay($data);
        $url = $onePay->buildUrl();

        return redirect()->to($url)->send();
    }

    public function getorder() {
        Cart::destroy();
        if($_GET['vpc_TxnResponseCode'] != null) {
            return redirect()->route('getcart')
                ->with(['flash_level'=>'result_msg','flash_massage'=>'Thanh toán đơn hàng thành công !','total_count'=>($_GET['vpc_Amount'])/100]);
        }else {
            return redirect()->route('getcart')
                ->with(['flash_error'=>'result_msg',
                    'err_massage'=>'Thanh toán không thành công']);
        }
    }
}