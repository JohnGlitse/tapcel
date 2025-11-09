<x-layout>
    <div id="confirmpayment">
    <h1>Select Payment Method</h1>
    <div class="container">
            <a href="{{route('payment.momo')}}"><button>Mobile Money</button></a>
            <a href="{{route('payment.bank')}}"><button>Bank Payment</button></a>
            <a href=""><button>Pay Cash on Delivery</button></a>
            <a href="{{route('product.index')}}"><button style="background-color: var(--accent-color); color: #fff">Cancel Payment</button></a>
    </div>

    <style>
        #confirmpayment{
            padding: 80px;
            display: flex;
            align-items: center;
            flex-direction: column;
            gap: 30px;
        }
        .container{
            width: 300px;  
            display: flex;
            flex-direction: column;
            align-items: stretch;  
            padding: 40px;
            box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.1);
            gap: 12px;
        }
        
        .button-link {
            width: 100%;  
            text-decoration: none;  
        }

        #confirmpayment button{
            background: transparent;
            border: 1px solid #3587a4;
            padding: 12px 20px;  
            font-size: 18px;
            cursor: pointer;
            width: 100%;
            box-sizing: border-box;  
            transition: all 0.3s ease;  
        }
        
        #confirmpayment button:hover {
            background-color: var(--accent-color);
            color: white;
        }

       
        @media(max-width: 767px){
            #confirmpayment{
            padding: 40px 15px;
            gap: 30px;
        }
        .container{
            width: 100%;
        }
        }
        
    </style>
</div>
</x-layout>