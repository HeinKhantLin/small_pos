<?php

namespace App\Core;

class ShiftUser extends Model
{
    protected $table = 'shift_user';

    protected $fillable = [
        'id',
        'shift_id',
        'user_id',
        'status',
        'created_at','updated_at','deleted_at','created_by','updated_by','deleted_by'
    ];
}
