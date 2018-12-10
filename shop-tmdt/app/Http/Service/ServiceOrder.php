<?php
/**
 * Created by PhpStorm.
 * User: ThanhND
 * Date: 12/10/2018
 * Time: 1:46 AM
 */

namespace App\Http\Service;


use App\Http\DB\OrderDatabase;

class ServiceOrder
{
    public function getNumberOrderByShopId($shopId) {
        $orderDataBase = new OrderDatabase();
        return $orderDataBase->getNumberOrderByShopId($shopId);
    }
}