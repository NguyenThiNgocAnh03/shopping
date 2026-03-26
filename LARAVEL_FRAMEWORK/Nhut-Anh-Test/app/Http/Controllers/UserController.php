<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; // Cần dùng để mã hóa mật khẩu khi thêm mới

class UserController extends Controller
{
    // 1. Hiển thị danh sách (Cái bảng bạn đang làm)
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    // 2. Hiển thị Form để thêm User mới (Khi bấm nút + Thêm User)
    public function create()
    {
        return view('admin.users.create');
    }

    // 3. Xử lý lưu User mới vào Database
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // Mặc định là user
        ]);

        return redirect()->route('users.index')->with('success', 'Thêm người dùng mới thành công!');
    }

    // 4. Xóa người dùng
    public function destroy($id)
    {
        if (Auth::id() == $id) {
            return back()->with('error', 'Bạn không thể tự xóa chính mình!');
        }

        $user = User::find($id);
        if ($user) {
            $user->delete();
            return back()->with('success', 'Xóa người dùng thành công');
        }

        return back()->with('error', 'Không tìm thấy người dùng');
    }
}
