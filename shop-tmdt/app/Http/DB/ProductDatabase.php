<?php
/**
 * Created by PhpStorm.
 * User: nguyenducthanh
 * Date: 12/10/2018
 * Time: 1:23 PM
 */

namespace App\Http\DB;


use App\Http\Model\Products;

class ProductDatabase
{
    public function getTotalNumberProductByShopId($shopId) {
        $totalProduct = Products::where('shop_id',$shopId)->count();
        return $totalProduct;
    }
}