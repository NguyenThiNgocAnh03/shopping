<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // 1. Đăng ký (Register)
    public function register(Request $request) {
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required|min:6|confirmed', // Cần field password_confirmation ở form
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Chuẩn bảo mật: Luôn Hash mật khẩu
            'role' => 'user'
        ]);

        return redirect()->route('login')->with('success', 'Đăng ký thành công!');
    }

    // 2. Đăng nhập (Login)
    public function login(Request $request) {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Chuẩn bảo mật: Chống tấn công Session Fixation
            return redirect()->intended('products'); // Vào trang sản phẩm của Ngọc Anh
        }

        return back()->withErrors(['username' => 'Sai tài khoản hoặc mật khẩu']);
    }

    // 3. Đăng xuất (Logout)
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
