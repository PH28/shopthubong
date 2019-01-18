<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Role;
use App\User;
use App\Http\Requests\RegisterRequest;
class LoginController extends Controller
{


    public function getLogin()
    {
    	return view('page.login');
    }

    public function postLogin(Request $request)
    {
    	$email = $request['email'];
    	$password = $request['password'];
        // dd(Auth::attempt(['email' => $email, 'password' => $password]));
    	if (Auth::attempt(['email' => $email, 'password' => $password])) {
            
            if( Auth::user()->status == User::NOTACTIVE)

            {  
               
        		return redirect()->route('home.index')->with('fail', 'Vui lòng xác thực email');
            }
            if(Auth::user()->status == User::ACTIVE)

            {
                return redirect()->route('home.message')->with('success', 'Đăng nhập thành công');

            }

    	} else {

             return back()->with('fail', ('Đăng nhập thất bại'));
    	}
    }

    public function getRegister(){
        return view('user.page.signup');
    }

    public function postRegister(RegisterRequest $request)
    {

        $data = [
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'fullname' => $request->fullname,
            'phone' => $request->phone, 
            'address' => $request->address,
            'role_id' => User::USER,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'status' => User::NOTACTIVE
        ];
        User::create($data);
        return redirect()->route('home.message')->with('success', 'Đăng kí thành công');
    }

    public function getVerify($token){
        $user = User::where('verify_token', $token)->first();
        $user->status = User::ACTIVE;
        $user->update();
        return redirect()->route('home.message')->with('success', 'Xác thực thành công');

    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home.index');
    }
}
