<?php
/**
 * Created by PhpStorm.
 * User: ThanhND
 * Date: 11/25/2018
 * Time: 2:57 PM
 */

namespace App\Http\Controllers;
use App\Http\Model\Shops;
use App\Http\Service\ServiceOrder;
use App\Http\Service\ServiceShop;
use App\Http\Model\Products;
use App\Http\Service\ServiceUser;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ShopsController extends Controller
{
    /**
     * Register shop get
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        return view('shop.resgister');
    }

    /**
     * Display begin
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home() {
        session_start();
        if(!isset($_SESSION["shop"])) {
            return redirect('/');
        }
        $serviceShop = new ServiceShop();
        $email = $_SESSION["shop"];
        $shop = $serviceShop->getShopByEmail($email);

        $serviceOrder = new ServiceOrder();
        $totalOrder = $serviceOrder->getNumberOrderByShopId($shop->id);

        $serviceUser = new ServiceUser();
        $totalCustomer = $serviceUser->getNumberUserByShopId($shop->id);

        $currentDate = \Carbon\Carbon::now();
        $agoDate = $currentDate->subDays($currentDate->dayOfWeek)->subWeek();
        $totalNewOrder = \DB::table('orders')
                        ->join('orders_detail', 'orders.id', '=', 'orders_detail.o_id')
                        ->join('products', 'products.id', '=', 'orders_detail.pro_id')
                        ->where('products.shop_id','=',$shop->id)
                        ->where('orders.created_at', '>', $agoDate)
                        ->count();
        $totalProduct = Products::where('shop_id',$shop->id)->count();

        $data = array(
            'shop_name'        => $shop->name,
            'total_order'      => $totalOrder,
            'total_new_order'  => $totalNewOrder,
            'total_product'    => $totalProduct,
            'total_customer'   => $totalCustomer
        );
        return view('back-end.shop.home')->with('data', $data);
    }

    /**
     * Add product for shop
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addproduct() {
        session_start();
        if(!isset($_SESSION["shop"])) {
            return redirect('/');
        }
        return view('back-end.shop.addproduct');
    }

    /**
     * Register shop
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
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

    /**
     * Login shop (maybe after login)
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
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