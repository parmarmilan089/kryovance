<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Razorpay\Api\Api;

class RazorpayController extends Controller
{
    // POST /razorpay/payment
    public function handlePayment(Request $request)
    {
        $request->validate([
            'razorpay_payment_id' => 'required|string',
            'order_id' => 'required|integer',
        ]);

        $order = Order::find($request->order_id);
        if (!$order) {
            return response()->json(['status' => 'error', 'message' => 'Order not found.'], 404);
        }

        $api = new Api('rzp_live_PSBe9qHdz1LKGW', 'aJ56vWzkSUyMgQ5eRcd8tcqH');  // Replace with your Razorpay secret
        try {
            $payment = $api->payment->fetch($request->razorpay_payment_id);
            dd($payment);
            Log::info('Razorpay Payment:', (array) $payment);
            Log::info('Order Amount:', ['order_amount' => $order->final_total * 100, 'payment_amount' => $payment->amount]);
            if ($payment && $payment->status === 'captured' && $payment->amount == ($order->final_total * 100)) {
                $order->payment_status = 'paid';
                $order->save();
                session()->forget('cart');
                return response()->json(['status' => 'success', 'message' => 'Payment successful!']);
            } else {
                return response()->json(['status' => 'error', 'message' => 'Payment verification failed.'], 400);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Razorpay error: ' . $e->getMessage()], 500);
        }
    }

    /**
     * POST /razorpay/capture
     * Capture a Razorpay payment after authorization
     */
    public function capturePayment(Request $request)
    {
        $request->validate([
            'razorpay_payment_id' => 'required|string',
            'order_id' => 'required|integer',
            'amount' => 'required|numeric',  // Amount in paise
        ]);

        $order = Order::find($request->order_id);
        if (!$order) {
            return response()->json(['status' => 'error', 'message' => 'Order not found.'], 404);
        }

        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        try {
            $payment = $api->payment->fetch($request->razorpay_payment_id);
            $capture = $payment->capture(['amount' => $request->amount]);
            // Update order status
            $order->payment_status = 'paid';
            $order->save();
            session()->forget('cart');
            return response()->json(['status' => 'success', 'message' => 'Payment captured', 'payment' => $capture]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    /**
     * GET /razor/payment/{order_id}
     * Show payment status to the user
     */
    public function paymentStatus($order_id)
    {
        $order = Order::findOrFail($order_id);
        return view('payment.status', compact('order'));
    }

    /**
     * Handle Razorpay webhook for payment captured
     */
    public function webhook(Request $request)
    {
        $webhookSecret = 'YOUR_RAZORPAY_WEBHOOK_SECRET';  // Replace with your webhook secret
        $payload = $request->getContent();
        $signature = $request->header('X-Razorpay-Signature');
        Log::info('Razorpay Webhook Payload:', ['payload' => $payload, 'signature' => $signature]);

        // Verify signature
        $expectedSignature = hash_hmac('sha256', $payload, $webhookSecret);
        if ($signature !== $expectedSignature) {
            Log::warning('Razorpay Webhook signature mismatch');
            return response('Invalid signature', 400);
        }

        $data = json_decode($payload, true);
        if (isset($data['event']) && $data['event'] === 'payment.captured') {
            $paymentId = $data['payload']['payment']['entity']['id'] ?? null;
            $amount = $data['payload']['payment']['entity']['amount'] ?? null;
            // Find the order by payment_id (you may need to store payment_id in your orders table)
            $order = Order::where('razorpay_payment_id', $paymentId)->first();
            if ($order) {
                $order->payment_status = 'paid';
                $order->save();
                Log::info('Order marked as paid by webhook', ['order_id' => $order->id]);
            } else {
                Log::warning('Order not found for webhook payment_id', ['payment_id' => $paymentId]);
            }
        }
        return response('Webhook received', 200);
    }
}
