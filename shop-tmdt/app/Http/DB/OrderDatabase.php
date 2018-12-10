<?php
/**
 * Created by PhpStorm.
 * User: ThanhND
 * Date: 12/10/2018
 * Time: 1:48 AM
 */

namespace App\Http\DB;


use Illuminate\Support\Facades\DB;

class OrderDatabase
{
    public function getNumberOrderByShopId($shopId) {
        $totalOrder = DB::table('orders')
            ->join('orders_detail', 'orders.id', '=', 'orders_detail.o_id')
            ->join('products', 'products.id', '=', 'orders_detail.pro_id')
            ->where('products.shop_id','=', $shopId)
            ->count();
        return $totalOrder;
    }
}