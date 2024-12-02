<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewsModel;
use App\Models\PhotoModel;
use Illuminate\Support\Facades\Auth;

class CNewsController extends Controller
{
    public function index()
    {
        $newsInternal = NewsModel::select('id', 'name', 'desc', 'photo_path')->where('status', 1)->whereNull('deleted_at')->latest()->paginate(8); 
        return view('client.news.index', compact('newsInternal'));
    }

    public function detail($id)
    {
        $newsDetail = NewsModel::find($id);
        $pageName = $newsDetail->name;
        $newsInternal = NewsModel::select('id', 'name', 'desc', 'photo_path')->get();
        $banner =  PhotoModel::select('name', 'desc', 'photo_path')->where('type', 'banner')->get();
        
        return view('client.news.detail', compact('newsDetail', 'newsInternal', 'pageName','banner'));
    }
}
