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

    public function getListUserByShopId($shopId) {
        $userDatabase = new UserDatabase();
        return $userDatabase->getListUserByShopId($shopId);
    }

    public function getEmail($userId) {
        $userDatabase = new UserDatabase();
        $emailObj = $userDatabase->getEmail($userId);
        return $emailObj->email;
    }

    public function getUser($orderDebutId) {
        $userDatabase = new UserDatabase();
        return $userDatabase->getUser($orderDebutId);
    }
}