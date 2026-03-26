<?ph
// Trong UserController.php
public function index() {
    $users = User::all();
    return view('admin.users.index', compact('users'));
}

public function destroy($id) {
    if (Auth::id() == $id) {
        return back()->with('error', 'Bạn không thể tự xóa chính mình!');
    }
    User::destroy($id);
    return back()->with('success', 'Xóa người dùng thành công');
}
