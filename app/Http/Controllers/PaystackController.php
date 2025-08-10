<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PaystackController extends Controller
{
    /**
     * Show a form where users enter amount and email
     */
    public function showPaymentForm()
    {
        return view('pay');
    }

    /**
     * Redirect user to Paystack payment gateway
     */
    public function redirectToGateway(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'amount' => 'required|numeric|min:1',
        ]);

        $email = $request->input('email');
        $amount = intval($request->input('amount') * 100); // Convert to pesewas

        $response = Http::withToken(env('PAYSTACK_SECRET_KEY'))
            ->post(env('PAYSTACK_PAYMENT_URL') . '/transaction/initialize', [
                'email' => $email,
                'amount' => $amount,
                'currency' => 'GHS',
                'channels' => ['mobile_money', 'bank'],
                'callback_url' => route('payment.callback'),
            ]);

        $body = $response->json();

        if ($body['status'] && isset($body['data']['authorization_url'])) {
            return redirect($body['data']['authorization_url']);
        }

        return back()->with('error', 'Payment initialization failed.');
    }

    /**
     * Handle Paystack redirect/callback
     */
    public function handleGatewayCallback(Request $request)
    {
        $reference = $request->query('reference');

        if (!$reference) {
            return view('payment-failed')->with('error', 'No reference provided.');
        }

        $response = Http::withToken(env('PAYSTACK_SECRET_KEY'))
            ->get(env('PAYSTACK_PAYMENT_URL') . "/transaction/verify/{$reference}");

        $body = $response->json();

        if ($body['status'] && $body['data']['status'] === 'success') {
            // Store the transaction or mark order as paid
            // Example: Transaction::create([...])
            return view('products.index', ['data' => $body['data']]);
        }

        return view('payment-failed')->with('error', 'Payment failed or could not be verified.');
    }

    /**
     * Handle webhook from Paystack
     */
    public function handleWebhook(Request $request)
    {
        $signature = $request->header('x-paystack-signature');
        $computedSignature = hash_hmac('sha512', $request->getContent(), env('PAYSTACK_SECRET_KEY'));

        if ($signature !== $computedSignature) {
            Log::warning('Invalid Paystack webhook signature.');
            return response()->json(['message' => 'Invalid signature'], 400);
        }

        $payload = $request->all();
        $event = $payload['event'] ?? null;

        if ($event === 'charge.success') {
            $data = $payload['data'];

            // Save to DB, e.g.
            // Transaction::updateOrCreate(['reference' => $data['reference']], [...])
            Log::info('Payment successful via webhook', $data);
        }

        return response()->json(['status' => 'success']);
    }




    
}




