<!DOCTYPE html>
<html>
<head>
    <title>Sản phẩm</title>
</head>
<body>

<h2>Sản phẩm</h2>


<form method="GET" action="/products">
    <input type="text" name="keyword" placeholder="Tìm tên...">

    <select name="category">
        <option value="all">Tất cả loại</option>
        @foreach($categories as $cate)
            <option value="{{ $cate->id }}">{{ $cate->name }}</option>
        @endforeach
    </select>

    <select name="sort">
        <option value="">Sắp xếp</option>
        <option value="price_asc">Giá tăng dần</option>
        <option value="price_desc">Giá giảm dần</option>
    </select>
<input type="number" name="price" placeholder="Nhập giá" value="{{ request('price') }}">
    <button type="submit">Áp dụng</button>
</form>
<a href="/register">Đăng ký</a>
<a href="/login">Đăng nhập</a>
<br>


<a href="/users">Quản lý tài khoản</a>
<br>
<br>
<a href="/products/create">+ Thêm sản phẩm</a>

<table border="1" width="100%">
    <tr>
        <th>Tên</th>
        <th>Giá</th>
        <th>Loại</th>
        <th>Tồn</th>
        <th>Hành động</th>
    </tr>

    @foreach($products as $p)
    <tr>
       <td>
        <a href="/products/{{ $p->id }}"> {{ $p->name }}</a> </td>
        <td>{{ number_format($p->price) }}</td>
        <td>{{ $p->category->name ?? 'Không có' }}</td>
        <td>{{ $p->stock }}</td>
        <td>
            <a href="/products/edit/{{ $p->id }}">Sửa</a> |
            <a href="/products/delete/{{ $p->id }}" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">Xóa</a>
        </td>
    </tr>
    @endforeach
</table>

</body>
</html>
