<h2>Sửa sản phẩm</h2>

<form method="POST" action="/products/update/{{ $product->id }}">
    @csrf

    Tên: <input type="text" name="name" value="{{ $product->name }}"><br><br>
    Giá: <input type="number" name="price" value="{{ $product->price }}"><br><br>

    Loại:
    <select name="category_id">
        @foreach($categories as $c)
            <option value="{{ $c->id }}"
                {{ $product->category_id == $c->id ? 'selected' : '' }}>
                {{ $c->name }}
            </option>
        @endforeach
    </select><br><br>

    Tồn kho: <input type="number" name="stock" value="{{ $product->stock }}"><br><br>

    <button type="submit">Cập nhật</button>
</form>
