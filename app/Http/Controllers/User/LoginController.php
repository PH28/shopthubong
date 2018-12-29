<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Role;
use App\User;
class LoginController extends Controller
{
    //
    public function getLogin()
    {
    	return view('');
    }

    public function postLogin(Request $request)
    {
    	$email = $request['email'];
    	$password = $request['password'];
        // dd(Auth::attempt(['email' => $email, 'password' => $password]));
    	if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $request->session()->flash('success', 'Đăng nhập thành công!');
    		return redirect()->route('pageusers.index');
    	} else {
            $request->session()->flash('fail', 'Đăng nhập thất bại!');
    		return redirect()->route('pageusers.showlogin');
    	}
    }

    public function getRegister(){
        return view('');
    }

    public function postRegister(Request $request)
    {

        $data = [
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'yourname' => $request->fullname,
            'phone' => $request->phone, 
            'address' => $request->address,
            'role_id' => User::USER;
            'gender' => $request->gender,
            'dob' => $request->dob
            'status' => User::NOTACTIVE
        ];
        User::create($data);
        $request->session()->flash('success', 'Đăng ký thành công!');
        return redirect()->route('pageusers.index');
    }

    public function getRegister($token){
        $user = User::where('verify_token', $token)->first();
        
        $user->status = User::ACTIVE;
        $user->update();

        return redirect()->route('pageusers.index');

    }
}
