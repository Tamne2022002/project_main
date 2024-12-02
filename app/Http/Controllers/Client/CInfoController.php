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
use App\Models\PhotoModel;

class CInfoController extends Controller
{
    public function index() 
    {
        if(Auth::guard('member')->user()) 
        {
            $user = Auth::guard('member')->user(); 
            $banner =  PhotoModel::select('name', 'desc', 'photo_path')->where('type', 'banner')->get();
            return view('client.info.index', compact('user','banner'));
        }
        
        return redirect()->route('user.login');
    }

    public function update(UserEditRequest $request) 
    {
        if(!Auth::guard('member')->check())
        {
            return redirect()->route('user.login');
        } 
        $address = $request->input('address'); 

        $all = $request->all();
        $user = Auth::guard('member')->user();

        $first_name_check = $all['name'] == $user->name; 
        $check = MemberModel::where('id', $user->id)->update([
            'name' => $all['name'], 
            'phone' => $all['phone'],
            'address' => $all['address'], 
        ]);
            // $all->session()->put('id_user', Auth::guard('member')->user()->id);
            // $all->session()->regenerate();
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
