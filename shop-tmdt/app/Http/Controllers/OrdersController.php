<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Model\Orders;
use App\Http\Model\Orders_detail;
use DB;

class ordersController extends Controller
{
    public function getlist()
    {
    	$data = orders::paginate(10);
    	return view('back-end.orders.list',['data'=>$data]);
    }

    public function getdetail($id)
    {
    	$order = orders::where('id',$id)->first();
    	$data = DB::table('orders_detail')
    			 	->join('products', 'products.id', '=', 'orders_detail.pro_id')
    			 	->groupBy('orders_detail.id')
    			 	->where('o_id',$id)
    			 	->get();
    	return view('back-end.orders.detail',['data'=>$data,'order'=>$order]);
    }
    public function postdetail($id)
    {
    	$order = orders::find($id);

    	$order->status = 1;
    	$order->save();
    	return redirect('admin/donhang')
      	->with(['flash_level'=>'result_msg','flash_massage'=>' Đã xác nhận đơn hàng thành công !']);    	

    }
     public function getdel($id)
    {       
    	$order = orders::where('id',$id)->first();
    	if ($order->status ==1) {
    		return redirect()->back()
    		->with(['flash_level'=>'result_msg','flash_massage'=>'Không thể hủy đơn hàng số: '.$id.' vì đã được xác nhận!']);
    	} else {
    		$order = orders::find($id);
        	$order->delete();
        	return redirect('admin/donhang')
         	->with(['flash_level'=>'result_msg','flash_massage'=>'Đã hủy bỏ đơn hàng số:  '.$id.' !']);
     	}
    }
}
