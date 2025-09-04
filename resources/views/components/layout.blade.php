<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tapcel</title>
    @vite(['resources/css/layout.css'])
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite(['resources/css/home.css', 'resources/js/app.js'])
    @vite('resources/css/product.css')
    @vite('resources/css/all.css')
    @vite(['resources/css/register.css'])
    <link rel="stylesheet" href="{{asset('fontawesome-free-6.7.2-web/css/all.min.css')}}">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/all.css">

 
</head>
<body>
    <div class="navbar">
        <a href="{{route('product.index')}}">LOGO</a>
        <nav>
            <ul>
                <li><a href="{{route('product.index')}}">Home</a></li>
                <li><a href="">About</a></li>
                <li><a href="">Ratings</a></li>
                <li><a href="pages/contact">Contact</a></li>
            </ul>
            
        </nav>

        <form action="{{route('product.index')}}" class="search">
              <input type="text" name="search" placeholder="Search...">
              <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
            <!-- {{-- <form action="{{route('product.index')}}" class="search">
                <input type="text" name="search" placeholder="Search for a product ...">
                <button type="submit">Search</button>
            </form> --}} -->
        <div class="cart-login">
            <div class="cart">
                <a href="{{route('cart')}}" style="">
                    <i class="fa-regular fa-cart-shopping"></i>
                   
                    @if (empty(session('cart')))
                        <p></p>
                    @else
                     <p class="cart-count"> {{count(session('cart', []))}}</p>
                    @endif
                       
                </a>
           </div>
                <a href="{{route('login')}}" style="">
                    <i class="fa fa-user"></i>
                </a>
                <i class="fa fa-bars"></i>
        </div>
        <style>
            .cart > a{
                display: flex; position: relative;
            }
            .cart-count{
                position: absolute; top: -8px; background: var(--color-1);
                right: -4px; color: #fff; 
                font-weight: bold; z-index: 2; 
                border-radius: 50%; text-align: center;
                width: 20px; height: 20px; display: flex; align-items: center; justify-content: center;
                 font-size: 12px; padding: 2px; 
            }

            #user-circle{
                font-size: 20px;
            }
            .logout{
                background: var(--accent-color);
                color: #fff;
                padding: 3px 12px;
                cursor: pointer;
                margin-left: 6px;
            }

            @media(max-width: 767px) {
                .login-register{
                    display: none;
                }
            }

        </style>
            <div class="login-register">
                @guest
                    <a href="{{route('login')}}">Login</a>
                <p>|</p>
                <a href="{{route('users.create')}}">Register</a>
                @endguest
                @auth
                <a href="{{route('userprofile')}}"><i class="fa fa-user-circle" id="user-circle"></i></a>
                 <!-- <div>{{auth()->user()->firstname}}</div> -->
                 <form action="{{route('logout')}}" method="POST">

                    @csrf
                    <button class="logout">Logout</button>
                 </form>
                @endauth
            </div>
        </div>
    </div>
    {{$slot}}

    <section>
        
        <div id="services">
            <div class="services">
                <div class="service">
                    <i class="fa-solid fa-bus"></i>
                    <p>Free, Fast Shapping above GHS600</p>
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


    <footer>
        <div class="footer">
            <div class="footer-col">
            <h3>Logo</h3>
            <div class="col-items">
                 <p>We have all your apple and android devices, just relax and explore</p>
            <h4>Download Our App</h4>
            <span>
                <div class="playstore"><img src="{{asset('images/playstore.webp')}}" alt=""></div>
                <div class="appstore"><img src="{{asset('images/appstore.png')}}" alt=""></div>
            </span>
            </div>
            </div>       
            <div class="footer-col">
            <h3>Contact</h3>
             <div class="col-items">
                <span>
                <i class="fa-brands fa-instagram"></i>
                <p>+233 278 0483</p>
             </span>
             <span>
                <i class="fa-brands fa-facebook"></i>
                <p>example@gmail.com</p>
             </span>
             <span>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-x"></i>
                <i class="fa-brands fa-tiktok"></i>
             </span>
             </div>
            </div>       
            <div class="footer-col">
                <h3>Terms</h3>
                <div class="col-items">
                    <p>Shipping & Delivery</p>
                    <p>Return & Refund Policy</p>
                    <p>Warranty</p>
                    <p>Terms & Conditions</p>
                    <p>Privacy Policy</p>
                    </div>
            </div>       
            <div class="footer-col">
                <h3>Get Help</h3>
                <div class="col-items">
                    <p>Track Order</p>
                    <p>How to Shop</p>
                    <p>FAQ</p>
                    <p>About Us</p>
                    <p>Contact Us</p>
                    
                </div>
            </div>       
                
        </div>
        <div>
            <hr>
            <div>Copyright 
                <script>
                    const date = new Date();
                    document.write(date.getFullYear())
                </script>.
                <a href="products/dashboard">All rights reserved!</a>
            </div>
        </div>
    </footer>
</body>
</html>