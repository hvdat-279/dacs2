<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\products;

class ShoppingCartController extends Controller
{
    public function index(Cart $cart)
    {
        // $cartItems = $cart->list();
        // dd($cartItems);
        return view('partials.home.shopping_cart');
    }


    public function add(Request $request, Cart $cart)
    {
        $product = products::find($request->id);
        $quantity = $request->quantity > 0 ? floor($request->quantity) : 1;
        // $quantity = $request->quantity > 0 ? ceil($request->quantity) : 1;
        $size = $request->size;

        $cart->add($product, $quantity, $size);
        // dd($request->all());
        // return redirect()->route('home');
        return redirect()->route('cart')->with('success', 'Thêm sản phẩm thành công!');
    }

    public function deleteCart($id, Cart $cart)
    {
        $cart->delete($id);
        return redirect()->route('cart')->with('error', 'Xóa sản phẩm thành công!');
        // return view('partials.home.shopping_cart')->with('error', 'Xóa sản phẩm thành công!');
    }

    public function updateCart($id, Cart $cart, Request $request)
    {
        $quantity = $request->quantity ? $request->quantity : 1;
        $size = $request->size;
        $cart->update($id, $quantity, $size);
        return redirect()->route('cart')->with('success', 'Cập nhật sản phẩm thành công!');
        // return view('partials.home.shopping_cart')->with('success', 'Cập nhật sản phẩm thành công!');
    }
}
