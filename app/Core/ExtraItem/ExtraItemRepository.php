<?php

namespace App\Core\ExtraItem;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Core\ExtraItem\ExtraItem;


class ExtraItemRepository implements ExtraItemRepositoryInterface
{
  
    public function login(){
      $result  = ExtraItem::whereNull('deleted_at')->first();
      return $result;
    }
}
