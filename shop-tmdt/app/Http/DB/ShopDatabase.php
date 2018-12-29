<?php
/**
 * Created by PhpStorm.
 * User: ThanhND
 * Date: 12/10/2018
 * Time: 12:15 AM
 */
namespace App\Http\DB;


use App\Http\Model\Shops;
use Illuminate\Support\Facades\DB;

class ShopDatabase
{
    public function getShopByEmail($email) {
        $shop = Shops::where('email',$email)->first();
        return $shop;
    }

    public function createShop($data) {
        Shops::create([
            'name'           => $data['shop_name'],
            'id_bank'        => $data['id_bank'],
            'email'          => $data['email'],
            'password'       => bcrypt($data['password']),
            'phone'          => $data['phone'],
            'name_bank'      => $data['name_bank'],
            'name_user_shop' => $data['name_user_shop'],
            'remember_token' => $data['token'],
            'address'        => $data['address'],
            'status'         => '1',
        ]);
    }

    public function getAllShop() {
        $listShop = DB::table('shops')
            ->paginate(10);
        return $listShop;
    }
}