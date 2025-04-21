<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use App\Models\ProductImage;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Mail;
use View;
use Yajra\DataTables\DataTables;

class FrontendController extends Controller {

    public function dashboard() {
        $data = [];
        $data['title'] = 'Dashboard';
        $data['menu_active_tab'] = 'dashboard';
        $productsByCategory = Product::join('category', 'products.category_id', '=', 'category.id')
        ->select('products.*', 'category.name as category_name')
        ->get()
        ->groupBy('category_name');
        $data['productsByCategory'] = $productsByCategory;
        return view('user.dashboard')->with($data);
    }

    public function product_details($id) {
        $data = [];
        $data['title'] = 'Product Details';
        $products = Product::select('products.*', 'category.name as category_name')
        ->join('category', 'category.id', '=', 'products.category_id')
        ->where('products.id', $id)
        ->first();
        $data['product'] = $products;
        $data['menu_active_tab'] = 'product-details';

        return view('user.product-details')->with($data);
    }



    public function products(Request $request) {
        $data = [];
        $search = $request->input('search');
        // Query the products table and filter by the search term if provided
            $productsQuery = Product::select('products.*', 'category.name as category_name')
            ->join('category', 'category.id', '=', 'products.category_id');

        if ($search) {
            // If there's a search term, filter products by name or description
            $productsQuery->where(function($query) use ($search) {
                $query->where('products.name', 'like', '%' . $search . '%')
                    ->orWhere('products.description', 'like', '%' . $search . '%');
            });
        }
        // Fetch the products with search filter, ordered by name, and limit the results
        $products = $productsQuery->orderBy('products.name')
        ->limit(6)
        ->get();
        $data['title'] = 'Products';
        $data['products'] = $products;
        $data['total_products'] = $search ? $products->count() : Product::count();
        $data['menu_active_tab'] = 'products';
        $data['search'] = $search;
        return view('user.products')->with($data);
    }

    public function loadMore(Request $request)
    {
        $offset = $request->offset ?? 0;
        $search = $request->search ?? 0;
        $limit = 3;

        $query = Product::select('products.*', 'category.name as category_name')
            ->join('category', 'category.id', '=', 'products.category_id');

        // Apply filters
        if ($request->filled('price')) {
            $query->where('products.price', '<=', $request->price);
        }
        if ($request->filled('name')) {
            $query->where('products.name', 'like', '%' . $request->name . '%');
        }
        if ($search) {
            $query->where('products.name', 'like', '%' . $search . '%')->orWhere('products.description', 'like', '%' . $search . '%');
        }

        $products = $query->orderBy('products.name')->skip($offset)->take($limit)->get();
        $moreProducts = $products->count() > 0;

        return response()->json([
            'products' => view('user.product-list', compact('products'))->render(),
            'moreProducts' => $moreProducts,
            'count' => $products->count(),
        ]);
    }

    public function loadMoreProduct(Request $request)
    {
        $offset = $request->offset ?? 0;  // Get offset from request or default to 0
        $limit = 3;  // Set limit to 3 products per load

        // Fetch products with filters (optional)
        $query = Product::select('products.*', 'category.name as category_name')
            ->join('category', 'category.id', '=', 'products.category_id')
            ->where('category.name', $request->category);  // Filter by category

        // Apply price filter if provided
        if ($request->filled('price')) {
            $query->where('products.price', '<=', $request->price);
        }

        // Apply name filter if provided
        if ($request->filled('name')) {
            $query->where('products.name', 'like', '%' . $request->name . '%');
        }

        // Fetch the products with offset and limit
        $products = $query->orderBy('products.name')
            ->skip($offset)
            ->take($limit)
            ->get();

        // Check if there are more products
        $moreProducts = $products->count() > 0;

        return response()->json([
            'products' => view('user.product-list', compact('products'))->render(),
            'moreProducts' => $moreProducts,
            'count' => $products->count(),
        ]);
    }


    public function user_register () {
        $data = [];
        $data['title'] = 'User-Register';
        $data['menu_active_tab'] = 'user-register';

        return view('user.user-register')->with($data);
    }

    public function contactUs() {
        $data = [];
        $data['title'] = 'Contact Us';
        $data['menu_active_tab'] = 'contact-us';

        return view('user.contact-us')->with($data);
    }

    public function about() {
        $data = [];
        $data['title'] = 'About';
        $data['menu_active_tab'] = 'about';
        return view('user.about')->with($data);
    }

}
