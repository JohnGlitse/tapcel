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
           <a href="{{route('redirect.google')}}"> <button>Google</button></a>
            <button>Facebook</button>
        </div>
 </div>
</x-layout>