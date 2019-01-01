<?php


namespace App\Http\Controllers\Admin;

use App\User;
use Validator;
use Auth;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Lang;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesUsers;

    protected $redirectTo = '/';
    
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
       
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function getDashboard()
    // {
    //     return view('admin.layout.dashboard');
    // }
    public function showLoginForm()
    {
        return view('admin.login');
    }
    public function postLogin(LoginRequest $request)
    {
       if(Auth::attempt(['email'=>$request->email,'password'=>$request->password],'role_id' == User::ADMIN))
       {
            return redirect()->route('admin.dashboard');
       }
       else
       {
            return redirect('admin/login')->with('status', ('Đăng nhập thất bại'));
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('admin/login');
    }
    

}

