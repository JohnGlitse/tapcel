 

        
 
    {{-- @if(session('error'))
        <p style="color: red">{{ session('error') }}</p>
    @endif

    <form action="{{ route('payment.redirect') }}" method="POST">
        @csrf
        <label for="email">Email:</label>
        <input type="email" name="email" required><br><br>

        <label for="amount">Amount (GHS):</label>
        <input type="number" name="amount" min="1" required><br><br>

        <button type="submit">Pay Now</button>
    </form> 

  --}}
  <x-layout>
@if(session('error'))
    <div style="color: red; margin-bottom: 10px;">{{ session('error') }}</div>
@endif

<div id="login">
<div class="login">
     
<form action="{{ route('payment.redirect') }}" method="POST">
    @csrf
    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required> 
    <input type="number" name="amount" placeholder="Amount (GHS)" value="{{ old('amount') }}" required> 
      <input type="hidden" name="channel" value="card">
    {{-- <button type="submit" name="channel" value="mobile_money">Pay with Mobile Money</button><br><br> --}}
    {{-- <button type="submit" name="channel" value="card">Pay with Card</button> --}}

    <div style="display: none">
         
        <input type="text" name="firstname" value="{{auth()->user()->firstname}}" placeholder="First Name">
        <input type="text" name="lastname" value="{{auth()->user()->lastname}}" placeholder="Last Name">
        <input type="email" name="email" value="{{auth()->user()->email}}" placeholder="Email">
        <input type="text" name="telephone" value="{{auth()->user()->telephone}}" placeholder="Telephone">
        <input type="text" name="gender" value="{{auth()->user()->gender}}" placeholder="Gender">
        <input type="text" name="city" value="{{auth()->user()->city}}" placeholder="City">
        <input type="text" name="region" value="{{auth()->user()->region}}" placeholder="Region">
        <input type="text" name="address" value="{{auth()->user()->address}}" placeholder="Address">
    </div>

    <input type="submit" name="submit" value="Pay with Card" id="">
</form>
</div>
</div>
</x-layout>
