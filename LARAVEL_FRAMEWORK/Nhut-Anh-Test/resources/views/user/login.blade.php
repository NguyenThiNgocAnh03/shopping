
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Đăng nhập</title>
    <style>
        body { background-color: #f8f9fa; }
        .card { border-radius: 15px; border: none; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        .btn-success { background-color: #28a745; border: none; }
        .input-group-text { background-color: #e9ecef; border: none; }
        .form-control { border: 1px solid #ced4da; }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card p-4">
                <div class="text-center mb-4">
                    <i class="fas fa-sign-in-alt fa-3x text-success"></i>
                    <h3 class="mt-2 fw-bold">Đăng nhập</h3>
                </div>

                <form action="{{ route('/login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tài khoản</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" name="username" class="form-control" placeholder="hieupc" required>
                        </div>
                        @error('username') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Mật khẩu</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" name="password" class="form-control" placeholder="******" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success w-100 py-2 fw-bold">
                        <i class="fas fa-arrow-right me-2"></i>Đăng nhập
                    </button>
                </form>

                <div class="text-center mt-3">
                    <span class="text-muted">Chưa có tài khoản?</span>
                    <a href="{{ route('register') }}" class="text-decoration-none fw-bold">Đăng ký</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
