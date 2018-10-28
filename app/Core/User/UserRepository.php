<?php

namespace App\Core\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\User;


class UserRepository implements UserRepositoryInterface
{
  
    public function login(){
      $result  = User::whereNull('deleted_at')->first();
      return $result;
    }

    public function getOrderUser($id){
    	$result = User::leftjoin('shift_user','users.id','=','shift_user.user_id')
    			  ->leftjoin('shift','shift_user.shift_id','=','shift.id')
    			  ->select('users.user_name','shift.id as shift_id')
    			  ->where('users.id',$id)
    			  ->first();

    	return $result;
    }
}
