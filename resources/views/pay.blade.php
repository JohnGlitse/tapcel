<!DOCTYPE html>
<html>
<head>
    <title>Pay with Paystack</title>
</head>
<body>
    <!-- <h2>Make a Payment</h2>

    @if(session('error'))
        <p style="color: red">{{ session('error') }}</p>
    @endif

    <form action="{{ route('payment.redirect') }}" method="POST">
        @csrf
        <label for="email">Email:</label>
        <input type="email" name="email" required><br><br>

        <label for="amount">Amount (GHS):</label>
        <input type="number" name="amount" min="1" required><br><br>

        <button type="submit">Pay Now</button>
    </form> -->

 
@if(session('error'))
    <div style="color: red; margin-bottom: 10px;">{{ session('error') }}</div>
@endif

<form action="{{ route('payment.redirect') }}" method="POST">
    @csrf
    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required> <br><br>
    <input type="number" name="amount" placeholder="Amount (GHS)" value="{{ old('amount') }}" required><br><br>

    <button type="submit" name="channel" value="mobile_money">Pay with Mobile Money</button><br><br>
    <button type="submit" name="channel" value="card">Pay with Card</button>
</form>
 