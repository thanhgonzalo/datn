<?php

namespace App\Http\Controllers;

use App\Http\Service\ServiceShop;
use Illuminate\Http\Request;

use App\Http\Model\User;
use App\Http\Service\ServiceUser;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
   public function getlist()
   {
       $data = User::paginate(10);
       return view('back-end.users.list',['data'=>$data]);
   }
   public function getedit($id)
   {
       $data = User::where('id',$id)->first();
       return view('back-end.users.edit',['data'=>$data]);
   }

   public function getCustomerByShop() {
       session_start();
       if(!isset($_SESSION["shop"])) {
           return redirect('/');
       }

       $serviceShop = new ServiceShop();
       $email       = $_SESSION["shop"];
       $shop        = $serviceShop->getShopByEmail($email);

       $serviceUser = new ServiceUser();
       $data = $serviceUser->getListUserByShopId($shop->id);

       return view('back-end.shop.users.list',['data'=>$data]);
   }

   public function getEditCustomerByShop($id) {
       $data = User::where('id',$id)->first();
       return view('back-end.shop.users.edit',['data'=>$data]);
   }

   public function postEditCustomerByShop($id, Request $request) {
        var_dump($id);
   }
}
