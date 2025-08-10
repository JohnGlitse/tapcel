<x-layout>

      
    <section style="padding-top: 0; padding-bottom: 6px;">
     <div class="brands">
        <ul>
            
            <li><a href="">Apple</a></li>
            <li><a href="">Samsung</a></li>
            <li><a href="">Tecno</a></li>
            <li><a href="">Infinix</a></li>
            <li><a href="">Huawei</a></li>
            <li><a href="">Itel</a></li>
      
        </ul>
     </div>
     
     <div class="banner-container">
     <div class="banner">

        {{-- FIRST SLIDE AND CONTENT --}}
        <div class="slide">
            <div class="banner-text">
                <p>Flash Sales!</p>
                <h1>Deals Reserved <br>For You</h1>
                <button>Buy Now</button>
            </div>

            <div class="banner-img">
                <img src="{{asset('images/image1.png')}}" alt="">
            </div>     
        </div>
        
        {{-- SECOND SLIDE AND CONTENT --}}
        <div class="slide">
            <div class="banner-text">
                <p>Flash Sales!</p>
                <h1>You Deserve <br>It All</h1>
                <button>Buy Now</button>
            </div>

            <div class="banner-img">
                <img src="{{asset('images/image1.png')}}" alt="">
            </div>     
        </div>

        {{-- SECOND SLIDE AND CONTENT --}}
        <div class="slide">
            <div class="banner-text">
                <p>Flash Sales!</p>
                <h1>You Deserve <br>It All</h1>
                <button>Sell Now</button>
            </div>

            <div class="banner-img">
                <img src="{{asset('images/image1.png')}}" alt="">
            </div>     
        </div>
        
     </div>

     <div class="arrows">
                <i class="fa fa-arrow-left"></i>
                <i class="fa fa-arrow-right"></i>
       </div>

    </div>
     
    </section>
    
    <div class="systems">
        <div class="system">
            <div class="img"><img src="{{asset('images/image1.png')}}" alt=""></div>
            <div class="system-text">
                <p>Flash sale</p>
               <h4>Infinix Hot 8 Lite</h4>
                <button>Buy Now</button>
            </div>
        </div>
        <div class="system">
            <div class="img"><img src="{{asset('images/image1.png')}}" alt=""></div>
            <div class="system-text">
                <p>Flash sale</p>
               <h4>Infinix Hot 8 Lite</h4>
                <button>Buy Now</button>
            </div>
        </div>
        <div class="system">
            <div class="img"><img src="{{asset('images/image1.png')}}" alt=""></div>
            <div class="system-text">
                <p>Flash sale</p>
               <h4>Infinix Hot 8 Lite</h4>
                <button>Buy Now</button>
            </div>
        </div>
        
                 
    </div>

    <style>
     #deal{
        display: flex;
        flex-wrap: nowrap;
        overflow-x: scroll;
     }
     #deal-product{
        width: 170px !important;
     }
 
    </style>

  

    {{-- BEST DEALS FOR ANDROID --}}
    <section>
        <div id="deals">
            <h1>Best deal on <span class="android">Android</span></h1>
            <hr>
          
 
        <div class="products" id="deal">
            @php  $count = 0;  @endphp
            @foreach ($products as $product)
            @php $count++; @endphp
                    @if ($count > 8)
                        @break
                    @endif
                <x-products :product="$product" id="deal-product" style="width: 170px;"/>
            @endforeach
             
        </div>

         @forelse ($products as $product)
        
        @empty
            <div>
                No results found for: <strong>{{request()->search}}</strong>
            </div>
        @endforelse
         

 
        </div>

    </section>

    {{-- PRODUCTS CATEGORIES --}}
    <section>
        <div id="categories">
             <h1>Shop by <span>Categories</span></h1>
            <hr>
            <div class="categories">
                <div class="category">
                    <img src="{{asset('images/apple.png')}}" alt="">
                </div>
                <div class="category">
                    <img src="{{asset('images/samsung.png')}}" alt="">
                </div>
                <div class="category">
                    <img src="{{asset('images/tecno.png')}}" alt="">
                </div>
                <div class="category">
                    <img src="{{asset('images/infinix.jpg')}}" alt="">
                </div>
                <div class="category">
                    <img id="huawei" src="{{asset('images/huawei.png')}}" alt="">
                </div>
                <div class="category">
                    <img src="{{asset('images/itel.png')}}" alt="">
                </div>
            </div>
        </div>
    </section>


    {{-- PRODUCTS NEW ARRIVALS --}}

    <section>
        <div id="new-arrivals">
              <h1>New Arrivals <span>Android</span></h1>
            <hr>

             <div class="products">
                   
                    @php $count = 0; @endphp
                    @foreach ($products as $product)
                    @php $count++; @endphp
                    @if ($count > 6)
                        @break
                    @endif
                    <x-products :product="$product" />
                @endforeach

                @php $count = 0; @endphp
                @foreach ($products as $product)
                    @php $count++; @endphp
                    @if ($count <= 6)
                        @continue
                    @endif
                    @if ($count > 12)
                        @break
                    @endif
                   <x-products :product="$product" />
                @endforeach
            </div>
             @forelse ($products as $product)
        
        @empty
            <div>
                No results found for: <strong>{{request()->search}}</strong>
            </div>
        @endforelse

              

             {{-- <div class="products">
                @php $count = 0; @endphp
                @foreach ($products as $value)
                    @php $count++; @endphp

                
                @if ($count == 2)
                    @continue
                @endif

                 
                @if ($count > 6)
                    @break
                @endif

        <p>{{ $value->description }}</p>
    @endforeach
</div> --}}

        </div>
    </section>
    <section>

        {{-- PRODUCTS TOP BRANDS --}}
        <div id="top-brands">
              <h1>Our Top <span>Brands</span></h1>
            <hr>
            <div class="top-brands">
                <div class="brand">
                    <div class="logo-text">
                       <div class="img"> <img src="{{asset('images/apple.png')}}" alt=""></div>
                        <div class="text">Up To 40% Off</div>
                    </div>
                    <div class="brand-img"><img src="{{asset('images/image1.png')}}"></div>
                </div>
                <div class="brand" style="background: #1b4965">
                    <div class="logo-text">
                       <div class="img"> <img src="{{asset('images/apple.png')}}" alt=""></div>
                        <div class="text">Up To 40% Off</div>
                    </div>
                    <div class="brand-img"><img src="{{asset('images/image1.png')}}"></div>
                </div>
                <div class="brand">
                    <div class="logo-text">
                       <div class="img"> <img src="{{asset('images/apple.png')}}" alt=""></div>
                        <div class="text">Up To 40% Off</div>
                    </div>
                    <div class="brand-img"><img src="{{asset('images/image1.png')}}"></div>
                </div>
            </div>
        </div>


        <div class="products">
            @foreach ($products as $product)
               <x-products :product="$product"/> 
            @endforeach
        </div>
    </section>

 
</x-layout>