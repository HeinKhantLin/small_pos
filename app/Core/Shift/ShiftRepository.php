<?php

namespace App\Core\Shift;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Core\Shift\Shift;


class ShiftRepository implements ShiftRepositoryInterface
{
  
    public function login(){
      $result  = Shift::whereNull('deleted_at')->first();
      return $result;
    }
}
