<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\CustomerResetPasswordMail;

class CustomerAuthController extends Controller
{
    public function user_register() {
        $data = [];
        $data['title'] = 'User-Register';
        $data['menu_active_tab'] = 'user-register';

        return view('user.user-register')->with($data);
    }

    public function profileUpdate(Request $request) {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'company' => 'required',
            'phone' => 'required|numeric|digits:10',
            'email' => 'required|email',
        ]);

        $user = auth('customer')->user();

        $customer = Customer::find($user->id);
        $customer->fname = $request->firstname;
        $customer->lname = $request->lastname;
        $customer->company_name = $request->company;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->save();

        return back()->with('success', 'Your Profile Updated');
    }
    public function register(Request $request) {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'company' => 'required',
            'phone' => 'required|numeric|digits:10|unique:customers,phone',
            'email' => 'required|email|unique:customers',
            'password' => 'required|min:6|confirmed',
        ]);

        $customer = Customer::create([
            'fname' => $request->firstname,
            'lname' => $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
            'company_name' => $request->company,
            'password' => Hash::make($request->password),
        ]);

        Auth::guard('customer')->login($customer);

        return redirect()->route('home');
    }

    public function user_login() {
        $data = [];
        $data['title'] = 'User-Login';
        $data['menu_active_tab'] = 'user-login';

        return view('user.user-login')->with($data);
    }

    public function userForgetpassword() {
        $data = [];
        $data['title'] = 'Forget Password';
        $data['menu_active_tab'] = 'forget-password';

        return view('user.forget-password')->with($data);
    }

    public function submitForgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:customers,email'
        ]);

        $token = \Str::random(60);

        \DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email],
            [
                'email' => $request->email,
                'token' => $token,
                'created_at' => now()
            ]
        );

        $link = url('/customer/reset-password?token=' . $token . '&email=' . urlencode($request->email));

        // Send mail (just for now you can use log instead of actual email)
        Mail::to($request->email)->send(new CustomerResetPasswordMail($link));

        return back()->with('success', 'We have sent you a password reset link on your email.');
    }

    public function showResetPasswordForm(Request $request)
    {
        $token = $request->token;
        $email = $request->email;

        return view('customer.auth.reset-password', compact('token', 'email'));
    }

    public function userDashbaord(Request $request)
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
        $data['customer'] = $customer;
        return view('user.order')->with($data);
    }


    public function submitResetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:customers,email',
            'token' => 'required',
            'password' => 'required|confirmed|min:6'
        ]);

        $reset = \DB::table('password_reset_tokens')
                    ->where('email', $request->email)
                    ->where('token', $request->token)
                    ->first();

        if (!$reset) {
            return back()->with('error', 'Invalid token!');
        }

        $customer = Customer::where('email', $request->email)->first();
        $customer->password = bcrypt($request->password);
        $customer->save();

        // Delete the token after successful reset
        \DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        return redirect()->route('user-login')->with('success', 'Password reset successful! Please login.');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('customer')->attempt($credentials)) {
            return redirect()->route('home');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout() {
        Auth::guard('customer')->logout();
        return redirect()->route('user-login');
    }
}
