<?php

namespace App\Core\SetMenu;

use Illuminate\Database\Eloquent\Model;

class SetMenu extends Model
{
    protected $table = 'set_menu';

    protected $fillable = [
        'id',
        'name',
        'price',
        'status',
        'created_at','updated_at','deleted_at','created_by','updated_by','deleted_by'
    ];
}
