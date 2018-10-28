<?php

namespace App\Core\SetMenu;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Core\SetMenu\SetMenu;


class SetMenuRepository implements SetMenuRepositoryInterface
{
  
    public function getObjs(){
      $result  = SetMenu::whereNull('deleted_at')->get();
      return $result;
    }

    public function getOrderSetMenu(){
      $result  = SetMenu::leftjoin('set_menu_item','set_menu_item.set_menu_id','=','set_menu.id')
      			 ->leftjoin('item','item.id','=','set_menu_item.item_id')
      			 ->select('set_menu.id','item.name as item_name','item.price as item_price')
      			 ->get();
      return $result;
    }
}
