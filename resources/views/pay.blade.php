<!DOCTYPE html>
<html>
<head>
    <title>Pay with Paystack</title>
</head>
<body>
    <h2>Make a Payment</h2>

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
    </form>
</body>
</html>
