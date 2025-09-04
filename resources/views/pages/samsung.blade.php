<x-layout>
    <div id="product-details">
            <div class="detail-hero">
                 <h3>Limited stock/Grab yours before it's gone</h3>
                 <span>
                    <p><a href="{{route('product.index')}}"><i class="fa-regular fa-house"></i></a>/Bestseller</p>
                </span>
            </div>
    <div id="samsung">

   <div class='products'>
    @foreach ($samsung as $product)
        <x-products :product="$product" />
    @endforeach
   </div>

 
   </div>

   <style>
    #samsung{
        padding: var(--page-padding);
    }
   </style>
</x-layout>



