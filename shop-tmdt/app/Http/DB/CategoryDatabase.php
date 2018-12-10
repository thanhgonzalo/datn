<?php
/**
 * Created by PhpStorm.
 * User: nguyenducthanh
 * Date: 12/10/2018
 * Time: 1:59 PM
 */

namespace App\Http\DB;


use App\Http\Model\Category;
use Illuminate\Support\Facades\DB;

class CategoryDatabase
{
    public function getListCategoryByShopId($shopId) {
        $listCategoryId = DB::table('products')
                        ->distinct()
                        ->join('shops', 'products.shop_id', '=', 'shops.id')
                        ->where('shop_id', '=', $shopId)
                        ->lists('products.cat_id');
        DB::enableQueryLog();
        $listCategory = DB::table('category')
                        ->distinct()
                        ->whereIn('category.id', $listCategoryId)
                        ->get();

        return $listCategory;
    }

    public function getListCategoryAll() {
        $listCategoryAll = Category::all();
        return $listCategoryAll;
    }
}