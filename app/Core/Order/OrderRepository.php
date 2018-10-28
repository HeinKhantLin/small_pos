<?php

namespace App\Core\Order;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Core\Order\Order;


class OrderRepository implements OrderRepositoryInterface
{
  
    public function getObjByID($id){
      $result  = Order::find($id);
      return $result;
    }
}
