@extends('layouts.home')
@section('content')
<!-- Cart Sidebar -->
<div class="cart-sidebar">
    <div class="cart-header">
        <h2>Giỏ hàng</h2>
        <button class="close-cart">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>

    <div class="cart-items">
        <!-- Cart items will be dynamically added here -->
    </div>

    <div class="cart-summary">
        <div class="summary-row">
            <span>Tổng sản phẩm:</span>
            <span class="total-items">0</span>
        </div>
        <div class="summary-row">
            <span>Tạm tính:</span>
            <span class="subtotal">0₫</span>
        </div>
        <div class="summary-row total">
            <span>Tổng cộng:</span>
            <span class="total-amount">0₫</span>
        </div>
    </div>

    <div class="cart-actions">
        <button class="view-cart-btn">Xem giỏ hàng</button>
        <button class="checkout-btn">Thanh toán</button>
    </div>
</div>

<!-- Cart Overlay -->
<div class="cart-overlay"></div>

<!-- Cart Item Template -->
<template id="cart-item-template">
    <div class="cart-item" data-product-id="">
        <div class="item-image">
            <img src="" alt="">
        </div>
        <div class="item-details">
            <div class="item-title"></div>
            <div class="item-price"></div>
            <div class="item-quantity">
                <button class="quantity-btn minus">-</button>
                <input type="number" min="1" value="1" class="quantity-input">
                <button class="quantity-btn plus">+</button>
            </div>
        </div>
        <button class="remove-item">
            <i class="fa-solid fa-trash"></i>
        </button>
    </div>
</template>
@endsection