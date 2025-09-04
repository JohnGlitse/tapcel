  

                @props(['product', 'style' => ''])
        <a href="{{route('product.show', $product)}}">
            <div class="product" style="{{ $style }}">
                <div>
                    <img src="{{ asset('storage/' . $product->file) }}" alt="">
                </div>
                <p class="title">{{Str::words($product->title, 2)}}</p>
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

        
        