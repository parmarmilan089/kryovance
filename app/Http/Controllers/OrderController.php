<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use App\Models\BillingDetails;
use App\Models\Inventory;
use Illuminate\Support\Facades\Session;
use Razorpay\Api\Api;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $data = [];
        $data['title'] = 'Order';
        $data['menu_active_tab'] = 'order';
        $customer = auth('customer')->user();

        if (!$customer) {
            return redirect()->route('user-login')->with('error', 'Please login to view your orders.');
        }

        $orders = Order::where('customer_id', $customer->id)
            ->orderBy('created_at', 'desc')
            ->get();
        $data['orders'] = $orders;
        return view('user.order')->with($data);
    }

    public function orderDetails($id)
    {
        $customer = auth('customer')->user();

        if (!$customer) {
            return redirect()->route('customer.login')->with('error', 'Please login to view your order details.');
        }

        $order = Order::with('billingDetails', 'items.product')->findOrFail($id);
        if (!$order) {
            return redirect()->route('order')->with('error', 'Order not found.');
        }
        $data = [];
        $data['title'] = 'Order';
        $data['menu_active_tab'] = 'order';
        $data['order'] = $order;
        return view('user.order-details')->with($data);
    }

    public function placeOrder(Request $request)
    {
        // Validate Request Data
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|min:10|max:15',
            'address' => 'required|string|max:500',
            'order_note' => 'required|string|max:500',
            'city' => 'required|string|max:255',
            'zip_code' => 'required|string|max:10',
            'country' => 'required|string|max:255',
            'payment_method' => 'required|in:cod,razorpay',
        ]);

        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->back()->with('error', 'Your cart is empty!');
        }

        $orderData = [
            'order_number' => 'ORD-' . strtoupper(uniqid()),
            'customer_id' => auth('customer')->id() ?? null,
            'subtotal' => collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']),
            'total' => collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']),
            'payment_method' => $request->payment_method,
            'payment_status' => ($request->payment_method == 'cod') ? 'pending' : 'processing'
        ];
        // Create Order
        $order = Order::create($orderData);

        // Save Billing Details
        BillingDetails::create([
            'order_id' => $order->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'company_name' => $request->company_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'zip_code' => $request->zip_code,
            'order_notes' => $request->order_note,
            'country' => $request->country
        ]);

        // Save Order Items
        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'product_name' => $item['name'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
                'total_price' => $item['price'] * $item['quantity']
            ]);
            
            
            $product = Product::find($item['id']);
            $inventory = Inventory::find($product->inventory_id);
            $inventory->qty = $inventory->qty - $item['quantity'];
            $inventory->save();
        }

        // Clear Cart
        session()->forget('cart');

        // Handle Razorpay Payment
        if ($request->payment_method == 'razorpay') {
            return redirect()->route('razorpay.pay', ['order_id' => $order->id]);
        }

        return redirect()->route('order-complete');
        // return redirect()->route('order-complete', ['order_id' => $order->id]);
    }

    public function order_complete() {
        $data = [];
        $data['title'] = 'Order Complete';
        $data['menu_active_tab'] = 'order-complete';

        return view('user.order-complete')->with($data);
    }
}
