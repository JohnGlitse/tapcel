<x-layout>

    <div id="signup">
        <div class="signup">
            <h1>Complete your profile</h1>
            {{-- <form action="{{route('users.update', $user->id)}}" method="POST"> --}}
            <form action="/users/update/{{$user->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-row">
                <input type="text" name="firstname" placeholder="First Name" value="{{$user->firstname}}">
                @error('firstname')
                    <p class="error-message">{{$message}}</p>
                @enderror
                <input type="text" name="lastname" placeholder="Last Name" value="{{$user->lastname}}">
                 @error('lastname')
                    <p class="error-message">{{$message}}</p>
                @enderror
            </div>
            <div class="form-row">
                <input type="email" name="email" placeholder="Email" value="{{$user->email}}">
                 @error('email')
                    <p class="error-message">{{$message}}</p>
                @enderror
                <input type="number" name="telephone" placeholder="Telephone" value="{{$user->telephone}}">
                 @error('telephone')
                    <p class="error-message">{{$message}}</p>
                @enderror
            </div>
            <div class="form-row">
               <div id="gender">
                <label for="gender">Gender</label>
                <div class="gender">
                <span>
                     <input type="radio" name="gender" value="{{$user->gender}}">
                 <label for="gender">Male</label>
                </span>
                <span>
                    <input type="radio" name="gender" value="{{$user->gender}}">
                <label for="gender">Female</label>
                </span>

               </div>
                @error('gender')
                    <p class="error-message">{{$message}}</p>
                @enderror
               </div>


               <div id="region">
                <p>Region</p>
                <select name="region" id="" class="region">
                    <option value="">--- Select a region ---</option>
                    <option value="{{$user->region}}">Greater Accra</option>
                    <option value="{{$user->region}}">Volta</option>
                    <option value="{{$user->region}}">Northern</option>
                    <option value="{{$user->region}}">Ashante</option>
                    <option value="{{$user->region}}">Central</option>
               </select>
               </div>
                @error('region')
                    <p class="error-message">{{$message}}</p>
                @enderror
            </div>

            <div class="form-row">
                <input type="text" name="address" placeholder="Address" value="{{$user->address}}">
                  @error('address')
                    <p class="error-message">{{$message}}</p>
                @enderror
                <input type="password" name="password" placeholder="Password">
            </div>
            <div class="form-row">
                <input type="submit" value="Update">
            </div>
        </form>
    
        </div>
    </div>
</x-layout>