<?php

namespace App\Models;

class Cart
{
    private $items = [];
    private $total_quantity = 0;
    private $total_price = 0;
    public function __construct()
    {
        $this->items = session('cart') ? session('cart') : [];
    }

    public function list()
    {
        return $this->items;
    }
    public function add($product, $quantity = 1, $size)
    {

        $item = [
            'product_id' => $product->id,
            'title' => $product->title,
            'price' => $product->price,
            'image' => $product->images->first()->img,
            'quantity' => $quantity,
            "size" => $size
        ];

        $this->items[$product->id] = $item;
        session(['cart' => $this->items]);
    }
    public function update($id, $quantity, $size)
    {

        if (isset($this->items[$id])) {
            $this->items[$id]['quantity'] = $quantity;
            $this->items[$id]['size'] = $size;
            session(['cart' => $this->items]);
        }
    }

    public function delete($id)
    {
        if (isset($this->items[$id])) {
            unset($this->items[$id]);
            session(['cart' => $this->items]);
        }
    }

    public function clear() {}




    public function getTotalPrice()
    {
        $totalPrice = 0;
        foreach ($this->items as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }
        return $totalPrice;
    }
    public function getTotalQuantity()
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item['quantity'];
        }
        return $total;
    }
}
