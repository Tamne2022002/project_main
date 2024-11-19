<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProductListModel;
use App\Models\ImportOrderModel;
use App\Models\ImportOrderDetailModel;
use App\Models\OrderModel;
use App\Models\OrderDetailModel;
use App\Models\OrderStatusModel;
use App\Models\ProductModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user == null) {
            return redirect()->route('admin.login');
        }
        $product = ProductModel::get();
        $hdball = OrderModel::get();
        $cthdb = OrderDetailModel::get();
        $hdn = ImportOrderModel::get();
        $cthdn = ImportOrderDetailModel::get();
        $category = ProductListModel::get();

        $total_sale = 0;
        $profitBaseOnDate = array();
        $now = Carbon::now();
        $daysInMonth = Carbon::createFromDate(null, $now->month, 1)->daysInMonth;
        $monthStart = Carbon::create($now->year, $now->month, 1, 0, 0, 0);
        $monthEnd = Carbon::create($now->year, $now->month, $daysInMonth, 23, 59, 59);

        $hdb = OrderModel::whereIn('status', [2, 5])->whereBetween('created_at', [$monthStart, $monthEnd])->get();
    
        //tính tổng doanh thu
        foreach ($hdb as $value) {
            $total_sale = $total_sale + $value->total_price;
        }

        for ($i = 0; $i < $daysInMonth; $i++) {
            $todayStart = Carbon::create($now->year, $now->month, $i + 1, 0, 0, 0);
            $todayEnd = Carbon::create($now->year, $now->month, $i + 1, 23, 59, 59);
            $temp = DB::table('table_order')->select('total_price')->where('created_at', '>=', $todayStart)->where('created_at', '<=', $todayEnd)->whereIn('status', [3, 5])->sum('total_price');
            $profitBaseOnDate[$i] = $temp ? $temp : 0;
        }
        $status = OrderStatusModel::get();
        $sold_pro = OrderModel::get();

        return view('admin.dashboard.dashboard', compact('product', 'hdb', 'hdball', 'hdn', 'category', 'total_sale', 'cthdb', 'sold_pro', 'cthdn', 'profitBaseOnDate', 'status'));

    }
    public function filter($month, $year)
    {
        $user = Auth::user();
        if ($user == null) {
            return redirect()->route('admin.login');
        }

        $total_sale = 0;
        $profitBaseOnDate = array();

        if ($month && $year) {
            $daysInMonth = Carbon::createFromDate($year, $month, 1)->daysInMonth; //get days in month
            $monthStart = Carbon::create($year, $month, 1, 0, 0, 0); //get first day
            $monthEnd = Carbon::create($year, $month, $daysInMonth, 23, 59, 59); //get last day

            for ($i = 0; $i < $daysInMonth; $i++) { //get profit base on date
                $todayStart = Carbon::create($year, $month, $i + 1, 0, 0, 0); //get first day
                $todayEnd = Carbon::create($year, $month, $i + 1, 23, 59, 59); //get last day
                $temp = DB::table('orders')->select('total_price')->where('created_at', '>=', $todayStart)->where('created_at', '<=', $todayEnd)->whereIn('status', [3, 5])->sum('total_price'); //get total price
                $profitBaseOnDate[$i] = $temp ? $temp : 0; //add to array
            }

            //tính tổng doanh thu
            $hdb = OrderModel::whereIn('status', [3, 5])->whereBetween('created_at', [$monthStart, $monthEnd])->get(); //get order
            foreach ($hdb as $value) { //get total price
                $total_sale = $total_sale + $value->total_price; //add to total
            }
        } elseif (!$month && $year) { //get profit base on year
            $yearStart = Carbon::create($year, 1, 1, 0, 0, 0); //get first day
            $yearEnd = Carbon::create($year, 12, 31, 23, 59, 59); //get last day

            for ($i = 0; $i < 12; $i++) { //get profit base on month
                $daysInMonth = Carbon::createFromDate($year, $i + 1, 1)->daysInMonth; //get days in month
                $monthStart = Carbon::create($year, $i + 1, 1, 0, 0, 0); //get first day
                $monthEnd = Carbon::create($year, $i + 1, $daysInMonth, 23, 59, 59); //get last day
                $temp = DB::table('table_order')->select('total_price')->where('created_at', '>=', $monthStart)->where('created_at', '<=', $monthEnd)->whereIn('status', [3, 5])->sum('total_price'); //get total price
                $profitBaseOnDate[$i] = $temp ? $temp : 0; //add to array
            }

            //tính tổng doanh thu
            $hdb = OrderModel::whereIn('status', [3, 5])->whereBetween('created_at', [$yearStart, $yearEnd])->get(); //get order
            foreach ($hdb as $value) { //get total price
                $total_sale = $total_sale + $value->total_price; //add to total
            }
        }

        return response()->json(['is_passed' => 'true', 'profit' => $profitBaseOnDate, 'total' => $total_sale]);

    }
}
