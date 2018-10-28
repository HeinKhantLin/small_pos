<?php

namespace App\Core\Order;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';

    protected $fillable = [
        'id',
        'total_extra_price',
        'all_total_amount',
        'status',
        'created_at','updated_at','deleted_at','created_by','updated_by','deleted_by'
    ];

     public function order_type(){
        return $this->belongsTo('App\Core\OrderType\OrderType','order_type_id','id');
    }
}
