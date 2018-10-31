<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

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
    // protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->redirectTo = URL::current();
        // $this->redirectTo = url()->previous();
        $this->middleware('guest')->except('logout');
        Session::put('backUrl', URL::previous());
        // return redirect()->intended(Session::pull('referrer'));
        // return redirect()->intended('defaultpage');
    }

    public function redirectTo()
    {

        // User role
    $role = Auth::user()->role; 
    
    // Check user role
    switch ($role) {
        case 'admin':
                return '/admin/news';
            break;
        case 'member':
        return Session::get('backUrl') ? Session::get('backUrl') :   $this->redirectTo;
            break; 
        default:
                return '/login'; 
            break;
    }

        
    }
}
