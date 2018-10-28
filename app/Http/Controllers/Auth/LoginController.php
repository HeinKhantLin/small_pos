<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use App\Core\User\UserRepository;
use Auth;
use Validator;
use Illuminate\Support\Facades\Input;
use Redirect;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login()
        {
        $rules = array(
            'name'    => 'required',
            'password' => 'required' 
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('login')
                ->withErrors($validator)
                ->withInput(Input::except('password')); 
        } else {
            $userdata = array(
                'user_name'     => Input::get('name'),
                'password'  => Input::get('password')
            );
            if (Auth::attempt($userdata)) {
                return Redirect::to('dashboard');

            } else {        
                return Redirect::to('login');

            }

        }
    }


     public function logout() 
    {
        session()->flush();
        return redirect('/');
    }
}
