<?php
/**
 * Created by PhpStorm.
 * User: ThanhND
 * Date: 12/10/2018
 * Time: 12:15 AM
 */
namespace App\Http\DB;


use App\Http\Model\Shops;

class ShopDatabase
{
    public function getShopByEmail($email) {
        $shop = Shops::where('email',$email)->first();
        return $shop;
    }
}