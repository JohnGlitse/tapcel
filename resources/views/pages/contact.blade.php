<x-layout>
    <div id="contact">
        <h1>Contact Us</h1>
        <div class="contact">
            
            <div class="contact-text">
                
                <p>Feel Free to use the form or drop an email. Old fashioned phone calls work too.</p>
                <span><i class="fa-regular fa-cart-shopping"></i>  +233 23 804 2483</span>
                <span><i class="fa-regular fa-cart-shopping"></i>  jray@gmail.com</span>
                <span><i class="fa-regular fa-cart-shopping"></i>  Accra, Ghana</span> 
            </div>
            <form action="">
                {{-- <label for="name">Name</label> --}}
                <input type="text" name="name" placeholder="Name">
                {{-- <label for="email">Email</label> --}}
                <input type="email" name="email" placeholder="Email">
                {{-- <label for="message">Message</label> --}}
                <textarea name="message" id="" cols="30" rows="1" placeholder="Message"></textarea>
                <button type="submit">Send</button>
            </form>
        </div>
    </div>
</x-layout>