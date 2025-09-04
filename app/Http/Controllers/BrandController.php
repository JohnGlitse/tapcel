<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class BrandController extends Controller
{
    public function samsung(){
        $samsung = Product::where('brand', 'samsung')->get();
       
        return view('pages.samsung', ['samsung' => $samsung ]);
    }

    public function apple(){
        $apple = Product::where('brand', 'apple')->get();

        return view('pages.apple', ['apple' => $apple]);
    }
    public function tecno(){
        $tecno = Product::where('brand', 'tecno')->get();

        return view('pages.tecno', ['tecno' => $tecno]);
    }


 

     



}
