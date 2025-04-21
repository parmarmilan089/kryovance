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
