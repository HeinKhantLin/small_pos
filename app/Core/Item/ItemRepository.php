<?php

namespace App\Core\Item;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Core\Item\Item;


class ItemRepository implements ItemRepositoryInterface
{
  
    public function getObjs(){
      $result  = Item::whereNull('deleted_at')->get();
      return $result;
    }
}
