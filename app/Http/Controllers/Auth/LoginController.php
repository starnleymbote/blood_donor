<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    //protected $redirectTo = '/user_index';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function credentials(Request $request)
    {
        
        return ['email' =>$request->{$this->username()},'password' => $request->password];
    }

    protected function authenticated(Request $request, $user) {
        
        if ($user->role_id == 1) {
            
            return redirect('/user_index');
        } else if ($user->role_id == 3) {
            
            return redirect('/su_admin_index');
        } else {
            
            return redirect('/center_blood_level');
        }
   }
   
}
