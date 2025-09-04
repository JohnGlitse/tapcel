<?php

namespace App\Http\Controllers;
 

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{ 
    public function addToCart(Request $request, $id){

    $product = Product::find($id);

    $quantity = (int) $request->input('quantity', 1);
    if ($quantity < 1) $quantity = 1;

    $cart = session('cart', []);

    //dd($request->all());

    if(isset($cart[$id])){
        $cart[$id]['quantity'] += $quantity;
    } else {
        $cart[$id] = [
            'title' => $product->title,
            'price' => $product->price,
            'quantity' => $quantity,
            'brand' => $product->brand,
            'file' => $product->file,
            'description' => $product->description,
        ];
    }
    session()->put('cart', $cart);

    return redirect()->back()->with('success', 'Product successfully added to cart!');
}


public function removed($id){
   $cart = session()->get('cart', []);
    if(isset($cart[$id])){
        unset($cart[$id]);
        session()->put('cart', $cart);

    }

    return redirect()->back()->with('success', 'Product removed');
}

}
