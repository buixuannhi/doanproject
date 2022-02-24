<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Auth;

class CustomerController extends Controller
{
    public function login()
    {
        return view('customer.login');
    }

    public function check_login(Request $req)
    {
        $data = $req->only('email', 'password');
        $check_login = Auth::guard('kh')->attempt($data, $req->has('remember'));
        if ($check_login) {
            return redirect()->route('home.index')->with('yes', 'Chào mừng bạn đã đến với trang quản trị!');
        }
        return redirect()->back()->with('no', 'Email hoặc mật khẩu của bạn nhập không chính xác!');
    }

    public function register()
    {
        return view('customer.register');
    }

    public function add_customer(Request $req)
    {

        $pass_hashed = bcrypt($req->password);
        $req->merge(['password' => $pass_hashed]);
        $data = $req->only('name', 'email', 'password', 'phone', 'address', 'birhday', 'gender');

        if (Customer::create($data)) {
            return redirect()->route('customer.login');
        }
        return redirect()->back();
    }

    public function logout()
    {
        Auth::guard('kh')->logout();
        return redirect()->route('customer.login');
    }

    public function profile()
    {
        $account = Auth::guard('kh')->user();
        return view('customer.profile', compact('account'));
    }

    public function profile_update(Request $req)
    {
        $account = Auth::guard('kh')->user();

        $pass_hashed = $account->password;
        if ($req->password) {
            $req->validate([
                'confirm_password' => 'required:same:password'
            ]);
            $pass_hashed = bcrypt($req->password);
        }
        $req->merge(['password' => $pass_hashed]);

        $data = $req->only('name', 'email', 'password', 'phone', 'address', 'birhday', 'gender');

        if ($account->update($data)) {
            return redirect()->route('home.index');
        }
        return redirect()->back();
    }
}
