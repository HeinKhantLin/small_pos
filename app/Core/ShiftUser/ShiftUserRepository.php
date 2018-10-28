<?php

namespace App\Core\ShiftUser;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Core\ShiftUser\ShiftUser;


class ShiftUserRepository implements ShiftUserRepositoryInterface
{
  
    public function login(){
      $result  = ShiftUser::whereNull('deleted_at')->first();
      return $result;
    }
}
