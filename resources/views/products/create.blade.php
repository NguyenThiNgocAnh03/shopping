<h2>Thêm sản phẩm</h2>

<form method="POST" action="/products/store">
    @csrf

    Tên: <input type="text" name="name"><br><br>
    Giá: <input type="number" name="price"><br><br>

    Loại:
    <select name="category_id">
        @foreach($categories as $c)
            <option value="{{ $c->id }}">{{ $c->name }}</option>
        @endforeach
    </select><br><br>

    Tồn kho: <input type="number" name="stock"><br><br>

    <button type="submit">Thêm</button>
</form>
