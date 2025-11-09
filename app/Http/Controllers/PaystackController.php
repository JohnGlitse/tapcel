<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PaystackController extends Controller
{
    /**
     * Show a form where users enter amount and email
     */
    public function showPaymentMomo()
    {
        return view('pay');
    }
    public function showPaymentBank()
    {
        return view('paybank');
    }


  public function redirectToGateway(Request $request)
{
    $request->validate([
        'email'   => 'required|email',
        'amount'  => 'required|numeric|min:1',
        'channel' => 'required|in:mobile_money,card',
    ]);

    $email   = $request->input('email');
    $amount  = intval($request->input('amount') * 100); // GHS -> pesewas
    $channel = $request->input('channel');

    try {
        $response = Http::withToken(env('PAYSTACK_SECRET_KEY'))
            ->timeout(15)
            ->post(env('PAYSTACK_PAYMENT_URL') . '/transaction/initialize', [
                'email'        => $email,
                'amount'       => $amount,
                'currency'     => 'GHS',
                'channels'     => [$channel],
                'callback_url' => route('payment.callback'),
            ]);
    } catch (\Exception $e) {
        Log::error('Paystack Initialize Exception', ['msg' => $e->getMessage()]);
        return back()->withInput()->with('error', 'Could not contact Paystack. Try again.');
    }

    // HTTP-level check
    if ($response->failed()) {
        Log::error('Paystack HTTP error', [
            'status' => $response->status(),
            'body'   => $response->body(),
        ]);
        return back()->withInput()->with('error', 'Payment initialization failed (network).');
    }

    $body = $response->json();

    // Log full response for debugging if initialization failed
    if (!($body['status'] ?? false) || !isset($body['data']['authorization_url'])) {
        Log::warning('Paystack initialize response', ['body' => $body, 'channel' => $channel]);
        $message = $body['message'] ?? ($body['data']['message'] ?? 'Payment initialization failed.');
        // Show meaningful message in debug mode, otherwise a generic friendly message
        if (config('app.debug')) {
            return back()->withInput()->with('error', "Initialization failed: {$message}");
        }
        return back()->withInput()->with('error', 'Payment initialization failed. Please contact support.');
    }


        //    ///// CREATE NEW ORDER IN THE ORDER TABLE WHEN PAYMENT IS SUCCESSFUL

            $orders = $request->validate([
            'firstname' => ['required'],
            'lastname' => ['required'],
            'email' => ['required'],
            'telephone' => ['required'],
            'gender' => ['nullable'],
            'region' => ['required'],
            'address' => ['required'],
            'city' => ['required'],
            'status' => ['nullable'],
            'tracking_number' => ['nullable']

        ]);

    Order::create([
    ...$orders,
    'tracking_number' => 'tapcel'.rand(0, 1000),
    ]);

    //$order->id;  

    
   

    // Success: redirect user to Paystack checkout
    return redirect($body['data']['authorization_url']);
 

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
            // return view('products.index', ['data' => $body['data']]);
            return redirect('cart')->with('completed', 'Your order has been placed successully!');
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







    /**
     * Redirect user to Paystack payment gateway
     */
    // public function redirectToGateway(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email',
    //         'amount' => 'required|numeric|min:1',
    //     ]);

    //     $email = $request->input('email');
    //     $amount = intval($request->input('amount') * 100); // Convert to pesewas

    //     $response = Http::withToken(env('PAYSTACK_SECRET_KEY'))
    //         ->post(env('PAYSTACK_PAYMENT_URL') . '/transaction/initialize', [
    //             'email' => $email,
    //             'amount' => $amount,
    //             'currency' => 'GHS',
    //             'channels' => ['mobile_money', 'bank'],
    //             'callback_url' => route('payment.callback'),
    //         ]);

    //     $body = $response->json();

    //     if ($body['status'] && isset($body['data']['authorization_url'])) {
    //         return redirect($body['data']['authorization_url']);
    //     }

    //     return back()->with('error', 'Payment initialization failed.');
    // }



