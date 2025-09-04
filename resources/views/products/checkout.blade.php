<x-layout>
    <div id="checkout">
        <h1>Confirm Delivery Information</h1>
        <div class="checkout">
            
            
            <div class="container">
                <p><strong>First Name: </strong>   {{auth()->user()->firstname}}</p>
                <p><strong>Last Name: </strong>   {{auth()->user()->lastname}}</p>
                <p><strong>Email: </strong>{{auth()->user()->email}}</p>
                <p><strong>Telephone: </strong>{{auth()->user()->telephone}}</p>
                <p><strong>Gender: </strong>{{auth()->user()->gender}}</p>
                <p><strong>Address: </strong>{{auth()->user()->address}}</p>
                <p><strong>Region: </strong>{{auth()->user()->region}}</p>
    
                <a href="{{route('profile')}}"><button>Edit</button></a>
             </div>
            <div class="container">
                 @php $total = 0; @endphp
           @if (session('cart'))
           
                 <div class="items">
                    @foreach (session('cart') as $key => $item)
                    @php
                        $total = $total + ($item['quantity'] * $item['price']);
                    @endphp
                <div class="cart-item">
                    <div class="cart-img"><img src="{{asset('storage/' . $item['file'])}}" width="40px"></div>
                    <div class="cart-text">
                        <p>{{Str::words($item['title'], 6)}}</p>
                        
                    </div>
                    <div class="cart-buttons">
                        <span>
                             <h3>GHS{{$item['price']}}</h3>
                            <!-- <input type="number" value="{{$item['quantity']}}" min="1">
                            <input type="submit" name="update" id="" value="Update">
                        </span> -->
                        <!-- <a href="{{route('removeItem', $key)}}"><input type="submit" name="remove" value="Remove"></a> -->
                    </div>
                </div>
                  @endforeach
            </div>
         
               
          
            <div class="summary">
                <div class="summary-text">
                    <h3>Cart Summary</h3>
                    <div class="subtotal">
                        <p>Delivery Fee: </p>
                        <p>GHS0.0</p>
                    </div>
                    <div class="subtotal">
                        <p>Subtotal</p>
                        <p>GHS{{$total}}</p>
                    </div>
                    <div class="total">
                        <h3>Total</h3>
                        <h3>GHS{{$total}}</h3>
                    </div>
                </div>
                <!-- <a href="{{route('checkout')}}"><button class="checkout">Checkout</button></a> -->
            </div>
             @else 
            <h3 style="font-size: 22px; font-weight: bold">Your cart is empty. Add a product.</h3>
            @endif
           
            
        
    
                <a href="{{route('confirmpayment')}}"><button>Confirm Delivery Information</button></a>
             </div>
             
         
    </div>
</div>
 
    <style>
        #checkout{
            padding: var(--page-padding);
            display: flex;
            flex-direction: column;
            /* align-items: center; */

        }
              
        h1{
            font-size: 40px;
            font-weight: bold;
            margin-bottom: 30px;
        }
        .checkout{
            display: flex;
            justify-content: space-around;
            gap: 20px;
        }
   
        .container{
            width: 100%;
            display: flex;
            flex-direction: column;
            /* align-items: center; */
            padding: 40px;
            box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.1);
            gap: 12px;
        }
        .container:first-child{
            width: fit-content;
        }
        #checkout button{
            background: var(--accent-color);
            color: #fff;
            padding: 6px 12px;
            cursor: pointer;
        }
    
    

        /* LIST OF ALL THE ITEMS SELECTED FROM THE CART */

         .items{
            display: flex;
            flex-direction: column;
            gap: 10px;
             
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
            /* box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.05); */
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
        /* input[type="number"]{
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
        } */


        .summary{
            display: flex;
            flex-direction: column;
            gap: 10px;
            width: 100%;
            
        }
        .summary-text{
            display: flex;
            flex-direction: column;
            gap: 6px;
            background: var(--secondary-color);
            padding: 20px;
        }
        .subtotal, .total{
            display: flex;
            gap: 20px;
            justify-content: space-between;
        }
        .subtotal{
            font-size: 18px;
        }
        .total{
            color: var(--color-1);
            font-size: 20px;
            font-weight: bold;
        }
    </style>
</x-layout>