<?php
/**
 * Created by PhpStorm.
 * User: ThanhND
 * Date: 12/10/2018
 * Time: 1:52 AM
 */

namespace App\Http\Service;


use App\Http\DB\UserDatabase;

class ServiceUser
{
    public function getNumberUserByShopId($shopId) {
        $userDatabase = new UserDatabase();
        return $userDatabase->getNumberUserByShopId($shopId);
    }
}