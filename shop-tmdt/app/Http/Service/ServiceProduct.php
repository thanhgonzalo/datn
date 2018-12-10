<?php
/**
 * Created by PhpStorm.
 * User: nguyenducthanh
 * Date: 12/10/2018
 * Time: 1:21 PM
 */

namespace App\Http\Service;


use App\Http\DB\ProductDatabase;

class ServiceProduct
{
    public function getTotalNumberProductByShopId($shopId) {
        $productDatabase = new ProductDatabase();
        return $productDatabase->getTotalNumberProductByShopId($shopId);
    }
}