@extends('layouts.app') @section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Quản lý người dùng</h2>
        <a href="{{ route('users.create') }}" class="btn btn-primary">+ Thêm người dùng</a>
    </div>

    <table class="table table-bordered table-hover shadow-sm bg-white">
        <thead class="table-light text-center">
            <tr>
                <th>ID</th>
                <th>Tài khoản</th>
                <th>Email</th>
                <th>Quyền</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td class="text-center">{{ $user->id }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td class="text-center">
                    <span class="badge {{ $user->role == 'admin' ? 'bg-danger' : 'bg-info' }}">
                        {{ $user->role }}
                    </span>
                </td>
                <td class="text-center">
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Bạn chắc chắn muốn xóa?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger" {{ Auth::id() == $user->id ? 'disabled' : '' }}>
                            <i class="fas fa-trash"></i> Xóa
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
