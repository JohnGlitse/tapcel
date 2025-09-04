<x-layout>

    <div id="signup">
        <div class="signup">
            <h1>Create An Account</h1>
            <form action="{{route('users.store')}}" method="POST">
            @csrf
            <div class="form-row">
                <input type="text" name="firstname" placeholder="First Name" value="{{old('firstname')}}">
                @error('firstname')
                    <p class="error-message">{{$message}}</p>
                @enderror
                <input type="text" name="lastname" placeholder="Last Name" value="{{old('lastname')}}">
                 @error('lastname')
                    <p class="error-message">{{$message}}</p>
                @enderror
            </div>
            <div class="form-row">
                <input type="email" name="email" placeholder="Email" value="{{old('email')}}">
                 @error('email')
                    <p class="error-message">{{$message}}</p>
                @enderror
                <input type="number" name="telephone" placeholder="Telephone" value="{{old('telephone')}}">
                 @error('telephone')
                    <p class="error-message">{{$message}}</p>
                @enderror
            </div>
            <div class="form-row">
               <div id="gender">
                <label for="gender">Gender</label>
                <div class="gender">
                <span>
                     <input type="radio" name="gender" value="male" value="{{old('male')}}">
                 <label for="gender">Male</label>
                </span>
                <span>
                    <input type="radio" name="gender" value="female" value="{{old('female')}}">
                <label for="gender">Female</label>
                </span>

               </div>
                @error('gender')
                    <p class="error-message">{{$message}}</p>
                @enderror
               </div>


               <div id="region">
                <p>Region</p>
                <select name="region" id="region" class="region">
                    <option value="">--- Select a region ---</option>
                    <option value="Greater Accra">Greater Accra</option>
                    <option value="Volta">Volta</option>
                    <option value="Northern">Northern</option>
                    <option value="Ashante">Ashante</option>
                    <option value="Central">Central</option>
               </select>
               </div>

              <!-- {{-- <select name="region" class="region">
                <option value="">--- Select a region ---</option>
                <option value="Greater Accra" {{ old('region') == 'Greater Accra' ? 'selected' : '' }}>Greater Accra</option>
                <option value="Volta" {{ old('region') == 'Volta' ? 'selected' : '' }}>Volta</option>
                <option value="Northern" {{ old('region') == 'Northern' ? 'selected' : '' }}>Northern</option>
                <option value="Ashante" {{ old('region') == 'Ashante' ? 'selected' : '' }}>Ashante</option>
                <option value="Central" {{ old('region') == 'Central' ? 'selected' : '' }}>Central</option>
            </select> --}} -->

                @error('region')
                    <p class="error-message">{{$message}}</p>
                @enderror
            </div>

            <div class="form-row">
                <input type="text" name="address" placeholder="Address" value="{{old('address')}}">
                  @error('address')
                    <p class="error-message">{{$message}}</p>
                @enderror
                <input type="password" name="password" placeholder="Password">
            </div>
            <div class="form-row">
                <input type="submit" value="Sign Up">
                {{-- <button type="submit">Sign Up</button> --}}
            </div>
        </form>
    
        <div style="display: flex; gap: 10px; align-items: center">
            <a href="{{route('redirect.google')}}"> <img src="{{asset('images/googlesignin.png')}}" width="200px"> </a>
            <a href="{{route('redirect.google')}}"> <img src="{{asset('images/facebooksignin.png')}}" width="250px"> </a>
        <div>
           
        </div>
        
        
        </div>
    </div>
</x-layout>