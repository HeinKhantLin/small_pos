<?php

namespace App\Core\OrderExtra;
use Illuminate\Database\Eloquent\Model;

class OrderExtra extends Model
{
    protected $table = 'order_extra';

    protected $fillable = [
        'order_detail_id',
        'extra_item_id',
        'quantity',
        'amount',
        'status',
        'created_at','updated_at','deleted_at','created_by','updated_by','deleted_by'
    ];
}
