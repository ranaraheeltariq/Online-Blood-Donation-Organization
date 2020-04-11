<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Admin;

class AdminLoginController extends Controller
{  

    use AuthenticatesUsers;
    
    protected $redirectTo = '/admin'; //Redirect after authenticate

    /**
     * Login username to be used by the controller.
     *
     * @var string
     */
    protected $username;

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout'); //Notice this middleware
        $this->username = $this->findUsername();
    }

    public function showLoginForm() //Go web.php then you will find this route
    {
        return view('admin.auth.login');
    }

     protected function guard() // And now finally this is our custom guard name
    {
        return Auth::guard('admin');
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function findUsername()
    {
        $login = request()->input('email');

        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        request()->merge([$fieldType => $login]);

        return $fieldType;
    }

    /**
     * Get username property.
     *
     * @return string
     */
    public function username()
    {
        return $this->username;
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()
            ->route('admin.login')
            ->with('status','Admin has been logged out!');
    }
}