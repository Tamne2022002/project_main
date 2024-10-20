<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Hiển thị form đăng nhập
    public function showLoginForm()
    {
        return view('admin.login');
    }
 
    public function login(Request $request)
    { 
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) { 
            return redirect()->route('admin.index');
        }
 
        return redirect()->back()->withErrors([
            'email' => 'Thông tin đăng nhập không chính xác.',
        ]);
    }

    // Xử lý đăng xuất
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
 
    public function dashboard()
    {
        return view('admin.index');
    }
}
