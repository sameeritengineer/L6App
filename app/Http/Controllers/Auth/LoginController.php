<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Role;

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
    protected $redirectTo = '/lara_admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        //
        // if(!in_array('Admin',$user->role->pluck('name')->toArray())){
        //     $this->redirectTo = '/home';
        // }
        if(in_array('Admin',$user->role->pluck('name')->toArray())){
            $this->redirectTo = '/lara_admin';
        }elseif(in_array('Author',$user->role->pluck('name')->toArray())){
            $this->redirectTo = '/lara_admin';
        }
        elseif(in_array('Vendor',$user->role->pluck('name')->toArray())){
            $this->redirectTo = '/vendor_admin';
        }else{
            $this->redirectTo = '/home';
        }
    }
}
