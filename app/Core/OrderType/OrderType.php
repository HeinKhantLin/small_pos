<?php

namespace App\Core\OrderType;

use Illuminate\Database\Eloquent\Model;

class OrderType extends Model
{
    protected $table = 'order_type';

    protected $fillable = [
        'id',
        'type',
        'status',
        'created_at','updated_at','deleted_at','created_by','updated_by','deleted_by'
    ];
}
