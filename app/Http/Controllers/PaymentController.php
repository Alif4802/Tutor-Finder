<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;

class PaymentController extends Controller
{
    public function createPaymentIntent(Request $request)
    {
        // Set your Stripe API key
        Stripe::setApiKey(config('services.stripe.secret'));

        // Create a PaymentIntent
        $paymentIntent = PaymentIntent::create([
            'amount' => $request->input('amount'),
            'currency' => 'usd', // Change to your desired currency
        ]);

        return response()->json(['clientSecret' => $paymentIntent->client_secret]);
    }

    public function processPayment(Request $request)
    {
        // Set your Stripe API key
        Stripe::setApiKey(config('services.stripe.secret'));

        // Retrieve the PaymentIntent ID from the request
        $paymentIntentId = $request->input('payment_intent_id');

        // Confirm the PaymentIntent
        $paymentIntent = PaymentIntent::retrieve($paymentIntentId);
        $paymentIntent->confirm();

        // Perform additional actions after successful payment
        // For example, mark an order as paid or update user's subscription

        return response()->json(['message' => 'Payment successful']);
    }
}
