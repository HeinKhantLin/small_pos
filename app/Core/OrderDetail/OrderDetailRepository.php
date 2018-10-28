<?php

namespace App\Core\OrderDetail;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Core\OrderDetail\OrderDetail;
use App\Core\OrderExtra\OrderExtra;


class OrderDetailRepository implements OrderDetailRepositoryInterface
{
  
    public function getOrderDetail($id){
      $result  = OrderDetail::leftjoin('item','item.id','=','order_detail.item_id')
      			 ->leftjoin('set_menu','set_menu.id','=','order_detail.set_menu_id')
      			 ->select('order_detail.quantity','item.name as item_name','item.price as item_price','set_menu.name as set_menu_name','set_menu.price as set_menu_price', 'order_detail.set_menu_id','order_detail.id')
      			 ->where('order_detail.order_id',$id)
      			 ->get();
      return $result;
    }

    public function getExtra($id){
		$order_details = Orderdetail::where('order_id','=', $id)->get();
		$extra = array();
		foreach($order_details as $order){
			$tempAddon = OrderExtra::leftjoin('extra_item','extra_item.id','=','order_extra.extra_item_id')
						->select('order_extra.*','extra_item.name','extra_item.price')
						->where('order_extra.order_detail_id','=',$order->id)
						->get()->toArray();
			array_push($extra, $tempAddon);
			
		}
		
		return $extra;
	}
}
