<?php
/**
 * Created by PhpStorm.
 * User: ThanhND
 * Date: 12/10/2018
 * Time: 1:46 AM
 */

namespace App\Http\Service;


use App\Http\DB\OrderDatabase;
use Illuminate\Support\Facades\DB;

class ServiceOrder
{
    public function getNumberOrderByShopId($shopId) {
        $orderDataBase = new OrderDatabase();
        return $orderDataBase->getNumberOrderByShopId($shopId);
    }

    public function getNumberOrderNewByShopId($shopId) {
        $orderDatabase = new OrderDatabase();
        $currentDate = \Carbon\Carbon::now();
        $agoDate = $currentDate->subDays($currentDate->dayOfWeek)->subWeek();
        return $orderDatabase->getNumberOrderNewByShopId($shopId, $agoDate);
    }

    public function getListOrderByShopId($shopId) {
        $orderDataBase = new OrderDatabase();
        return $orderDataBase->getListOrderByShopId($shopId);
    }
}