<?php

namespace App\Core\OrderExtra;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Core\OrderExtra\OrderExtra;


class OrderExtraRepository implements OrderExtraRepositoryInterface
{
  
    public function login(){
      $result  = OrderExtra::whereNull('deleted_at')->first();
      return $result;
    }
}
