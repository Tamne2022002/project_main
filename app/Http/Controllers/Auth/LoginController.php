<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * Create a new controller instance.
     *
     * @return RedirectResponse
     */
    public function login(Request $request): RedirectResponse
    {   
        $input = $request->all();
     
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt(['email' => $input['email'],'password' => $input['password']])) { 
            $account = User::where('email', $request->email)->first();
            if(!empty($account)){
                session(['user' => $account]);
                if (Auth::user()->type == 'admin') {
                    return redirect()->route('admin.dashboard.dashboard'); 
                } else { 
                    return redirect()->route('admin.login');
                }
            } else {
                return redirect()->route('login')
                ->with('error', 'Tài khoản email hoặc mật khẩu không đúng.');
            }
        } else {
            return redirect()->route('login')
                ->with('error', 'Tài khoản email hoặc mật khẩu không đúng.');
        }
          
    }
}
