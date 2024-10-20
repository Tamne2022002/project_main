<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{ 
    public function index(): View
    {   
        return view('admin.index');
    }
 
    public function adminHome(Request $request): View
    {
        return view('admin.index');
    }

    public static function getUser()
    {
        $user = Session::get('user');
        $user = $user[0];
        return $user;
    }

}
