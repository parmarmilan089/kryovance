<?php
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\DB;
function getStoragePath() {
    return url('/') . '/public' . \Storage::url('');
    // return url('/') . \Storage::url('');
    // return asset('storage/');
}

function getPublicPathImgFolder() {
    return url('/') . "/admin/img/";
}

function DefaultProfileImage() {
    return url('/') . "/admin/image/" . 'default_profile.png';
}

function getMbSubstr($str = null, $start = 0, $length = 10) {
    $response = "";
    if ($str != null) {
        $response = mb_substr($str, $start, $length) . '...';
    }
    return $response;
}

function getCartCount()
{
    $cart = session()->get('cart', []);
    return  collect($cart)->count(); // Count total quantity in cart
}
function show_decrypted($value)
{
    try {
        return decrypt($value);
    } catch (DecryptException $e) {
        return '123'; // return empty string or fallback if decryption fails
    }
}
if (!function_exists('getProductImages')) {
    function getProductImages($productId)
    {
        return DB::table('product_images')
            ->where('product_id', $productId)
            ->get();
    }
}
if (!function_exists('getLatestProductsWithImages')) {
    function getLatestProductsWithImages()
    {
        // Fetch the latest 2 products with their image paths (joining product_images)
        $products = DB::table('products')
            ->join('product_images', 'products.id', '=', 'product_images.product_id')
            ->select('products.id as product_id', 'products.name as product_name','products.is_deleted as product_deleted', 'products.price as product_price', 'product_images.file_path')
            ->orderBy('products.created_at', 'desc') // Ordering by the latest product (created_at)
            ->where('products.is_deleted', '0')
            ->limit(2)
            ->get();

        // If products exist, attach full image URL
        $products->transform(function ($product) {
            $product->image_url = asset('storage/'.$product->file_path);
            unset($product->file_path); // Remove the file path column if not needed
            return $product;
        });

        return $products;
    }
}
if (!function_exists('getSaleProductsWithImages')) {
    function getSaleProductsWithImages()
    {
        // Fetch the Sale 2 products with their image paths (joining product_images)
        $totalRecords = DB::table('products')->count();

        // Skip the latest 2 records, and limit to 2 records after the skip
        $products = DB::table('products')
            ->join('product_images', 'products.id', '=', 'product_images.product_id')
            ->select('products.id as product_id', 'products.name as product_name', 'products.price as product_price', 'product_images.file_path')
            ->orderBy('products.created_at', 'desc') // Ordering by the latest product (created_at)
            ->where('products.is_deleted', '0')
            ->skip($totalRecords - 2 - 2) // Skip the first N records and avoid the latest ones
            ->limit(2) // Limit to 2 records after the skip
            ->get();

        // If products exist, attach full image URL
        $products->transform(function ($product) {
            $product->image_url = asset('storage/'.$product->file_path);
            unset($product->file_path); // Remove the file path column if not needed
            return $product;
        });

        return $products;
    }
}
if (!function_exists('getDiscountedPrice')) {
    /**
     * Get the discounted price based on the user's role.
     *
     * @param  int $productId
     * @param  float $productPrice
     * @return float
     */
    function getDiscountedPrice($productId, $productPrice)
    {
        // Check if the user is authenticated and has a customer role ID
        $role_id = auth('customer')->check() ? auth('customer')->user()->customer_role_id : null;

        // If customer has a role, get the discount
        if ($role_id !== null) {
            // Fetch the discount percentage for the current user role
            $discount = DB::table('product_customer_role_discounts')
                ->where('product_id', $productId)
                ->where('customer_role_id', $role_id)
                ->first();

            // Calculate discounted price if discount exists
            if ($discount) {
                return $productPrice - (($productPrice * $discount->discount_percentage) / 100);
            }
        }

        // Return the original price if no discount exists or no role is assigned
        return $productPrice;
    }
}
