 
   
 


<x-layout>
     

    <div id="signup">
        <div class="signup">
            <h1>Complete Your Profile Information</h1>
            <form action="{{ route('users.update', auth()->user()->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-row">
                <input type="text" name="firstname" placeholder="First Name" value="{{ auth()->user()->firstname }}">
                @error('firstname')
                    <p class="error-message">{{$message}}</p>
                @enderror
                <input type="text" name="lastname" placeholder="Last Name" value="{{ auth()->user()->lastname }}">
                 @error('lastname')
                    <p class="error-message">{{$message}}</p>
                @enderror
            </div>
            <div class="form-row">
                <input type="email" name="email" placeholder="Email" value="{{ auth()->user()->email }}">
                 @error('email')
                    <p class="error-message">{{$message}}</p>
                @enderror
                <input type="number" name="telephone" placeholder="Telephone" value="{{ auth()->user()->telephone }}">
                 @error('telephone')
                    <p class="error-message">{{$message}}</p>
                @enderror
            </div>
            <div class="form-row">
               <div id="gender">
                <label for="gender">Gender</label>
                <div class="gender">
                <!-- {{-- <span>
                     <input type="radio" name="gender" value="{{ auth()->user()->gender }}">
                 <label for="gender">Male</label>
                </span>
                <span>
                    <input type="radio" name="gender" value="{{ auth()->user()->gender }}">
                <label for="gender">Female</label>
                </span> --}} -->

                <span>
                    <input type="radio" name="gender" value="Male" {{ auth()->user()->gender === 'Male' ? 'checked' : '' }}>
                    <label>Male</label>
                </span>
                <span>
                    <input type="radio" name="gender" value="Female" {{ auth()->user()->gender === 'Female' ? 'checked' : '' }}>
                    <label>Female</label>
                </span>

               </div>
                @error('gender')
                    <p class="error-message">{{$message}}</p>
                @enderror
               </div>


               <div id="region">
                <p>Region</p>
                <select name="region" class="region">
                    <option value="">--- Select a region ---</option>
                    <option value="Greater Accra" {{ auth()->user()->region === 'Greater Accra' ? 'selected' : '' }}>Greater Accra</option>
                    <option value="Volta" {{ auth()->user()->region === 'Volta' ? 'selected' : '' }}>Volta</option>
                    <option value="Northern" {{ auth()->user()->region === 'Northern' ? 'selected' : '' }}>Northern</option>
                    <option value="Ashanti" {{ auth()->user()->region === 'Ashanti' ? 'selected' : '' }}>Ashanti</option>
                    <option value="Central" {{ auth()->user()->region === 'Central' ? 'selected' : '' }}>Central</option>
                </select>

               </div>
                @error('region')
                    <p class="error-message">{{$message}}</p>
                @enderror
            </div>

            <div class="form-row">
                <input type="text" name="address" placeholder="Address" value="{{ auth()->user()->address }}">
                  @error('address')
                    <p class="error-message">{{$message}}</p>
                @enderror
                <!-- <input type="password" name="password" placeholder="Password"> -->
            </div>
            <div class="form-row">
                <input type="submit" value="Update">
            </div>
        </form>
    
        </div>
    </div>
</x-layout>


