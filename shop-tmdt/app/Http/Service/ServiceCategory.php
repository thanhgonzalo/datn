<?php
/**
 * Created by PhpStorm.
 * User: nguyenducthanh
 * Date: 12/10/2018
 * Time: 1:58 PM
 */

namespace App\Http\Service;


use App\Http\DB\CategoryDatabase;

class ServiceCategory
{
    public function getListCategoryByShopId($shopId) {
        $categoryDatabase = new CategoryDatabase();
        return $categoryDatabase->getListCategoryByShopId($shopId);
    }

    public function getListCategoryAll() {
        $categoryDatabase = new CategoryDatabase();
        return $categoryDatabase-> getListCategoryAll();
    }
}