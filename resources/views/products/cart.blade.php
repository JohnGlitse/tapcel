<!-- {{-- <x-layout>
    @php
        $total = 0
    @endphp
    @if (session('cart'))
    <div style="display: grid; grid-template-columns: repeat(3, 1fr)">
        @foreach (session('cart') as $key => $value)
          @php
              $total = $total + ($value['price'] * $value['quantity']);
          @endphp
            <div>
                <img src="{{asset('storage/' . $value['file'])}}" width="200px">
            <p>{{$value['title']}}</p>
            <input type="number" name="quantity" value="{{$value['quantity']}}" min="1">
            <p>${{$value['price']}}</p>
            <p>{{$value['description']}}</p>
            <strong>Sub-total ${{ $value['price'] * $value['quantity']}}</strong> <br>
           <a href="{{route('removeProduct', $key)}}"> <button>Remove</button></a>
            </div>
          
        @endforeach  
        <strong>Total:: {{$total}}</strong>
    </div>
    @endif
</x-layout> --}} -->



      @if (@session('completed')
        
        )
           <p class="added" style="">{{session('completed')}}</p>
       @endif

<x-layout>
    <div id="cart">
        <div class="cart">
           @php $total = 0; @endphp
           @if (session('cart'))
           
                 <div class="items">
                    @foreach (session('cart') as $key => $item)
                    @php
                        $total = $total + ($item['quantity'] * $item['price']);
                    @endphp
                <div class="cart-item">
                    <div class="cart-img"><img src="{{asset('storage/' . $item['file'])}}" width="80px"></div>
                    <div class="cart-text">
                        <p>{{Str::words($item['title'], 6)}}</p>
                         <h3>GHS{{$item['price']}}</h3>
                    </div>
                    <div class="cart-buttons">
                        <span>
                            <input type="number" value="{{$item['quantity']}}" min="1">
                            <input type="submit" name="update" id="" value="Update">
                        </span>
                        <a href="{{route('removeItem', $key)}}"><input type="submit" name="remove" value="Remove"></a>
                    </div>
                </div>
                  @endforeach
            </div>
         
               
          
            <div class="summary">
                <div class="summary-text">
                    <h3>Cart Summary</h3>
                    <div class="subtotal">
                        <p>Subtotal</p>
                        <p>GHS2000</p>
                    </div>
                    <div class="total">
                        <h3>Total</h3>
                        <h3>GHS{{$total}}</h3>
                    </div>
                </div>
                <a href="{{route('checkout')}}"><button class="checkout">Checkout</button></a>
            </div>
             @else 
            <h3 style="font-size: 22px; font-weight: bold">Your cart is empty. Add a product.</h3>
            @endif
           
            
        </div>
         
    </div>



    <style>
        #cart{
                width: 100%;
                min-height: 100%;
                padding: 80px;
                display: flex;
                flex-direction: column;
                justify-content: center;
                gap: 30px;
        }
        .cart{
            display: flex;
            gap: 20px;
            justify-content: space-between
        }
        .items{
            display: flex;
            flex-direction: column;
            gap: 10px;
            flex: 2;
        }
        .cart-item{
            width: 100%;
            height: 100%;
            background: var(--secondary-color);
            display: flex;
            padding: 20px;
            justify-content: space-between;
            gap: 40px;
            border-radius: 10px;
        }
        .cart-text{}
        .cart-buttons{
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: flex-end;
        }
        .cart-buttons > span{
            display: flex;
            gap: 4px;
        }
        .cart-buttons input{
            border: 1px solid var(--accent-color);
        }
        input[type="number"]{
            width: 70px;
        }
        input[type="submit"]{
            width: 70px;
            background: var(--accent-color);
            color: #fff;
            padding: auto;
            cursor: pointer;
            border: none;
        }
        input[name="remove"]{
            background: transparent;
            color: #ff0000;
            padding: auto;
            cursor: pointer;
            border: none;
        }

        .summary{
            display: flex;
            flex-direction: column;
            gap: 10px;
             flex: 1;
        }
        .summary-text{
            display: flex;
            flex-direction: column;
            gap: 6px;
            background: var(--secondary-color);
            padding: 12px;
        }
        .subtotal, .total{
            display: flex;
            gap: 20px;
        }

        .summary button{
                background-color: var(--accent-color);
                padding: 12px;
                color: #fff;
                font-size: 20px;
                cursor: pointer;
                width: 100%;
        }
        input{
            color: black;
            font-size: 18px;
        }
    </style>

           <script>
            const added = document.getElementsByClassName('added')[0];
 
            setTimeout(() => {
               added.style.display = 'none';
            }, 5000);
         
        </script>
</x-layout>