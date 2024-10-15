<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index(): View
    {   
        return view('login');
    }
    public function adminHome(Request $request): View
    { 
        return view('admin.admin');
    }


}
