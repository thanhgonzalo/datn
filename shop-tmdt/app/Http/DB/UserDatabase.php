<?php
/**
 * Created by PhpStorm.
 * User: ThanhND
 * Date: 12/10/2018
 * Time: 1:52 AM
 */

namespace App\Http\DB;


use App\Http\Model\Products;
use Illuminate\Support\Facades\DB;

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

    public function getListUserByShopId($shopId) {
        $listProductId = Products::select('id')->where('shop_id', '=', $shopId)->get()->toArray();
        $listOrderId = \DB::table('orders')
            ->join('orders_detail', 'orders.id', '=', 'orders_detail.o_id')
            ->join('products', 'products.id', '=', 'orders_detail.pro_id')
            ->whereIn('products.id', $listProductId)
            ->lists('orders.id');
        $listUser = \DB::table('users')
            ->join('orders', 'users.id', '=', 'orders.c_id')
            ->whereIn('orders.id', $listOrderId)
            ->paginate(10);

        return $listUser;
    }

    public function getEmail($userId) {
        $email = DB::table('users')
            ->select('email')
            ->where('id', $userId)
            ->first();
        return $email;
    }
}