<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function admin()
    {
        return view('admin.index');
    }

    public function login()
    {
        return view('admin.login');
    }

    public function check_login(Request $req)
    {
        $data = $req->only('email', 'password');
        $email = $data['email'];
        $password = $data['password'];

        $check_login = Auth::guard('admin')->attempt(['email' => $email, 'password' => $password]);

        if ($check_login) {
            return redirect()->route('admin.index')->with('yes', 'Chào mừng bạn đã đến với trang quản trị!');
        }
        return redirect()->back()->with('no', 'Email hoặc mật khẩu của bạn nhập không chính xác!');
    }

    public function logout()
    {
        Auth::logout(); //hủy section
        return redirect()->route('admin.login')->with('no', 'Bạn đã thoát tranng quảm trị!');
    }
}

