<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\ProductListModel;
use App\Models\MemberModel;
use App\Models\NewsModel;
use App\Models\ProductModel;
use App\Models\PublisherModel;
use App\Models\SettingModel;
use App\Models\PhotoModel;

class CHomeController extends Controller
{
    public static function settings()
    {
        $settings = SettingModel::select('*')->first();
        return $settings;
    }
    public function index()
    { 

        $sliders = PhotoModel::select('name', 'desc', 'photo_path')->get();
        $news = NewsModel::select('id', 'name', 'desc', 'photo_path')->where('status', 1)
        ->where('featured', 1)
        ->whereNull('deleted_at')->get();
       
        $publisher = PublisherModel::select('id', 'name', 'photo_path')->get();
        $category_first = ProductListModel::with('children')->where('featured', 1)->where('status', 1)
        ->whereNull('deleted_at'
        )->where('id_parent', 0)
        ->get();

        $productFeatured = ProductModel::select('id', 'name', 'photo_path', 'regular_price', 'sale_price', 'discount', )
            ->where('status', 1)
            ->where('featured', 1)
            ->whereNull('deleted_at')
            ->get(); 

         if (Auth::guard('member')->user()) {
             $user = Auth::guard('member')->user();
             return view('client.index', compact('sliders', 'news', 'productFeatured',  'publisher', 'category_first', 'user'));
         }
        return view('client.index', compact('sliders', 'news', 'productFeatured',  'publisher', 'category_first')); 


    }
    public function PublisherProduct($id)
    {
        $publisher = PublisherModel::where('id', $id)->firstOrFail();
        $pagename = $publisher->name;
        $publisherproduct = ProductModel::where('id_publisher', $id)->where('status', 1)->whereNull('deleted_at')->latest()->paginate(20);
        return view('client.product.publisher_product', compact('publisherproduct', 'pagename'));
    }
    public function CategoryIdProduct($id)
    {
        $category = ProductListModel::where('id', $id)->firstOrFail();
        $pagename = $category->name;
        $categoryidproduct = ProductModel::where('id_list', $id)->where('status', 1)->whereNull('deleted_at')->latest()->paginate(20);
        return view('client.product.categoryid_product', compact('categoryidproduct', 'pagename'));
    }

    public function getCategoryData(Request $request)
    {
        $categoryId = $request->input('categoryId');
        $products = ProductModel::where('id_list', $categoryId)->get();
        return response()->json(['products' => $products]);
    }

    public static function MenuCategory()
    {
        $menufisrt = ProductListModel::with('children')->where('status', 1)->whereNull('deleted_at')->where('id_parent', 0)->get();
        return view('client.partials.categorymenu', compact('menufisrt'));
    }
    public static function getUserInfo()
    {
        $id = session()->get('id_user');

        if($id){
            $user = MemberModel::where('id', session()->get('id_user'))->first();
        } else {
            $user = Auth::guard('member')->user();
        }
        
        return $user;
    }
}
