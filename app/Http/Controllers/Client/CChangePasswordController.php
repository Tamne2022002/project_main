<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
  
use App\Http\Requests\PasswordChangeRequest;
use App\Models\MemberModel; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CChangePasswordController extends Controller
{
    public function index()
    {
        if (Auth::guard('member')->user()) {
            $user = Auth::guard('member')->user(); 
            return view('client.info.changepassword', compact('user'));
        }
        return redirect()->route('login');
    }

    public function update(PasswordChangeRequest $request)
    {
        $user = Auth::guard('member')->user();

        // Kiểm tra mật khẩu hiện tại
        if (!Hash::check($request->current_password, $user->password)) {
                return back()->with('fail', 'Mật khẩu hiện tại không đúng.');
        }

        if(!$request->new_password == $request->new_password_confirm){
            return back()->with('fail', 'Mật khẩu mới và xác nhận mật khẩu không trùng nhau');
        }
    
        // Kiểm tra nếu mật khẩu mới trùng với mật khẩu cũ
        if (Hash::check($request->new_password, $user->password)) {
            return back()->with('fail', 'Mật khẩu mới phải khác với mật khẩu cũ.');
        }

        // Cập nhật mật khẩu mới
        /*Member::where('id', $user->id)->update([
            'password', Hash::make($request->new_password),
        ]);*/
        $user->password = Hash::make($request->new_password);
        $user->save();
    
        return redirect()->route('user.changepassword')->with('success', 'Đổi mật khẩu thành công.');
    }
}
