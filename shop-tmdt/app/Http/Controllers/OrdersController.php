<?php

namespace App\Http\Controllers;

use App\Http\Service\ServiceGoShip;
use App\Http\Service\ServiceMail;
use App\Http\Service\ServiceOrder;
use App\Http\Service\ServiceProduct;
use App\Http\Service\ServiceShop;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Model\Orders;
use App\Http\Model\Orders_detail;
use DB;

class ordersController extends Controller
{
    public function getListByShop(Request $request) {
        session_start();
        if(!isset($_SESSION["shop"])) {
            return redirect('/');
        }

        $serviceShop = new ServiceShop();
        $email       = $_SESSION["shop"];
        $shop        = $serviceShop->getShopByEmail($email);
        $orderStatus = 0;
        if(isset($_GET['statusOrder'])){
            $orderStatus = $_GET['statusOrder'];
        }
        $serviceOrder = new ServiceOrder();
        $listOrderShop = $serviceOrder->getListOrderByShopId($shop->id, $orderStatus);
        return view('back-end.shop.orders.list',['data'=>$listOrderShop,'orderStatus' => $orderStatus]);
    }


    public function getDetailByShop($id) {
        $order = orders::where('id',$id)->first();
        $data = DB::table('orders_detail')
            ->select('products.id','products.images','products.name','products.intro','orders_detail.qty','products.price','products.status')
            ->join('products', 'products.id', '=', 'orders_detail.pro_id')
            ->groupBy('orders_detail.id')
            ->where('o_id',$id)
            ->get();
        return view('back-end.shop.orders.detail',['data'=>$data,'order'=>$order]);
    }

    public function getDeleteDetail($id) {
        $order = orders::where('id',$id)->first();
        if ($order->status ==1) {
            return redirect()->back()
                ->with(['flash_level'=>'result_msg','flash_massage'=>'Không thể hủy đơn hàng số: '.$id.' vì đã được xác nhận!']);
        } else {
            $order = orders::find($id);
            $order->delete();
            return redirect('shops/donhang')
                ->with(['flash_level'=>'result_msg','flash_massage'=>'Đã hủy bỏ đơn hàng số:  '.$id.' !']);
        }
    }

    public function confimOrder($token) {
        $serviceOrder = new ServiceOrder();
        $serviceOrder->confimOrder($token);
    }

    public function sendOrder($orderId) {
        // Calculate money ship

        // Call API GoShip
        $serviceGoShip = new ServiceGoShip();
        $reponscecall = $serviceGoShip->callGoShip();
        if($reponscecall->code != 200) {
            var_dump('khong gui duoc hang');
            exit;
        }

        // Get Fee
        $listOrderShip = $serviceGoShip->getFee($orderId, $reponscecall->access_token);
        // Create shipmment;

        // Get info Order;

        $serviceOrder = new ServiceOrder();
        $order= $serviceOrder->getInfoOrder($orderId);
        //$shipment = $serviceGoShip->createShipment($order, $reponscecall->access_token);

        //if($shipment->code != 200) {
            //var_dump('khong gui dc hang');
        //}

        // Get info shipment;
        $shipmentOrder = $serviceGoShip->getInfoShipment($order, $reponscecall->access_token);
        // Send Mail shipment:
        $serviceMail = new ServiceMail();
        $serviceMail->sendMailShip($shipmentOrder);

        // Cập nhật trạng thái đơn hàng đang được gửi đi.
        $order = orders::find($orderId);
        $order->status = 6;
        $order->save();

        return redirect('shops/donhang')
            ->with(['flash_level'=>'result_msg','flash_massage'=>' Đã đăng ký gửi hàng qua GoShip!']);

    }
    public function postDetailByShop($id, Request $request) {

        if ($request->input('send-order') != null) {
            return redirect('shops/donhang/guihang/'.$id);
        }

        $arrShopId = $request->input('id_shop');
        $arrQty = $request->input('qty');

        $order = orders::find($id);
        $order->status = 1;
        $order->save();

        $serviceProduct = new ServiceProduct();
        foreach ($arrShopId as $key => $value) {
            $serviceProduct->updateQty($value, $arrQty[$key]);
        }

        return redirect('shops/donhang/detail/'.$id)
            ->with(['flash_level'=>'result_msg','flash_massage'=>' Đã xác nhận đơn hàng thành công !']);
    }

    public function getlist()
    {
        $data = orders::paginate(10);
        return view('back-end.orders.list',['data'=>$data]);
    }

    public function getdetail($id)
    {
        $order = orders::where('id',$id)->first();
        $data = DB::table('orders_detail')
                     ->join('products', 'products.id', '=', 'orders_detail.pro_id')
                     ->groupBy('orders_detail.id')
                     ->where('o_id',$id)
                     ->get();
        return view('back-end.orders.detail',['data'=>$data,'order'=>$order]);
    }
    public function postdetail($id)
    {
        $order = orders::find($id);

        $order->status = 1;
        $order->save();
        return redirect('admin/donhang')
          ->with(['flash_level'=>'result_msg','flash_massage'=>' Đã xác nhận đơn hàng thành công !']);        

    }
     public function getdel($id)
    {       
        $order = orders::where('id',$id)->first();
        if ($order->status ==1) {
            return redirect()->back()
            ->with(['flash_level'=>'result_msg','flash_massage'=>'Không thể hủy đơn hàng số: '.$id.' vì đã được xác nhận!']);
        } else {
            $order = orders::find($id);
            $order->delete();
            return redirect('admin/donhang')
             ->with(['flash_level'=>'result_msg','flash_massage'=>'Đã hủy bỏ đơn hàng số:  '.$id.' !']);
         }
    }
}
