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

    public function getOrderByOrderId($orderId) {
        $orderDataBase = new OrderDatabase();
        return $orderDataBase->getOrderByOrderId($orderId);
    }

    public function getOrderDetailByOrderId($orderId) {
        $orderDataBase = new OrderDatabase();
         return $orderDataBase->getOrderDetailByOrderId($orderId);
    }
    public function getNumberOrderNewByShopId($shopId) {
        $orderDatabase = new OrderDatabase();
        $currentDate = \Carbon\Carbon::now();
        $agoDate = $currentDate->subDays($currentDate->dayOfWeek)->subWeek();
        return $orderDatabase->getNumberOrderNewByShopId($shopId, $agoDate);
    }

    public function getListOrderByShopId($shopId, $orderStatus = 0) {
        $orderDataBase = new OrderDatabase();
        $listStatus = [];

        switch ($orderStatus) {
            case 100: $listStatus = [0,1,2,3,4,5,6,7]; break;
            case 0: $listStatus = [0]; break;
            case 1: $listStatus = [1]; break;
            case 5: $listStatus = [5]; break;
            case 6: $listStatus = [6]; break;
            case 7: $listStatus = [7]; break;
            case 8: $listStatus = [8]; break;
            default: $listStatus = [2,3,4]; break;
        }
        if($shopId == 0) {
            return $orderDataBase->getAllOrder($listStatus);
        }
        return $orderDataBase->getListOrderByShopId($shopId, $listStatus);
    }

    public function getOrder($orderId) {
        $orderDataBase = new OrderDatabase();
        return $orderDataBase->getOrder($orderId);
    }

    public function confimOrder($token) {
        $orderDataBase = new OrderDatabase();
        $orderDataBase-> confimOrder($token);
    }

    public function getInfoOrder($orderId) {
        $orderDataBase = new OrderDatabase();
        return $orderDataBase->getInfoOrder($orderId);
    }
}