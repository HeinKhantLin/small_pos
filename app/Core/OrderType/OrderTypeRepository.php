<?php

namespace App\Core\OrderType;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\OrderType;


class OrderTypeRepository implements OrderTypeRepositoryInterface
{
  
    public function login(){
      $result  = OrderType::whereNull('deleted_at')->first();
      return $result;
    }
}
