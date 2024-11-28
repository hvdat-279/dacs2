<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'price',
        'description',
        'stock',
        'status',
        'category_id',
    ];

    // Định nghĩa mối quan hệ belongsTo với Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Quan hệ một-nhiều với ProductImage
    // public function images()
    // {
    //     return $this->hasMany(Product_image::class);
    // }
    public function images()
    {
        return $this->hasMany(product_image::class, 'product_id', 'id'); // Đảm bảo sử dụng 'product_id'
    }
}
