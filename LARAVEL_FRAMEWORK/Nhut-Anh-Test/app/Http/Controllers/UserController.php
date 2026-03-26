<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Quan trọng: Để dùng được Model User
use Illuminate\Support\Facades\Auth; // Quan trọng: Để dùng được Auth::id()

class UserController extends Controller
{
    // Hiển thị danh sách người dùng
    public function index()
    {
        $users = User::all();
        // Hãy đảm bảo bạn đã tạo file tại: resources/views/admin/users/index.blade.php
        return view('admin.users.index', compact('users'));
    }

    // Xóa người dùng
    public function destroy($id)
    {
        // Kiểm tra nếu người dùng đang đăng nhập tự xóa chính mình
        if (Auth::id() == $id) {
            return back()->with('error', 'Bạn không thể tự xóa chính mình!');
        }

        // Tìm và xóa
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return back()->with('success', 'Xóa người dùng thành công');
        }

        return back()->with('error', 'Không tìm thấy người dùng');
    }
}
