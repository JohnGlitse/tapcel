<x-layout>


    <section style="padding-top: 0; padding-bottom: 6px">
     {{-- <div class="brands">
        <ul>
            
            <li><a href="{{route('samsung')}}">Samsung</a></li>
            <li><a href="{{route('apple')}}">Apple</a></li>
            <li><a href="{{route('tecno')}}">Tecno</a></li>
            <li><a href="">Infinix</a></li>
            <li><a href="">Huawei</a></li>
            <li><a href="">Itel</a></li>
      
        </ul>
     </div> --}}
 <div style="" class="banner-wrapper">
    <div style="" class="banner-side1">
         <div class="brands">
        <ul style="flex-direction: column">
            
            <li><a href="{{route('samsung')}}">Samsung</a></li>
            <li><a href="{{route('apple')}}">Apple</a></li>
            <li><a href="{{route('tecno')}}">Tecno</a></li>
            <li><a href="">Infinix</a></li>
            <li><a href="">Huawei</a></li>
            <li><a href="">Itel</a></li>
      
        </ul>
     </div>
    </div>
     <div class="banner-container">
     <div class="banner">

        {{-- FIRST SLIDE AND CONTENT --}}
        <div class="slide" id="slide1">
            <div class="banner-text">
                <p>Limited stocks!</p>
                <h1>Get up to 30% Off New Arrivals</h1>
                {{-- <h1>iPhone 16 Pro</h1> --}}
                 <p>GHS14250.00</p>
                <button>Buy Now</button>
            </div>

            <div class="banner-img">
                <img src="{{asset('images/image3.png')}}" alt="">
            </div>     
        </div>
        
        {{-- SECOND SLIDE AND CONTENT --}}
        <div class="slide" id="slide2">
            <div class="banner-text">
                <p>Don't Miss Out!</p>
                <h1>Get up to 30% Off New Arrivals</h1>
                {{-- <h1>iPhone XR</h1> --}}
                 <p>GHS2800.00</p>
                <button>Buy Now</button>
            </div>

            <div class="banner-img">
                <img src="{{asset('images/app.png')}}" alt="">
            </div>     
        </div>

        {{-- THIRD SLIDE AND CONTENT --}}
        <div class="slide" id="slide3">
            <div class="banner-text">
                <p>Shop Flash Sales!</p>
                <h1>Up to 40% Off on Top Smartphones</h1>
                {{-- <h1>Phantom V Fold</h1> --}}
                 <p>GHS12800.00</p>
                <button>Buy Now</button>
            </div>

            <div class="banner-img">
                <img src="{{asset('images/adroid.png')}}" alt="">
            </div>     
        </div>
        
        {{-- FOUR SLIDE AND CONTENT --}}
        <div class="slide" id="slide4">
            <div class="banner-text">
                <p>Shop Flash Sales!</p>
                <h1>Up to 40% Off on Top Smartphones</h1>
                {{-- <h1>Phantom V Fold</h1> --}}
                 <p>GHS12800.00</p>
                <button>Buy Now</button>
            </div>

            <div class="banner-img">
                <img src="{{asset('images/app.png')}}" alt="">
            </div>     
        </div>
        
     </div>

     <div class="arrows">
                <i class="fa fa-chevron-left"></i>
                <i class="fa fa-chevron-right"></i>
       </div>

    </div>
    <div style="" class="banner-side2">

    <div class="systems">
        <div class="system">
            <div class="img"><img src="{{asset('images/app.png')}}" alt=""></div>
            <div class="system-text">
                <p></p>
               <h4>GET A FREE DELIVERY</h4>
               <span style="display: flex; align-items: center; gap: 3px; text-align-center" >
                <p>Shop Now</p><i class="fa fa-long-arrow-right" style="color: #fff"></i>
               </span>

            </div>
        </div>
        <div class="system">
            <div class="img"><img src="{{asset('images/app.png')}}" alt=""></div>
            <div class="system-text">
                <p></p>
               <h4> Get Up To 40% Off</h4>
                <span style="display: flex; align-items: center; gap: 3px; text-align-center" >
                <p>Shop Now</p><i class="fa fa-long-arrow-right" style="color: #fff"></i>
               </span>
            </div>
        </div>
        <div class="system">
            <div class="img"><img src="{{asset('images/samsung.png')}}" alt=""></div>
            <div class="system-text">
                <p></p>
                <div style="background: #fff; padding: 6px 8px; width: fit-content; font-weight: bold; font-size: 14px">10% OFF</div>
               {{-- <h4>EXTRA 50% OFF</h4> --}}
                <span style="display: flex; align-items: center; gap: 3px; text-align-center" >
                <p>Shop Now</p><i class="fa fa-long-arrow-right" style="color: #fff"></i>
               </span>
            </div>
        </div>
        
                 
    </div>

     </div>



