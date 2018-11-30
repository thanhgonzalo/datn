<?php
/**
 * Created by PhpStorm.
 * User: ThanhND
 * Date: 11/25/2018
 * Time: 2:57 PM
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Requests;

class ShopsController extends Controller
{
    public function index() {
        return view('shop.resgister');

    }

    public function register(Request $request) {
        $this->validate($request,
            [
                'shop_name'                  => 'required|min:3|max:50',
                'id_bank'                    => 'required',
                'address'                    => 'required|min:3|max:50',
                'email'                      => 'required|email',
                'phone'                      => 'numeric|min:10|max:10',
                'password'                   => 'min:6',
                'password_confirmation'      => 'required_with:password|same:password|min:6'
            ],
            [
                'shop_name.max'              => 'Nhập tên shop quá dài',
                'shop_name.min'              => 'Nhập tên shop quá ngắn',
                'id_bank.required'           => 'Hãy nhập id tài khoản ngân lượng của bạn',
                'email.email'                => 'Hãy nhập đúng định dạng email',
                'password_confirmation.same' => 'Pass xác nhận không chính xác'

            ]);

        $name = $request->input('shop_name');
        var_dump($name); exit;
    }
}