<!DOCTYPE html>
<html>
<head>
    <title>Quản lý sản phẩm</title>
</head>
<body>

<div class="header">
    Xin chào, <b>hieupc</b> | <a href="#">Logout</a>
</div>

<h1>Sản phẩm</h1>
<form action="{{ route('products.index') }}" method="GET">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Tìm tên...">

    <select name="category_id">
        <option value="all">-- Tất cả loại --</option>
        @foreach($categories as $cat)
            <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                {{ $cat->name }}
            </option>
        @endforeach
    </select>

    <select name="sort">
        <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Giá tăng dần</option>
        <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Giá giảm dần</option>
    </select>

    <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="Giá tối đa">
    <button type="submit">Áp dụng</button>
</form>

<table>
    <thead>
        <tr>
            <th>Tên</th>
            <th>Giá</th>
            <th>Loại</th>
            <th>Tồn</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $p)
        <tr>
            <td><a href="{{ route('products.show', $p->id) }}">{{ $p->name }}</a></td>
            <td>{{ number_format($p->price) }}</td>
            <td>{{ $p->category->name ?? 'N/A' }}</td>
            <td>{{ $p->stock }}</td>
            <td>
                <a href="{{ route('products.edit', $p->id) }}">Sửa</a> |
                <form action="{{ route('products.destroy', $p->id) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button type="submit" onclick="return confirm('Chắc chắn xóa?')">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div style="margin-top: 15px;">
    {{ $products->links() }}
</div>

</body>
</html>
