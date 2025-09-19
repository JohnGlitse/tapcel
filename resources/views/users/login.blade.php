<x-layout>
 <div id="login">
     <h1>Log Into Your Account.</h1>
    <div class="login">
          
    <form action="{{route('login')}}" method="POST">
        @csrf
        <input type="email" name="email" placeholder="Enter your email" value="{{old('email')}}">
        @error('email')
            <p class="error-message">{{$message}}</p>
        @enderror
        <input type="password" name="password" placeholder="Enter your password">
        @error('password')
            <p class="error-message">{{$message}}</p>
        @enderror
        <input type="submit" name="submit" id="" value="Login">
    </form>
    </div>

    <div>
        <div style="display: flex; gap: 10px; align-items: center">
            <a href="{{route('redirect.google')}}"> <img src="{{asset('images/googlesignin.png')}}" width="200px"> </a>
            <a href="{{route('redirect.google')}}"> <img src="{{asset('images/facebooksignin.png')}}" width="250px"> </a>
        <div>
           
        </div>
         
 </div>
 <a href="{{route('users.create')}}">Don't have an account? Create Account. </a>
</div>
</div>
</x-layout>