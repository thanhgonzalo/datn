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

    public function getListProductByCategoryId($shopId, $categoryId) {
        $productDatabase = new ProductDatabase();
        return $productDatabase->getListProductByCategoryId($shopId, $categoryId);
    }

    public function updateQty($shopId, $qtyDown) {
        $productDatabase = new ProductDatabase();
        $productDatabase->updateQty($shopId, $qtyDown);
    }

    public function checkNumberProducts($shopId, $qtyOrder) {
        $productDatabase = new ProductDatabase();
        return $productDatabase->checkNumberProducts($shopId, $qtyOrder);
    }
}