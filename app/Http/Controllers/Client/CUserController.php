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
    public function clientInfo(){
        return view('client.user.user-detail');
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
        // $cre = $request->validate([
        // 'firstname' => ['required', 'string', 'max:20'],
        // 'lastname' => ['required', 'string', 'max:100'],
        // 'email' => ['required', 'email'],
        // 'password' => ['required'],
        // 'confirm-password' => ['required'],
        // 'address' => ['required'],
        // 'phone' => ['required']
        // ]);

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
        dd($cre);
        $domain = substr(strrchr($request->email, "@"), 1);

        if(!in_array($domain, $popularDomains)) {
            return redirect()->route('user.register')->with('fail', 'Địa chỉ email không xác định');
        }

        if ($cre) {
            MemberModel::create([
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $member = MemberModel::where('email', $request->email)->first();
            /*Cart::create([
                'member_id' => $member->id,
                'cart_total' => 0,
            ]);*/
            
            return redirect()->route('index')->with('success', 'Đăng ký thành công');
            //dd($cre, 'true');
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
