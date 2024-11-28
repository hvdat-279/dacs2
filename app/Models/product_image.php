<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_image extends Model
{
    use HasFactory;

    protected $fillable = [
        'img',
        'product_id',
    ];

    // public function product()
    // {
    //     return $this->belongsTo(Products::class);
    // }
    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id', 'id'); // Đảm bảo sử dụng 'product_id'
    }
}
