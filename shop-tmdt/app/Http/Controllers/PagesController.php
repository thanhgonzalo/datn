<?php

namespace App\Http\Controllers;

use App\Http\Service\ServiceProduct;
use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Http\Model\Products;
use App\Http\Model\Category;
use App\Http\Model\Pro_detail;
use App\Http\Model\News;
use App\Http\Model\Orders;
use App\Http\Model\Orders_detail;
use DB,Cart,Datetime;
use Illuminate\Support\Facades\Session;

class PagesController extends Controller
{
    public function index()
    {
        // mobile
        $mobile = DB::table('products')
                ->join('category', 'products.cat_id', '=', 'category.id')
                ->join('pro_details', 'pro_details.pro_id', '=', 'products.id')
                ->where('category.parent_id','=','1')
                ->select('products.*','pro_details.cpu','pro_details.ram','pro_details.screen','pro_details.vga','pro_details.storage','pro_details.exten_memmory','pro_details.cam1','pro_details.cam2','pro_details.sim','pro_details.connect','pro_details.pin','pro_details.os','pro_details.note')
                ->paginate(9);
        $lap = DB::table('products')
                ->join('category', 'products.cat_id', '=', 'category.id')
                ->join('pro_details', 'pro_details.pro_id', '=', 'products.id')
                ->where('category.parent_id','=','2')
                ->select('products.*','pro_details.cpu','pro_details.ram','pro_details.screen','pro_details.vga','pro_details.storage','pro_details.exten_memmory','pro_details.cam1','pro_details.cam2','pro_details.sim','pro_details.connect','pro_details.pin','pro_details.os','pro_details.note')
                ->paginate(6);
        $pc = DB::table('products')
                ->join('category', 'products.cat_id', '=', 'category.id')
                ->join('pro_details', 'pro_details.pro_id', '=', 'products.id')
                ->where('category.parent_id','=','19')
                ->select('products.*','pro_details.cpu','pro_details.ram','pro_details.screen','pro_details.vga','pro_details.storage','pro_details.exten_memmory','pro_details.cam1','pro_details.cam2','pro_details.sim','pro_details.connect','pro_details.pin','pro_details.os','pro_details.note')
                ->paginate(4);

        return view('home',['mobile'=>$mobile,'laptop'=>$lap,'pc'=>$pc]);
    }
    public function addcart($id)
    {
        $pro = Products::where('id',$id)->first();
        Cart::add(['id' => $pro->id, 'name' => $pro->name, 'qty' => 1, 'price' => $pro->price,'options' => ['img' => $pro->images]]);
        return redirect()->route('getcart');
    }

    public function getupdatecart($id,$qty,$dk)
    {
      if ($dk=='up') {
         $qt = $qty+1;
         Cart::update($id, $qt);
         return redirect()->route('getcart');
      } elseif ($dk=='down') {
         $qt = $qty-1;
         Cart::update($id, $qt);
         return redirect()->route('getcart');
      } else {
         return redirect()->route('getcart');
      }
    }
    public function getdeletecart($id)
    {
     Cart::remove($id);
     return redirect()->route('getcart');
    }
    public function xoa()
    {
        Cart::destroy();   
        return redirect()->route('index');   
    }
    public function getcart()
    {
    return view ('detail.card')
        ->with('slug','Chi tiết đơn hàng');
    }
    public function getorder()
    {
        if (Auth::guest()) {
            return redirect('login');
        } else {

            return view ('detail.order')
            ->with('slug','Xác nhận');
        }
    }
    public function postorder(Request $rq)
    {
        $order = new orders();
        $serviceProduct = new ServiceProduct();

        $total =0;
        $strShopIdFail = "";
        foreach (Cart::content() as $row) {
            $total = $total + ( $row->qty * $row->price);
            // Check number products in shop
            $checkNumberProducts = $serviceProduct->checkNumberProducts($row->id, $row->qty);
            $arrayShopIdFail =  array();
            $arrayQty = array();
            if(is_numeric($checkNumberProducts)) {
                $arrayShopIdFail[] = $row->id;
                $arrayQty[] = $checkNumberProducts;
            }
            if($arrayShopIdFail != null) {
                foreach ($arrayShopIdFail as $key => $value) {
                    $strShopIdFail .= "\t" .'. Sản phẩm số '. $arrayShopIdFail[$key] . ' còn ' . $arrayQty[$key] .' chiếc'."\n";
                }
            }
        }
        if($strShopIdFail != "") {
            return redirect()->route('getcart')
                ->with(['flash_error'=>'result_msg',
                    'err_massage'=>' Sản phẩm bạn chọn quá nhiều so với kho hàng '.$strShopIdFail, 'total_count'=>$total]);
        }
        exit;
        // Insert into order
        $order->c_id = Auth::user()->id;
        $order->qty = Cart::count();
        $order->sub_total = floatval($total);
        $order->total =  floatval($total);
        $order->note = $rq->txtnote;
        $order->status = 0;
        $order->type = 'cod';
        $order->created_at = new datetime;
        $order->save();
        $o_id =$order->id;

        foreach (Cart::content() as $row) {
            // Insert into order detail
            $detail = new orders_detail();
            $detail->pro_id = $row->id;
            $detail->qty = $row->qty;
            $detail->o_id = $o_id;
            $detail->created_at = new datetime;
            $detail->save();

            // Update qty products in table
            $serviceProduct->updateQty($row->id, $row->qty);
        }
        Cart::destroy();
        return redirect()->route('getcart')
        ->with(['flash_level'=>'result_msg','flash_massage'=>' Đơn hàng của bạn đã được gửi đi !', 'total_count'=>$total]);
    }

