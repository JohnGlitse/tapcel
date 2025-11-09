<x-layout>

      @if (@session('success')
        
        )
           <p class="added" style="">{{session('success')}}</p>
       @endif
     
        <div id="product-details">
            <div class="detail-hero">
                 <h3><a href="{{route('product.index')}}"><i class="fa-regular fa-house"></i></a>/{{Str::words($product->title, 3)}}</h3>
                 <span>
                    
                </span>
            </div>

            <div class="details">
            <div class="detail-img"> <img src="{{asset('storage/' . $product->file)}}"></div>
             <div class="detail-text">
                 <p class="title">{{Str::words($product->title, 10)}}</p>
                 <hr>
               <div style="display: flex; gap: 12px">
                 <h3 class="price">GHS{{$product->current_price}}</h3>
                 <p style="text-decoration: line-through">GHS{{$product->price}}</p>
               </div>
               <div class="availability"> 
                @if($product->quantity > 0)
                    <input type="checkbox" name="checkbox" checked> 
                       Availability: <span>In Stock</span></div>
                 @else
                  Availability: <span>Out of Stock</span></div>
                  @endif
               <form action="{{ route('add-To-Cart', $product->id) }}" method="POST">
                    @csrf
                    <input type="number" name="quantity" value="1" min="1" autofocus />
                    <a href="{{route('add-To-Cart', $product->id)}}"><button>Add To Cart</button></a>
               </form>
                {{-- <input type="number" name="quantity" min="1" id="" value="1"> --}}
                {{-- <a href="{{route('add-To-Cart', $product->id)}}"><button>Add To Cart</button></a> --}}
                <h4>Free shipping on orders above GHS2000 - Ends Today!</h4>
                  <hr>
                 <div class="description" >
                <h2>Product Description</h2>
                {{-- <p class="title">{{$brand->title}}</p> --}}
                <p>
                    {{$product->description}}
                     
                </p>
            </div>
               
             </div>

             
             </div>


            <div class="meta-info">
                <div class="headings">
                    <p data-links="#description" class="active">Description</p>
                    <p data-links="#ratings">Ratings</p>
                    <p data-links="#reviews">Reviews</p>
                </div>
                <div class="contents">
                    <div id="description" data-content class="active">
                        <div class="description" >
                            <h2>Product Description</h2>
                            {{-- <p class="title">{{$brand->title}}</p> --}}
                            <p>
                                {{$product->description}}
                                
                            </p>
                       </div>
                    </div>
                    <div id="ratings" data-content>THE LIST OF CUSTOMER RATINGS OF PRODUCT</div>
                    <div id="reviews" data-content>THE LIST OF CUSTOMER REVIEWS OF THE PRODUCT</div>
                </div>
            </div>

 <div id="relatedProducts"> 
    <h1>Related Products</h1>
    <hr>          
            <div class="products" id="products">
                @foreach ($products as $product)
                 <a href="{{route('product.show', $product)}}">
                 <div id="product">
                    <div>
                        <img src="{{ asset('storage/' . $product->file) }}" alt="">
                    </div>
                    <p class="title">{{Str::words( $product->title, 2)}}</p>
                 
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
                padding: 20px 0;
            }
             
            #product{
                width: 170px;
            }
            .added{
                color: white; background:#3587a4; padding: 12px;
                text-align: center;
                position: absolute;
                top: 0;
                z-index: 6;
                width: 100%;
                font-weight: bold;
            }
            @media(max-width: 767px){
            #relatedProducts{
                padding: 40px 15px;
            }
            }

            [data-content]{
                display: none;
            }
            .active[data-content]{
                display: block;
                padding: 40px;
                background-color: #f1f1f1;
                margin-top: 6px;
            }
            .meta-info{
                width: 100%;
                padding: 40px;
            }
            .meta-info .headings{
                display: flex;
                justify-content:  space-around;
                gap: 4px;
            }

            [data-links]{
                background-color: #f2f2f2;
                width: 100%;
                padding: 30px;
                font-size: 20px;
                font-weight: bold;
                text-align: center;
                cursor: pointer;
            }

            .active[data-links]{
                background-color: var(--accent-color);
                color: var(--primary-color);
            }
        </style>

        <script>
            const added = document.getElementsByClassName('added')[0];
 
            setTimeout(() => {
               added.style.display = 'none';
            }, 2000);


            const links = document.querySelectorAll('[data-links]');
            const contents = document.querySelectorAll('[data-content]');
             console.log(links)
            links.forEach(link=>{
                link.addEventListener('click', () =>{
                    const target = document.querySelector(link.dataset.links);

                    contents.forEach(content =>{
                        content.classList.remove('active')
                        links.forEach(link=>{
                            link.classList.remove('active');
                        })
                    })
                    link.classList.add('active')
                    target.classList.add('active');
                });
            });
                 












    //         const tabLinks = document.querySelectorAll('[data-tablink]')
	// const contents = document.querySelectorAll('[data-content]')
	// tabLinks.forEach(link=>{
	// 	link.addEventListener('click', ()=>{
	// 		const target = document.querySelector(link.dataset.tablink)
	// 		contents.forEach(content=>{
	// 			content.classList.remove('active')
	// 		})
	// 			tabLinks.forEach(link=>{
	// 				link.classList.remove('active')
	// 			})			

	// 		link.classList.add('active')
	// 		target.classList.add('active')
	// 	})
	// })

        </script>
    
</x-layout>



