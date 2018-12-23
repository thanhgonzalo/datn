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

    public function getListOrderByShopId($shopId)
    {
        $listProductId = Products::select('id')->where('shop_id', '=', $shopId)->get()->toArray();
        $listOrderId = DB::table('orders')
            ->join('orders_detail', 'orders.id', '=', 'orders_detail.o_id')
            ->join('products', 'products.id', '=', 'orders_detail.pro_id')
            ->whereIn('products.id', $listProductId)
            ->lists('orders.id');
        $listOrder = DB::table('orders')
            ->select('orders.id', 'users.name', 'users.address', 'users.phone', 'users.email', 'orders.created_at','orders.total','orders.status')
            ->join('users', 'users.id', '=', 'orders.c_id')
            ->whereIn('orders.id', $listOrderId)
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
}