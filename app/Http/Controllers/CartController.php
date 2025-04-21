<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function addToCart(Request $request,$id)
    {
        $cart = session()->get('cart', []);
        $product = DB::table('products')
            ->leftJoin('category', 'products.category_id', '=', 'category.id')
            ->select('products.id', 'products.name', 'products.price', 'category.name as category_name')
            ->where('products.id', $id)
            ->first();
        if (!$product) {
            return response()->json(['status' => 'error', 'message' => 'Product not found'], 404);
        }
        $images = getProductImages($id);


        // If product exists in cart, update quantity
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $request->quantity;
        } else {
            // Else, add a new product to the cart
            $cart[$id] = [
                "id" => $id,
                "name" => $product->name,
                "price" => $product->price,
                "category_name" => $product->category_name,
                'image' => !empty($images[0]) ? asset('storage/'.$images[0]->file_path) : asset('user/assets/images/15980049.png'),
                "quantity" => $request->quantity
            ];
        }

        session()->put('cart', $cart);

        // Count total items in cart
        $totalCartItems = collect($cart)->count();

        return response()->json([
            'status' => 'success',
            'message' => 'Product added to cart successfully!',
            'cart_count' => $totalCartItems
        ]);
    }

    public function removeCartItem(Request $request)
    {
        try {
            // Ensure an ID is received
            if (!$request->has('id')) {
                return response()->json(['success' => false, 'message' => 'Product ID missing'], 400);
            }

            // Retrieve the cart from the session
            $cart = session()->get('cart', []);

            // Remove the product if it exists
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            $cart = session()->get('cart', []);
            $subtotal = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);

            return response()->json([
                'success' => true,
                'message' => 'Item removed successfully',
                'cart_items' => $cart,
                'subtotal' => $subtotal,
                'total' => collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']),
                'cart_count' => collect($cart)->count()
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function viewCart()
    {
        return response()->json(session()->get('cart', []));
    }

    public function updateCart(Request $request)
    {
        $cart = session()->get('cart', []);
        $id = $request->id;
        $quantity = (int) $request->quantity;

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $quantity;
            session()->put('cart', $cart);
        }

        $subtotal = collect($cart)->sum(fn ($item) => $item['price'] * $item['quantity']);

        return response()->json([
            'status' => 'success',
            'subtotal' => number_format($subtotal, 2)
        ]);
    }

    public function getCartData()
    {
        // Assuming you're storing cart items in the session
        $cart = session()->get('cart', []);

        // Ensure each item has 'total_price'
        foreach ($cart as &$item) {
            $item['total_price'] = $item['price'] * $item['quantity'];
        }

        // Calculate totals
        $subtotal    = array_sum(array_map(fn($item) => $item['total_price'], $cart));
        $vat = 0;
        $discount = 0;
        $total = $subtotal ;
        $data = [
            'cart_items' => $cart,
            'subtotal' => $subtotal,
            'vat' => $vat,
            'discount' => $discount,
            'total' => $total,
        ];
        return response()->json($data);
    }

    public function clearCart()
    {
        Session::forget('cart'); // Clears the cart session
    }

    public function shop_cart() {
        $data = [];
        $data['title'] = 'Shop cart';
        $data['menu_active_tab'] = 'shop-cart';
        $data['cartItems'] = session()->get('cart', []);

        // Calculate subtotal
        $data['subtotal'] = collect($data['cartItems'])->sum(fn($item) => $item['price'] * $item['quantity']);
        return view('user.shop-cart')->with($data);
    }

    public function shopping_cart() {
        $data = [];
        $data['title'] = 'Shopping Cart';
        $data['menu_active_tab'] = 'shopping_cart';
        $data['cartItems'] = session()->get('cart', []);

        // Calculate subtotal
        $data['subtotal'] = collect($data['cartItems'])->sum(fn($item) => $item['price'] * $item['quantity']);
        return view('user.shopping_cart')->with($data);
    }
}
