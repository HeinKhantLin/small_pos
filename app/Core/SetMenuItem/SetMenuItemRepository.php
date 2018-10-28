<?php

namespace App\Core\SetMenuItem;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Core\SetMenuItem\SetMenuItem;


class SetMenuItemRepository implements SetMenuItemRepositoryInterface
{
  
    public function login(){
      $result  = SetMenuItem::whereNull('deleted_at')->first();
      return $result;
    }
}
