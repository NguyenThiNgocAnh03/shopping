<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Đăng ký</title>
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow-sm border-0 p-4">
                <div class="text-center mb-4 text-primary">
                    <i class="fas fa-user-plus fa-3x"></i>
                    <h3 class="mt-2 text-dark fw-bold">Đăng ký</h3>
                </div>

                <form action="{{ route('/register') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Tài khoản</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mật khẩu</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Nhập lại mật khẩu</label>
                        <input type="password" name="password_confirmation" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">Đăng ký ngay</button>
                </form>
                <a href="{{ route('login') }}" class="text-center d-block mt-3 text-decoration-none">Đã có tài khoản? Đăng nhập</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