</div>

 <div id="services" class="home-services" style="">
            <div class="services">
                <div class="service">
                    <i class="fa-solid fa-bus"></i>
                    <p>Free, Fast Shapping</p>
                </div>
                <div class="service">
                    <i class="fa-solid fa-dollar"></i>
                    <p>Cash on Delivery</p>
                </div>
                <div class="service">
                    <i class="fa-solid fa-lock"></i>
                    <p>Secure Payment</p>
                </div>
                <div class="service">
                    <i class="fa-solid fa-dollar"></i>
                    <p>Hassle-Free Warranty</p>
                </div>
            </div>
        </div>
    
     
    </section>
 
    
    {{-- <div class="systems">
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
        
                 
    </div> --}}

    <style>
     #deal{
        display: flex;
        flex-wrap: nowrap;
        overflow-x: scroll;
        padding-bottom: 30px;
     }
     
     #deal-product{
        width: 170px !important;
     }

    @media(max-width: 768px){
        .home-services{
            display: none;
        }
    }
 
    </style>

   
      
    {{-- BEST DEALS FOR ANDROID --}}
    <section>

        



        <div id="deals">
            <h1>BEST DEAL ON <span class="android">ANDROID</span></h1>
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
                No Product found: <strong>{{request()->search}}</strong>
            </div>
        @endforelse
         

 
        </div>

    </section>

    {{-- BEST DEALS FOR APPLE PHONES --}}
    <section>
        <div id="deals">
            <h1>TRENDING <span class="android">iPHONES</span></h1>
            <hr>
          
 
        <div class="products" id="deal">
            @php  $count = 0;  @endphp
            @foreach ($apples as $product)
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
                No Product found: <strong>{{request()->search}}</strong>
            </div>
        @endforelse
         

 
        </div>



        
          <div id="cta-banner">
        <div class="cta-banner">
            <div class="cta-text">
                <h1>Deals On Samsung</h1>
                <p>Grab Your Favoriate Now</p>
                <div> UP TO <span>20% OFF</span></div>
            </div>

            <div class="cta-img">
                <img src="{{ asset('images/app.png') }}" alt="">
            </div>
        </div>
     </div>


    </section>

    {{-- PRODUCTS CATEGORIES --}}
    <section>
        <div id="categories">
             <h1>SHOP BY <span>CATEGORIES</span></h1>
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

         <section>

            <div class="hot-best-feature">
                <p class="active" data-tab="#hot-trends">HOT TRENDS</p>
                <P data-tab="#feature">BEST SELLERS</P>
                <P data-tab="#best-sellers">FEATURES</P>
            </div>
            <div id="hot-best-feature">
            <div id="hot-trends" data-target class="active">
                <h2>HOT TRENDS</h2>
                @foreach ($features as $feature)
                
                    <div class="feature">
                       <img src="{{ asset('storage/'. $feature->file) }}" width = "80px" alt="">
                       <div class="texts">
                        <div class="title">{{ Str::words($feature->title, 3) }}</div>
                            <p class="rating">
                            @for ($i = 1; $i <= 5; $i++)
                                <span class="fa fa-star {{ $i <= $product->rating ? 'checked' : '' }}"></span>
                            @endfor
                            </p>
                         <div class="price">GHS{{ $feature->price }}</div>
                       </div>
                   </div>
               
                @endforeach
            </div>

             
            <div id="best-sellers" data-target>
                <h2>BEST SELLERS</h2>
                  @foreach ($features as $feature)
                    <div class="feature">
                       <img src="{{ asset('storage/'. $feature->file) }}" width = "80px" alt="">
                       <div class="texts">
                         <div class="title">{{ Str::words($feature->title, 3) }}</div>
                            <p class="rating">
                            @for ($i = 1; $i <= 5; $i++)
                                <span class="fa fa-star {{ $i <= $product->rating ? 'checked' : '' }}"></span>
                            @endfor
                            </p>
                         <div class="price">GHS{{ $feature->price }}</div>
                       </div>
                   </div>
                @endforeach
            </div>
            <div id="feature" data-target>
                <h2>FEATURES</h2>
                  @foreach ($features as $feature)
                  <div class="feature">
                       <img src="{{ asset('storage/'. $feature->file) }}" width = "80px" alt="">
                       <div class="texts">
                        <div class="title">{{ Str::words($feature->title, 3) }}</div>
                            <p class="rating">
                            @for ($i = 1; $i <= 5; $i++)
                                <span class="fa fa-star {{ $i <= $product->rating ? 'checked' : '' }}"></span>
                            @endfor
                            </p>
                         <div class="price">GHS{{ $feature->price }}</div>
                       </div>
                   </div>
                @endforeach
            </div>
        </div>

       

        <style>

            #hot-best-feature{
                width: 100%;
                height: 100%;
                padding: 40px 0;
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 20px;
            }
            /* #hot-trends, #best-sellers, #feature{
                display: flex;
                flex-direction: column;
                gap: 12px;
            } */
             [data-target]{
                display: flex;
                flex-direction: column;
                gap: 12px;
             }

            #hot-best-feature h2{
                margin-bottom: 30px;
                font-size: 20px;
                font-weight: bold;
            }

            .feature{
                display: flex;
                gap: 12px;
                box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.1);
            } 
            .texts{
                display: flex;
                flex-direction: column;
            }
            #hot-best-feature .price{
                font-weight: normal;
                color: var(--accent-color);

            }
            #hot-best-feature .title{
                font-weight: normal;
            }




             .hot-best-feature{
                display: none;
            }
             
            .hot-best-feature p.active{
                background: var(--accent-color);
                color: #fff;
            }

            @media(max-width: 768px){
            #hot-best-feature{
                display: flex;
            }   
            #hot-trends, #best-sellers, #feature{
                 width: 100%;
                 /* min-width: 100%; */
            }
            .hot-best-feature{
                display: flex;
                width: 100%;
                gap: 4px;
                justify-content: space-between;
            }
            .hot-best-feature p{
                background: #f2f2f2;
                padding: 8px;
                font-size: 14px;
                font-weight: bold;
                border-radius: 4px;
                width: 100%;
            }

            [data-target]{
                display: none;
            }

            .active[data-target]{
                display: flex;
            }

            }



    #cta-banner{
        width: 100%;
        padding: 6px;
        box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.1);
        margin-bottom: 10px;
        border-radius: 10px;
    }
    .cta-banner{
        width: 100%;
        display: flex;
        padding: 30px;
        justify-content: space-around;
        background: var(--accent-color);
        border-radius: 10px;
        align-items: center;
    }

    .cta-text{
        display: flex;
        flex-direction: column;
        flex: 2;
        color: #fff;
        justify-content: center;
    }

    .cta-text h1{
        font-size: 80px;
        font-weight: 900;
        line-height: 1;
        word-wrap: break-word;
        overflow-wrap: break-word;
        max-width: 100%;
        white-space: normal;
    }

    .cta-text p{
        font-size: 40px;
        font-weight: 500;
    }

    .cta-text > div{
        font-size: 30px;
        font-weight: bold;
        background: #fff;
        padding: 8px 16px;
        width: fit-content;
        border-radius: 40px;
        text-align: center;
        font-weight: 200;
        color: #333;
    }

    .cta-text span{
        font-weight: 900;
        font-size: 40px;
        color: #333;
    }

    .cta-img{
        width: 100%;
        height: 150px;
        flex: 1;
    }

    .cta-img img{
        width: 100%;
        height: 100%;
    }

    @media(max-width: 768px){
     

        #cta-banner{
            height: fit-content;
        }
        .cta-banner{
          /* flex-direction: column; */
          padding: 10px;
        }

        .cta-text h1{
            font-size: 30px;
            font-weight: 900;
        }

    .cta-img{
        width: 100%;
        height: 100%;
    }

    .cta-img img{
        width: 100%;
        height: 100%;
    }



    .cta-text p{
        font-size: 18px;
        font-weight: 500;
    }

    .cta-text > div{
        font-size: 18px;
    }

    .cta-text span{
        font-weight: 600;
        font-size: 20px;
        color: #333;
    }




    }

        </style>


 <script>
            const tabs = document.querySelectorAll('[data-tab]');
            const contents = document.querySelectorAll('[data-target]');
         
            tabs.forEach(taped=>{
              
                taped.addEventListener('click', () =>{
                     
                    const target = document.querySelector(taped.dataset.tab);
                    contents.forEach(content =>{
                        content.classList.remove('active');
                        tabs.forEach(taped=>{
                            taped.classList.remove('active')
                        })
                    })
                    taped.classList.add('active')
                    target.classList.add('active');
                })
            })
        </script>

    </section>



    {{-- PRODUCTS NEW ARRIVALS --}}

    <section>
        <div id="new-arrivals">
              <h1>NEW ARRIVALS <span>ANDROID</span></h1>
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
                No Product found: <strong>{{request()->search}}</strong>
            </div>
        @endforelse

              

             <!-- {{-- <div class="products">
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
</div> --}}  -->

        </div>
    </section>
    <section>

        {{-- PRODUCTS TOP BRANDS --}}
        <div id="top-brands">
              <h1>OUR TOP <span>BRANDS</span></h1>
            <hr>
            <div class="top-brands">
                <div class="brand">
                    <div class="logo-text">
                        <div style="background: #fff; padding: 6px 8px; width: fit-content; font-weight: bold;">10% OFF</div>
                        <div class="text">Best Deals on Flagship Phones</div>
                       
                        <span style="display: flex; align-items: center; gap: 3px; text-align-center" > <p>Shop Now</p><i class="fa fa-long-arrow-right" style="color: #fff"></i></span>
                    </div>
                    <div class="brand-img"><img src="{{asset('images/app.png')}}"></div>
                </div>
                <div class="brand" style="">
                    <div class="logo-text">
                       <div style="background: #fff; padding: 6px 8px; width: fit-content; font-weight: bold;">10% OFF</div>
                        <div class="text">Unlock Your Savings Now</div>
                         <p>Shop Now <i class="fa fa-long-arrow-right"></i></p>
                    </div>
                    <div class="brand-img"><img src="{{asset('images/image3.png')}}"></div>
                </div>
                {{-- <div class="brand">
                    <div class="logo-text">
             
                        <div class="text">Up to 40% Off on Top Smartphones</div>
                         <p>Shop Now <i class="fa fa-long-arrow-right"></i></p>
                    </div>
                    <div class="brand-img"><img src="{{asset('images/itel.png')}}"></div>
                </div> --}}
            </div>
        </div>




        <div class="products">
            @foreach ($products as $product)
               <x-products :product="$product"/> 
            @endforeach
        </div>
    </section>


</x-layout>