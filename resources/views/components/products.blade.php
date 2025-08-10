 {{-- @props(['product']) --}}
      
        {{-- <div class="product">
                    <div><img src="{{asset('storage/' . $product->file)}}" alt=""></div>
                    <p class="title">{{$product->description}}</p>
                    <h3 class="prcie">GHS{{$product->price}}</h3>
                    <div class="rating-commission">
                        <p class="rating">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </p>
                        <div class="commission">
                            -8%
                        </div>
                    </div>
                </div> --}}

                @props(['product', 'style' => ''])
        <a href="{{route('product.show', $product)}}">
            <div class="product" style="{{ $style }}">
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

        
        