<?php
/**
 * Created by PhpStorm.
 * User: ThanhND
 * Date: 11/25/2018
 * Time: 2:57 PM
 */

namespace App\Http\Controllers;
use App\Orders;
use App\Products;
use App\Shops;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ShopsController extends Controller
{
    public function index() {
        return view('shop.resgister');
    }

    public function home() {
        session_start();
        if(!isset($_SESSION["shop"])) {
            return redirect('/');
        }
        $email = $_SESSION["shop"];
        $shop = Shops::where('email',$email)->first();

        $totalOrder = DB::table('orders')
                        ->join('orders_detail', 'orders.id', '=', 'orders_detail.o_id')
                        ->join('products', 'products.id', '=', 'orders_detail.pro_id')
                        ->where('products.shop_id','=',$shop->id)
                        ->count();

        $totalCustomer = DB::table('users')
                        ->rightjoin('')
                        ->join('orders_detail', 'orders.id', '=', 'orders_detail.o_id')
                        ->join('products', 'products.id', '=', 'orders_detail.pro_id')
                        ->where('products.shop_id','=',$shop->id)
                        ->count();
        $totalNewOrder = 0;
        $totalProduct = Products::where('shop_id',$shop->id)->count();
        $totalCustomer = 0;

        $data = array(
            'shop_name'        => $shop->name,
            'total_order'      => $totalOrder,
            'total_new_order'  => $totalNewOrder,
            'total_product'    => $totalProduct,
            'total_customer'   => $totalCustomer
        );
        return view('back-end.shop.home')->with('data', $data);
    }

    public function register(Request $request) {
        $this->validate($request,
            [
                'shop_name'                  => 'required|min:3|max:50',
                'id_bank'                    => 'required',
                'address'                    => 'required|min:3|max:50',
                'email'                      => 'required|email',
                'phone'                      => 'numeric|min:10',
                'password'                   => 'min:6',
                'password_confirmation'      => 'same:password|min:6'
            ],
            [
                'shop_name.max'              => 'Nhập tên shop quá dài',
                'shop_name.min'              => 'Nhập tên shop quá ngắn',
                'id_bank.required'           => 'Hãy nhập id tài khoản ngân lượng của bạn',
                'email.email'                => 'Hãy nhập đúng định dạng email',
                'password_confirmation.same' => 'Pass xác nhận không chính xác'

            ]);

        $data['shop_name'] = $request->input('shop_name');
        $data['id_bank']   = $request->input('id_bank');
        $data['address']   = $request->input('address');
        $data['email']     = $request->input('email');
        $data['phone']     = $request->input('phone');
        $data['password']  = $request->input('password');
        $data['name']      = $request->input('shop_name');
        $data['token']     = Str::random(60);

        Shops::create([
            'name'           => $data['shop_name'],
            'id_bank'        => $data['id_bank'],
            'email'          => $data['email'],
            'password'       => bcrypt($data['password']),
            'phone'          => $data['phone'],
            'remember_token' => $data['token'],
            'address'        => $data['address'],
            'status'         => '1',
        ]);

        // Create Session shop
        $_SESSION["shop"] = $data['email'];
        return redirect('shops/home');
    }

    public function login(Request $request) {
        $email    = $request->input('email');
        $password = $request->input('password');

        if($email == null || $password == null) {
            return redirect('/');
        }

        $shop = Shops::where('email',$email)->first();
        if ($shop!== null && Hash::check($password, $shop->password)) {
            // Create Session shop
            session_start();
            $_SESSION["shop"] = $email;
            return redirect('shops/home');
        }
        return redirect('/');
    }
}