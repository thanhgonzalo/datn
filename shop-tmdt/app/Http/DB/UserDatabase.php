<?php
/**
 * Created by PhpStorm.
 * User: ThanhND
 * Date: 12/10/2018
 * Time: 1:52 AM
 */

namespace App\Http\DB;


class UserDatabase
{
    public function getNumberUserByShopId($shopId) {
        $totalCustomer = \DB::table('users')
            ->distinct()
            ->join('orders', 'orders.c_id', '=', 'users.id')
            ->join('orders_detail', 'orders.id', '=', 'orders_detail.o_id')
            ->join('products', 'products.id', '=', 'orders_detail.pro_id')
            ->where('products.shop_id','=', $shopId)
            ->count();
        return $totalCustomer;
    }
}