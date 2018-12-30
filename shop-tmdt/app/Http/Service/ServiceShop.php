<?php
/**
 * Created by PhpStorm.
 * User: ThanhND
 * Date: 12/10/2018
 * Time: 12:11 AM
 */

namespace App\Http\Service;


use App\Http\DB\OrderDatabase;
use App\Http\DB\ShopDatabase;

class ServiceShop
{
    public function getShopByEmail($email) {
        $shopDatabase = new ShopDatabase();
        return $shopDatabase->getShopByEmail($email);
    }

    public function createShop($data) {
        $shopDatabase = new ShopDatabase();
        $shopDatabase->createShop($data);
    }

    public function getAllShop() {
        $shopDatabase = new ShopDatabase();
        return $shopDatabase->getAllShop();
    }

    public function getShopByOrderId($orderId) {
        $orderDatabase = new OrderDatabase();
        $listProductId = $orderDatabase->getListProductId($orderId);

        $shopDatabase = new ShopDatabase();
        $shop = $shopDatabase->getShopByListProductId($listProductId);
        return $shop;
    }
}