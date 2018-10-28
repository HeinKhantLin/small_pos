<?php

namespace App\Core\OrderDetail;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_detail';

    protected $fillable = [
        'id',
        'order_id',
        'item_id',
        'order_type_id',
        'set_menu_id',
        'quantity',
        'amount',
        'status',
        'created_at','updated_at','deleted_at','created_by','updated_by','deleted_by'
    ];
}
