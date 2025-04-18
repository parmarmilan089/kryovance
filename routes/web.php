<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\OrderManagmentController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ReportController;
use App\Exports\OrdersExport;
use Maatwebsite\Excel\Facades\Excel;


/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider and all of them will
  | be assigned to the "web" middleware group. Make something great!
  |
 */

//Route::get('/', function () {
//    return view('welcome');
//});
//
//Route::get('/', function () {
//    return view('login');
//});
Route::get('/check', function () {
    return 'Laravel is alive!';
});
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login-post', [UserController::class, 'loginPost'])->name('login-post');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/admin/login', [UserController::class, 'login'])->name('login');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'admin'], function () {
        // dashboard
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
        Route::get('/edit-user-profile', [UserController::class, 'editUserProfile'])->name('edit-user-profile');
        Route::post('/update-user-profile', [UserController::class, 'updateUserProfile'])->name('update-user-profile');
        Route::get('/user-change-password', [UserController::class, 'userChangePassword'])->name('user-change-password');
        // product
        Route::get('/add-product', [ProductController::class, 'addProduct'])->name('add-product');
        Route::post('/store-product', [ProductController::class, 'storeProduct'])->name('store-product');
        Route::get('/product-list', [ProductController::class, 'productList'])->name('product-list');
        Route::get('/json-product', [ProductController::class, 'jsonProduct'])->name('json-product');
        Route::get('/view-product', [ProductController::class, 'jsonProduct'])->name('view-product');
        Route::get('/edit-product/{id}', [ProductController::class, 'editProduct'])->name('edit-product');
        Route::post('/update-product', [ProductController::class, 'updateProduct'])->name('update-product');
        Route::post('/delete-product', [ProductController::class, 'deleteProduct'])->name('delete-product');
        // category
        Route::get('/add-category', [CategoryController::class, 'addCategory'])->name('add-category');
        Route::get('/category-list', [CategoryController::class, 'categoryList'])->name('category-list');
        Route::get('/json-category', [CategoryController::class, 'jsonCategory'])->name('json-category');
        Route::post('/store-category', [CategoryController::class, 'storeCategory'])->name('store-category');
        Route::get('/view-product/{id}', [CategoryController::class, 'productList'])->name('view-product');
        Route::get('/edit-category/{id}', [CategoryController::class, 'editCategory'])->name('edit-category');
        Route::post('/update-category', [CategoryController::class, 'updateCategory'])->name('update-category');
        Route::post('/delete-category', [CategoryController::class, 'deleteCategory'])->name('delete-category');

        // Contact form
        Route::get('/contact-list', [ContactController::class, 'contactList'])->name('contact-list');
        Route::get('/json-contact', [ContactController::class, 'jsonContact'])->name('json-contact');
        Route::get('/view-contact/{id}', [ContactController::class, 'viewContact'])->name('view-contact');



        // role
        Route::get('/add-role', [RoleController::class, 'addRole'])->name('add-role');
        Route::get('/role-list', [RoleController::class, 'roleList'])->name('role-list');
        Route::get('/json-role', [RoleController::class, 'jsonRole'])->name('json-role');
        Route::post('/store-role', [RoleController::class, 'storeRole'])->name('store-role');
        Route::get('/edit-role/{id}', [RoleController::class, 'editRole'])->name('edit-role');
        Route::post('/update-role', [RoleController::class, 'updateRole'])->name('update-role');
        Route::post('/delete-role', [RoleController::class, 'deleteRole'])->name('delete-role');

        // user
        Route::get('/add-user', [UserController::class, 'addUser'])->name('add-user');
        Route::get('/user-list', [UserController::class, 'userList'])->name('user-list');
        Route::get('/json-user', [UserController::class, 'jsonUser'])->name('json-user');
        Route::post('/store-user', [UserController::class, 'storeUser'])->name('store-user');
         Route::get('/edit-user/{id}', [UserController::class, 'editUser'])->name('edit-user');
        Route::post('/update-user', [UserController::class, 'updateUser'])->name('update-user');
        Route::post('/delete-user', [UserController::class, 'deleteUser'])->name('delete-user');
        
        
        //order managment
        Route::get('/orders', [OrderManagmentController::class, 'index'])->name('orders');
        Route::get('/json-order', [OrderManagmentController::class, 'jsonOrder'])->name('json-order');
        Route::get('/view-order/{id}', [OrderManagmentController::class, 'viewOrder'])->name('view-order');
        
        //Inventroy
        Route::resource('inventories', InventoryController::class);
        Route::get('/get-inventory-by-category/{id}', [InventoryController::class, 'getByCategory'])->name('get-inventory-by-category');
        
        //report
        Route::get('/report', [ReportController::class, 'index'])->name('report');
        Route::get('/report/export', function () {
            $month = request('month');
            $year = request('year');
        
            return Excel::download(new OrdersExport($month, $year), 'orders_' . $month . '_' . $year . '.xlsx');
        })->name('export');

    });
});


Route::get('/', [FrontendController::class, 'dashboard'])->name('home');

//frontend routes
Route::get('/product-details/{id}', [FrontendController::class, 'product_details'])->name('product_details');
Route::get('/products', [FrontendController::class, 'products'])->name('products');
Route::post('/products/load-more', [FrontendController::class, 'loadMore'])->name('loadMore');
Route::post('/load-more-products', [FrontendController::class, 'loadMoreProduct'])->name('load.more.products');
Route::get('/about-us', [FrontendController::class, 'about'])->name('about');


//customer routes
Route::get('/user-login', [CustomerAuthController::class, 'user_login'])->name('user-login');
Route::get('/user-register', [CustomerAuthController::class, 'user_register'])->name('user-register');
Route::post('/customer/register', [CustomerAuthController::class, 'register'])->name('register');
Route::get('/customer/login', [CustomerAuthController::class, 'showLoginForm'])->name('customer.login.form');
Route::post('/customer/login', [CustomerAuthController::class, 'login'])->name('customer.login');

Route::get('/customer/logout', [CustomerAuthController::class, 'logout'])->name('customer.logout');

//cart routes
Route::post('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add-to-cart');
Route::get('/shopping-cart', [CartController::class, 'shopping_cart'])->name('shopping-cart');
Route::get('/shop-cart', [CartController::class, 'shop_cart'])->name('shop-cart');
Route::post('/cart/remove', [CartController::class, 'removeCartItem'])->name('cart.remove');
Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::get('/cart-items', [CartController::class, 'getCartData'])->name('scart.data');
Route::get('/clear-cart', [CartController::class, 'clearCart'])->name('cart.clear');

//checkout routes
Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');

//order routes
Route::post('/place-order', [OrderController::class, 'placeOrder'])->name('order.place');
Route::get('/order-success/{order_id}', [OrderController::class, 'orderSuccess'])->name('order.success');
Route::middleware('auth:customer')->group(function () {
    Route::get('/orders', [OrderController::class, 'index'])->name('order');
    Route::get('/order-details/{id}', [OrderController::class, 'orderDetails'])->name('order.details');
});
Route::get('/order-complete', [OrderController::class, 'order_complete'])->name('order-complete');

Route::get('/razorpay/pay/{order_id}', [RazorpayController::class, 'initiatePayment'])->name('razorpay.pay');
Route::post('/razorpay/payment', [RazorpayController::class, 'handlePayment'])->name('razorpay.handle');

// feedback routes
Route::get('/contact-us', [FeedbackController::class, 'index'])->name('contact');
Route::post('/contact-us', [FeedbackController::class, 'submitForm'])->name('contact.submit');

Route::get('/csrf-token', function () {
    return response()->json(['csrfToken' => csrf_token()]);
});
