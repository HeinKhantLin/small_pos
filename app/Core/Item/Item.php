<?php

namespace App\Core\Item;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'item';

    protected $fillable = [
        'id',
        'name',
        'price',
        'status',
        'created_at','updated_at','deleted_at','created_by','updated_by','deleted_by'
    ];
}
