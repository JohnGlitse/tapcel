<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    { 
        $search = $request->search;
        if($search){
            $products = Product::where('title', 'LIKE', "%$search%")->paginate(4);
        }else{
            $products = Product::all();
        }


        /// SELECTING BASED ON BRAND
       
        
        return view('products.index', [
            'products' => $products,
        ]);
        

    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
  $request->validate([
            'title' => ['required'],
            'price' => ['required'],
            'brand' => ['required'],
            'file' => ['required', 'mimes:png,jpg,jpeg,pdf'],
            'description' => ['required'] 
        ]);
        
       // dd($request);
        
        $path = null;
        if($request->hasFile('file')){
            $path = Storage::disk('public')->put('products', $request->file);
        }

        Product::create([
            'title' => $request->title,
            'price' => $request->price,
            'brand' => $request->brand,
            'file' =>  $path,
            'description' => $request->description
        ]);

        return redirect('/products/dashboard');

        }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $products = Product::where('brand', $product->brand)
        ->where('id', '!=', $product->id)
        ->take(10)
        ->get();

        if($products->isEmpty()){
            $products = Product::where('id', '!=', $product->id)
            ->paginate(10);
        }
        return view('products.details', ['product' => $product, 'products' => $products]);
    }
 

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.update', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
       $validated = $request->validate([
            'title' => ['required'],
            'price' => ['required'],
            'brand' => ['required'],
            'file' => ['required','mimes:jpg,jpeg,png,pdf,bmp,webp'],
            'description' => ['required']
             ]);
             
            // DELETE PREVIOUS IMAGE BEFORE ADDING NEW UPDATED IMAGE IF IT EXISTS
            if($product->file){
                Storage::disk('public')->delete($product->file);
            }
            $path = null;
            if($request->hasFile('file')){
                $path = Storage::disk('public')->put('products', $request->file);
            }

            // Update all records after updating image
            $product->update([
              ...$validated,
                'file' => $path
            ]);

            return redirect('/products/dashboard');
        }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
       // Product::delete();
         if($product->file){
            Storage::disk('public')->delete($product->file);
         }
         $product->delete();
        dd('Product deleted!');
    }

    public function admin(){
        $users = User::paginate(6);
        $products = Product::paginate(6);



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
        ]);
    }

   


public function charts()
{
  
    $chartProduct = Product::select(
        DB::raw("COUNT(*) as count"),
        DB::raw("DAYNAME(created_at) as day_name"),
        DB::raw("DAYOFWEEK(created_at) as day_number")
    )
    ->whereYear("created_at", date("Y"))
    ->groupBy(DB::raw("DAYOFWEEK(created_at)"))
    ->orderBy("day_number")
    ->get();

    $labels = []; // x-axis categories (day names)
    $values = []; // y-axis data (counts)

    foreach ($chartProduct as $item) {
        $labels[] = $item->day_name;
        $values[] = (int) $item->count;
    }

 
     

    // THE SECOND EQUATION
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

    // return view('/home', compact('labels', 'values'));
    return view('/home', ['labels' => $labels, 'values' => $values, 
    'datakeys' => $datakeys, 'datavalues' => $datavalues
     ]);
}




}
