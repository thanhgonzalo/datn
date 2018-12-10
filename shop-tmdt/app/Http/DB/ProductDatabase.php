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

    public function getListProductByCategoryId($shopId, $categoryId) {
        if ($categoryId != 'all') {
            $listProduct = Products::where('cat_id', $categoryId)
                                   ->where('shop_id', $shopId)
                                   ->paginate(10);
        } else {
            $listProduct = Products::where('shop_id', $shopId)
                                   ->paginate(10);
        }

        return $listProduct;
    }
}