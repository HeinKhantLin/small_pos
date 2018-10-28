<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Core\Item\Item;
use App\Core\ExtraItem\ExtraItem;
use App\Core\Item\ItemRepository;
use App\Core\SetMenu\SetMenu;
use App\Core\SetMenu\SetMenuRepository;
use Illuminate\Support\Facades\Input;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Core\Order\Order;
use App\Core\OrderDetail\OrderDetail;
use App\Core\OrderExtra\OrderExtra;

class OrderController extends Controller
{
    public function order()
    {
        return view('cashier.order');
    }

    public function getItems() {
        
        $itemRepo       = new ItemRepository();
        $items          = $itemRepo->getObjs();

        return view('cashier.item')
                ->with('items',$items);
    }

     public function getSetMenu() {
        $setmenuRepo       = new SetMenuRepository();
        $setmenus             = $setmenuRepo->getObjs();
        return view('cashier.setmenu')
                ->with('setmenus',$setmenus);
    }

     public function itemList($id) {
        $uniqid     = uniqid();
        $itemRepo   = Item::select('id','name','price')
                      ->where('id',$id)
                      ->whereNull('deleted_at')
                      ->first();

        $itemRepo->uniqid              = $uniqid;

        //Check Extra
        $extra              = ExtraItem::select('id','name','price')
                              ->where('item_id',$id)
                              ->whereNull('deleted_at')
                              ->get()->toArray();
        if (count($extra) > 0) {
            $itemRepo->extra   = $extra;
        }
        return view('cashier.item_list')->with('itemRepo',$itemRepo);
    }

    public function setMenuList($id) {
        $uniqid         = uniqid();
        $setmenuRepo    = SetMenu::select('id','name','price')
                        ->where('id',$id)
                        ->whereNull('deleted_at')
                        ->first();
        $setmenuRepo->uniqid   = $uniqid;
        return view('cashier.setmenu_list')->with('setmenuRepo',$setmenuRepo);
    }

    public function store(){
        $user_id            =  Auth::user()->id;
        $uniqid             = Input::get('uniqid');
        $quantity           = Input::get('quantity');
        $item               = Input::get('item');
        $addon              = Input::get('addon');
        $originamount       = Input::get('originamount');
        $price              = Input::get('price');
        $extra_prices       = Input::get('extra');
        $type               = Input::get('type');
        $all_total_price    = Input::get('price_total');
        $discount_percent   = Input::get('discount_percent');
        if($discount_percent == null ){
            $discount_percent   = 0;
            $net_amount     = $all_total_price;
        }else{
            $discount_percent   = Input::get('discount_percent');
            $net_amount         = ($discount_percent / 100) * $all_total_price;    
        }

        $row_count      = count($quantity);
        $today          = Carbon::now();
        $cur_date       = Carbon::parse($today)->format('Y-m-d H:i:s');
        $extra_array    = array();
        for($count = 0; $count < $row_count; $count++) {
            $extra                    = $extra_prices[$count];
            $extra_array[$count]      = $extra;
        }
        $total_extra_price          = array_sum($extra_array);

         try
         {
            DB::beginTransaction();
            //Insert Into Order
                $order_type                 = 1;

                $paramObj                          = new Order();
                $paramObj->user_id                 = $user_id;
                $paramObj->order_type_id           = $order_type;
                $paramObj->total_extra_price       = $total_extra_price;
                $paramObj->discount_percent        = $discount_percent;
                $paramObj->total_price             = $all_total_price;
                $paramObj->all_total_amount        = $net_amount;
                $paramObj->created_by              = $user_id;
                $paramObj->created_at              = $cur_date;
                $paramObj->save();

                //Insert Into Order Detail
                $detailCount            = count($item);
                for ($itemCount = 0; $itemCount < $detailCount; $itemCount++) {
                    $uniqid_key                 = $uniqid[$itemCount];
                    //If item 0, set menu 1
                    $itemID                     = ($type[$itemCount] == '0' ? $item[$itemCount] : 0);
                    $setID                      = ($type[$itemCount] == '1' ? $item[$itemCount] : 0);

                    $detailObj                  = new Orderdetail();
                    $detailObj->order_id        = $paramObj->id;
                    $detailObj->item_id         = $itemID;
                    $detailObj->set_menu_id     = $setID;
                    $detailObj->quantity        = $quantity[$itemCount];
                    $detailObj->amount          = $originamount[$itemCount];
                    $detailObj->created_by      = $user_id;
                    $detailObj->created_at      = $cur_date;
                    $detailObj->save();

                     //Get Insert Order Detail ID
                    $detailID                   = $detailObj->id;
                    $addon_detail               = $addon[$itemCount];
                    $addon_array                = explode(",", $addon_detail);
                    foreach($addon_array as $add) {
                        if ($add !== '') {
                            $itemQty            = $quantity[$itemCount];
                            $addonPrice         = ExtraItem::select('price')->where('id',$add)->whereNull('deleted_at')->first();

                            $extraObj                   = new OrderExtra();
                            $extraObj->order_detail_id  = $detailID;
                            $extraObj->extra_item_id    = $add;
                            $extraObj->quantity         = $itemQty;
                            $extraObj->amount           = $addonPrice->price;
                            $extraObj->created_by       = $user_id;
                            $extraObj->created_at       = $cur_date;
                            $extraObj->save();
                        }
                    }
                }
              DB::commit();
              return redirect()->action('InvoiceController@receipt', [$paramObj->id]);
  

         }
         catch(\Exception $e){
                DB::rollback();
                echo $e->getMessage();
                echo $e->getLine();
        }
        
    }

}
