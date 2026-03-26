<!DOCTYPE html>
<html>
<head>
    <title>Chi tiết sản phẩm</title>
</head>
<body>

<h2>Chi tiết sản phẩm</h2>

<p><b>Tên:</b> {{ $product->name }}</p>
<p><b>Giá:</b> {{ number_format($product->price) }} VNĐ</p>
<p><b>Loại:</b> {{ $product->category->name ?? 'Không có' }}</p>
<p><b>Tồn kho:</b> {{ $product->stock }}</p>

<br>

<a href="/products">⬅ Quay lại</a>

</body>
</html>
