<?php

namespace App\Core;

class SetMenuItem extends Model
{
    protected $table = 'set_menu_item';

    protected $fillable = [
        'id',
        'set_menu_item',
        'item_id',
        'status',
        'created_at','updated_at','deleted_at','created_by','updated_by','deleted_by'
    ];
}
