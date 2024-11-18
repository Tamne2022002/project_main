<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;  
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\CartModel;
use App\Models\MemberModel; 

class CUserController extends Controller
{
    public function clientLogin()
    { 
        $user = '';
        return view('client.user.login', compact('user'));
    }
    public function clientRegister()
    {  
        $user = '';
        return view('client.user.register', compact('user'));
    }

    public function postlogin(LoginRequest $request)
    {

        $cre = $request->only('email', 'password');

        if (Auth::guard('member')->attempt($cre)) {
            $user = Auth::guard('member')->user();
            Auth::guard('member')->login($user);
            $request->session()->put('id_user', Auth::guard('member')->user()->id);
            $request->session()->regenerate();
            return redirect()->route('index'); 
        }
   
        return redirect()->route('user.login')->with('fail', 'Tài khoản hoặc mật khẩu không chính xác.');

    }

    public function postregister(RegisterRequest $request)
    { 
        $popularDomains = [
            'gmail.com',
            'yahoo.com',
            'hotmail.com',
            'outlook.com',
            'live.com',
            'aol.com',
            'icloud.com',
            'mail.com',
            'mail.com.vn',
            'yandex.com',
            'protonmail.com',
            'caothang.edu.vn'
        ];

        $cre = $request->all();

        $domain = substr(strrchr($request->email, "@"), 1);

        if(!in_array($domain, $popularDomains)) {
            return redirect()->route('user.register')->with('fail', 'Địa chỉ email không xác định');
        }

        if ($cre) {
            MemberModel::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $member = MemberModel::where('email', $request->email)->first();
  
            return redirect()->route('user.login')->with('success', 'Đăng ký thành công'); 
        }
        return redirect()->route('user.register')->with('fail', 'Đã có lỗi xảy ra'); 
    }

    public function logout()
    {
        Auth::guard('member')->logout(); 
        session()->invalidate();
     
        session()->forget('id_user'); 
        session()->regenerateToken(); 
        
        return redirect()->route('index');
    }
}
