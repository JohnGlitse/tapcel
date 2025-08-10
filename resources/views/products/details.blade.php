<x-layout>

      @if (@session('success')
        
        )
           <p id="added" style="color: white; background:#1b4965; padding: 6px;">{{session('success')}}</p>
       @endif
     
        <div id="product-details">
            <div class="detail-hero">
                 <h3>Limited stock/Grab yours before it's gone</h3>
                 <span>
                    <p><a href="{{route('product.index')}}"><i class="fa-regular fa-house"></i></a>/Bestseller</p>
                </span>
            </div>
            <div class="details">
            <div class="detail-img"> <img src="{{asset('storage/' . $product->file)}}"></div>
             <div class="detail-text">
                 <p class="title">{{$product->title}}</p>
                <h3 class="price">GHS{{$product->price}}</h3>
               <div class="availability"> <input type="checkbox" name="checkbox" checked> Availability: <span>In Stock</span></div>
                 
               <form action="{{ route('add-To-Cart', $product->id) }}" method="POST">
                    @csrf
                    <input type="number" name="quantity" value="1" min="1" />
                    {{-- <button type="submit">Add to Cart</button> --}}
                    <a href="{{route('add-To-Cart', $product->id)}}"><button>Add To Cart</button></a>
               </form>
                {{-- <input type="number" name="quantity" min="1" id="" value="1"> --}}
                {{-- <a href="{{route('add-To-Cart', $product->id)}}"><button>Add To Cart</button></a> --}}
                <h4>Free shipping on orders above GHS2000 - Ends Today!</h4>
               
                 <div class="description" >
                <h2>Product Description</h2>
                {{-- <p class="title">{{$brand->title}}</p> --}}
                <p>
                    {{$product->description}}
                    Abide with me fast falls the evening tides, the darkness deepen Lord with me abide.
                    And when other helps fail and comfort flee, help of the helpless Lord abide with me.
                    And I need thy presence every passing hour, shing through the gloom and point me to the skies.
                    Who like thyself, my guide and stay can be. Through clouds and sunshine Lord abide with me. And 
                    hold thou thy cross before my closing eyes. What but thy grace can foil the temper's power. 
                    Heaven morning breaks and earth's vein shadows flee. In life, in death o Lord abide with me.
                    Abide with me fast falls the evening tides, the darkness deepen Lord with me abide.
                    And when other helps fail and comfort flee, help of the helpless Lord abide with me.
                    And I need thy presence every passing hour, shing through the gloom and point me to the skies.
                    Who like thyself, my guide and stay can be. Through clouds and sunshine Lord abide with me. And 
                    hold thou thy cross before my closing eyes. What but thy grace can foil the temper's power. 
                    Heaven morning breaks and earth's vein shadows flee. In life, in death o Lord abide with me.
                </p>
            </div>
               
             </div>

             
            </div>

 <div id="relatedProducts"> 
    <h1>Related Products</h1>
    <hr>          
            <div class="products" id="products">
                @foreach ($products as $product)
                <a href="">
                 <div id="product">
                    <div>
                        <img src="{{ asset('storage/' . $product->file) }}" alt="">
                    </div>
                    <p class="title">{{ $product->title}}</p>
                    <h3 class="price">GHS{{$product->price}}</h3>
                    <div class="rating-commission">
                        <p class="rating">
                            @for ($i = 1; $i <= 5; $i++)
                                <span class="fa fa-star {{ $i <= $product->rating ? 'checked' : '' }}"></span>
                            @endfor
                        </p>
                        <div class="commission">
                            -{{ $product->discount ?? '0' }}%
                        </div>
                    </div>
                </div>
                </a>
               @endforeach
            </div>
        </div>
        </div>
        <style>
            #relatedProducts{
                padding: 80px;
                display: flex;
                flex-direction: column;
                gap: 30px;
            }
            #relatedProducts h1{
                font-size: 22px;
                font-weight: bold;
            }
            #products{
                display: flex;
                flex-wrap: nowrap;
                overflow-x: scroll;
            }
             
            #product{
                width: 170px;
            }
        </style>

        <script>
            const added = document.getElementById('added');
 
            setTimeout(() => {
               added.style.display = 'none';
            }, 2000);
         
        </script>
    
</x-layout>



