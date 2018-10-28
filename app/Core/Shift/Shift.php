<?php

namespace App\Core;

class Shift extends Model
{
    protected $table = 'shift';

    protected $fillable = [
        'id',
        'name',
        'status',
        'created_at','updated_at','deleted_at','created_by','updated_by','deleted_by'
    ];
}
