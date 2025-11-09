<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
   
    public function admin(){
        $users = User::paginate(6);
        $products = Product::paginate(6);

        $orders = Order::paginate(6);


         $secondChart = Product::select(
            DB::raw("COUNT(*) as count"),
            'brand'
        )
        ->whereYear("created_at", date("Y"))
        ->groupBy('brand')
        ->orderBy('count', 'desc') // optional: order by most popular brand
        ->get();

    $datakeys = [];    // Brand names for x-axis
    $datavalues = [];  // Product counts for y-axis

    foreach ($secondChart as $second) {
        $datakeys[] = $second->brand;
        $datavalues[] = (int) $second->count;
    }


    ///// THIS IS THE SECOND CHART

    //     $chartProduct = Product::select(
    //     DB::raw("COUNT(*) as count"),
    //     DB::raw("NAME(region) as region_name"),
    //     // DB::raw("DAYOFWEEK(created_at) as day_number")
    // )
    // //->whereYear("created_at", date("Y"))
    // //->groupBy(DB::raw("DAYOFWEEK(created_at)"))
    // ->orderBy("region_name")
    // ->get();

    // $labels = []; // x-axis categories (day names)
    // $values = []; // y-axis data (counts)

    // foreach ($chartProduct as $item) {
    //     $labels[] = $item->day_name;
    //     $values[] = (int) $item->count;
    // }

      
        return view('products.dashboard',
         [
            'users' => $users, 
            'products' => $products,
            'datakeys' => $datakeys,
            'datavalues' =>$datavalues,
            // 'labels' => $labels,
            // 'values' => $values
            'orders' => $orders
        ]);
    }

   }

