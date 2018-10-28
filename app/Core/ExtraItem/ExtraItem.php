<?php

namespace App\Core\ExtraItem;

use Illuminate\Database\Eloquent\Model;

class ExtraItem extends Model
{
    protected $table = 'extra_item';

    protected $fillable = [
        'id',
        'item_id',
        'name',
        'price',
        'status',
        'created_at','updated_at','deleted_at','created_by','updated_by','deleted_by'
    ];
}
