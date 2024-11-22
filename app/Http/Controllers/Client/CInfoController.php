<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserAddRequest;
use App\Http\Requests\UserEditRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request; 
use App\Models\CartModel;
use App\Models\CartDetailModel;
use App\Models\MemberModel;

class CInfoController extends Controller
{
    public function index() 
    {
        if(Auth::guard('member')->user()) 
        {
            $user = Auth::guard('member')->user(); 
            return view('client.info.index', compact('user'));
        }

        return redirect()->route('user.login');
    }

    public function update(UserEditRequest $request) 
    {
        if(!Auth::guard('member')->check())
        {
            return redirect()->route('user.login');
        }

        $popularDomains = [
            'gmail.com',
            'yahoo.com',
            'hotmail.com',
            'gmail.com.vn',
            'outlook.com',
            'live.com',
            'aol.com',
            'icloud.com',
            'mail.com',
            'yandex.com',
            'protonmail.com'
        ];

        $cre = $request->all();

        $domain = substr(strrchr($request->email, "@"), 1);

        if(!in_array($domain, $popularDomains)) {
            //return response()->json(['error' => 'Email domain is not popular.'], 400);
            redirect()->route('user.register')->with('fail', 'Địa chỉ email không xác định');
        }

        $address = $request->input('address');

        $all = $request->all();
        $user = Auth::guard('member')->user();

        $first_name_check = $all['name'] == $user->name;
        dd($all);
        $check = MemberModel::where('id', $user->id)->update([
            'name' => $all['name'], 
            'phone' => $all['phone'],
            'address' => $all['address'],
            'email' => $all['email'],
        ]);

        if($check) 
        {
            return redirect()->route('user.info')->with('success','Cập nhật thành công');
        }

        return redirect()->route('user.info')->with('fail','Cập nhật thất bại');

        //dd($all, $user);
    }

    public function delete() 
    {
        if(!Auth::guard('member')->check())
        {
            return redirect()->route('user.login');
        }

        $user = Auth::guard('member')->user();
        $check = MemberModel::where('id', $user->id)->delete();

        if($check)
        {
            Auth::guard('member')->logout();
            return redirect()->route('index')->with('success','Xoá thành công');
        }
 
        return redirect()->route('user.info')->with('fail','Xoá không thành công');
    }
}
