<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerAuthController extends Controller
{
    public function user_register() {
        $data = [];
        $data['title'] = 'User-Register';
        $data['menu_active_tab'] = 'user-register';

        return view('user.user-register')->with($data);
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
