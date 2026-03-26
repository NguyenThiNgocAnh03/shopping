<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{

    // Cập nhật đúng các cột trong database
    protected $fillable = ['name', 'category_id', 'price', 'stock'];

    // Nếu trong database chỉ có created_at mà không có updated_at, hãy thêm dòng này:
    public $timestamps = false;

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

}