    /**
     * Get data base mobile,laptop,pc
     * @param $cat
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getcate($cat)
    {
    	if ($cat == 'mobile') {
            // mobile
            $mobile = DB::table('products')
                ->join('category', 'products.cat_id', '=', 'category.id')
                ->join('pro_details', 'pro_details.pro_id', '=', 'products.id')
                ->where('category.parent_id','=','1')
                ->select('products.*','pro_details.cpu','pro_details.ram','pro_details.screen','pro_details.vga','pro_details.storage','pro_details.exten_memmory','pro_details.cam1','pro_details.cam2','pro_details.sim','pro_details.connect','pro_details.pin','pro_details.os','pro_details.note')
                ->paginate(12);
    		return view('category.mobile',['data'=>$mobile]);
    	} 
        elseif ($cat == 'laptop') {
            // mobile
            $lap = DB::table('products')
                ->join('category', 'products.cat_id', '=', 'category.id')
                ->join('pro_details', 'pro_details.pro_id', '=', 'products.id')
                ->where('category.parent_id','=','2')
                ->select('products.*','pro_details.cpu','pro_details.ram','pro_details.screen','pro_details.vga','pro_details.storage','pro_details.exten_memmory','pro_details.cam1','pro_details.cam2','pro_details.sim','pro_details.connect','pro_details.pin','pro_details.os','pro_details.note')
                ->paginate(12);
            return view('category.laptop',['data'=>$lap]);
        }
        elseif ($cat == 'pc') {
            // mobile
        $pc = DB::table('products')
                ->join('category', 'products.cat_id', '=', 'category.id')
                ->join('pro_details', 'pro_details.pro_id', '=', 'products.id')
                ->where('category.parent_id','=','19')
                ->select('products.*','pro_details.cpu','pro_details.ram','pro_details.screen','pro_details.vga','pro_details.storage','pro_details.exten_memmory','pro_details.cam1','pro_details.cam2','pro_details.sim','pro_details.connect','pro_details.pin','pro_details.os','pro_details.note')
                ->paginate(8);
            return view('category.pc',['data'=>$pc]);
        }
        elseif ($cat == 'tin-tuc') {
            $new =  DB::table('news')
                    ->orderBy('created_at', 'desc')
                    ->paginate(3);
            $top1 = $new->shift();
             $all =  DB::table('news')
                    ->orderBy('created_at', 'desc')
                    ->paginate(5);
            return view('category.news',['data'=>$new,'hot1'=>$top1,'all'=>$all]);
        }
    }
    public function detail($cat,$id,$slug)
    {
        if ($cat =='tin-tuc') {
            $new = News::where('id',$id)->first();
            return view('detail.news',['data'=>$new,'slug'=>$slug]);
        } elseif ($cat =='mobile') {
            $mobile = Products::where('id',$id)->first();
            if (empty($mobile)) {
                return view ('errors.503');
                } else {
                   return view ('detail.mobile',['data'=>$mobile,'slug'=>$slug]);
               }
        }
        elseif ($cat =='laptop') {
            $lap = Products::where('id',$id)->first();
            if (empty($lap)) {
            return redirect()->route('index');
            } else {
           return view ('detail.laptop',['data'=>$lap,'slug'=>$slug]);
            }
        }
        elseif ($cat =='pc') {            
            $pc = Products::where('id',$id)->first();
            if (empty($pc)) {
                return redirect()->route('index');
            } else {
                return view ('detail.pc',['data'=>$pc,'slug'=>$slug]);
            }
        } else {
            return redirect()->route('index');
        }
    }
}
