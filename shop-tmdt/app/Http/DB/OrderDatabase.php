<?php
/**
 * Created by PhpStorm.
 * User: ThanhND
 * Date: 12/10/2018
 * Time: 1:48 AM
 */

namespace App\Http\DB;


use App\Http\Model\Orders;
use App\Http\Model\Products;
use Illuminate\Support\Facades\DB;

class OrderDatabase
{
    public function getNumberOrderByShopId($shopId)
    {
        $totalOrder = DB::table('orders')
            ->join('orders_detail', 'orders.id', '=', 'orders_detail.o_id')
            ->join('products', 'products.id', '=', 'orders_detail.pro_id')
            ->where('products.shop_id', '=', $shopId)
            ->count();
        return $totalOrder;
    }

    public function getNumberOrderNewByShopId($shopId, $agoDate)
    {
        $totalNewOrder = DB::table('orders')
            ->join('orders_detail', 'orders.id', '=', 'orders_detail.o_id')
            ->join('products', 'products.id', '=', 'orders_detail.pro_id')
            ->where('products.shop_id', '=', $shopId)
            ->where('orders.created_at', '>', $agoDate)
            ->count();
        return $totalNewOrder;
    }

    public function getListOrderByShopId($shopId, $listStatus)
    {

        $listProductId = Products::select('id')->where('shop_id', '=', $shopId)->get()->toArray();
        $listOrderId = DB::table('orders')
            ->join('orders_detail', 'orders.id', '=', 'orders_detail.o_id')
            ->join('products', 'products.id', '=', 'orders_detail.pro_id')
            ->whereIn('products.id', $listProductId)
            ->lists('orders.id');
        DB::enableQueryLog();
        $listOrder = DB::table('orders')
            ->select('orders.id', 'users.name', 'users.address', 'users.phone', 'users.email', 'orders.created_at','orders.total','orders.status')
            ->join('users', 'users.id', '=', 'orders.c_id')
            ->whereIn('orders.id', $listOrderId)
            ->whereIn('orders.status', $listStatus)
            ->paginate(10);
        $query = DB::getQueryLog();
        $query = end($query);
        return $listOrder;
    }

    public function getAllOrder($listStatus) {
        $listOrder = DB::table('orders')
            ->select('orders.id', 'users.name', 'users.address', 'users.phone', 'users.email', 'orders.created_at','orders.total','orders.status')
            ->join('users', 'users.id', '=', 'orders.c_id')
            ->whereIn('orders.status', $listStatus)
            ->paginate(10);
        return $listOrder;
    }

    public function getOrder($orderId) {
        $order = DB::table('orders')
            ->where('id',$orderId)
            ->first();
        return $order;
    }

    public function  confimOrder($token) {
        DB::table('orders')
            ->where('orders.token', $token)
            ->update(['orders.status' => 5]);
    }

    public function getInfoOrder($orderId) {
        $orderInfo = DB::table('orders')
            ->select('orders.id','orders.total','orders.type','users.name','users.email','users.phone','users.address')
            ->join('users','orders.c_id', '=', 'users.id')
            ->where('orders.id', '=', $orderId)
            ->first();
        return $orderInfo;
    }

    public function getOrderByOrderId($orderId) {
       return Orders::where('id',$orderId)->first();
    }

    public function getOrderDetailByOrderId($orderId) {
        $orderDetail = DB::table('orders_detail')
            ->select('products.id','products.images','products.name','products.intro','orders_detail.qty','products.price','products.status')
            ->join('products', 'products.id', '=', 'orders_detail.pro_id')
            ->groupBy('orders_detail.id')
            ->where('o_id',$orderId)
            ->get();

        return $orderDetail;
    }

    public function getListProductId($orderId) {
        $listProductID = DB::table('orders_detail')
            ->select('orders_detail.pro_id')
            ->join('orders','orders.id', '=', 'orders_detail.o_id')
            ->where('orders.id', '=', $orderId)
            ->lists('orders_detail.pro_id');

        return $listProductID;
    }
}