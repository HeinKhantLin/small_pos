<?php

namespace App\Http\Controllers;

use App\Core\Order\OrderRepository;
use App\Core\User\UserRepository;
use App\Core\OrderDetail\OrderDetailRepository;
use App\Core\SetMenu\SetMenuRepository;

class InvoiceController extends Controller
{
	public function receipt($id){

		$orderRepo 	= new OrderRepository();
		$order 		= $orderRepo->getObjByID($id);

		$order_user_id 	= $order->user_id;
		$userRepo 		= new UserRepository();
		$user 			= $userRepo->getOrderUser($order_user_id);
		$set_menuRepo 	= new SetMenuRepository();
		$set_menus 		= $set_menuRepo->getOrderSetMenu();

		$order_detailRepo 	= new OrderDetailRepository();
		$order_detail 		= $order_detailRepo->getOrderDetail($id);

		$order->order_detail = $order_detail;

		$extra 				= $order_detailRepo->getExtra($id);
		$order->extra 		= $extra;
        return view('cashier.receipt')
        	   ->with('order',$order)
        	   ->with('user',$user)
        	   ->with('set_menus',$set_menus);
    }
}