<?php
/**
 * Created by PhpStorm.
 * User: ThanhND
 * Date: 12/10/2018
 * Time: 12:11 AM
 */

namespace App\Http\Service;


use App\Http\DB\ShopDatabase;

class ServiceShop
{
    public function getShopByEmail($email) {
        $shopDatabase = new ShopDatabase();
        return $shopDatabase->getShopByEmail($email);
    }
}