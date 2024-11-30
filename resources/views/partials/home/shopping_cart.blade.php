@extends('layouts.home')

@section('content')
{{-- <div class="product-wrapper"> --}}
    <div class="cart-container">
        {{-- @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif --}}
        <h2 class="cart-title">Giỏ hàng của bạn</h2>
        <div class="cart-wrapper">
            {{-- @if($cart->isEmpty())
            <p class="empty-cart">Giỏ hàng của bạn hiện đang trống.</p>
            @else --}}
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Size</th>
                        <th>Số lượng</th>
                        <th>Tổng tiền</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart->list() as $item => $value)
                    <form action="{{ route('cart.update' ,$value['product_id']) }}" method="get">
                        <tr>

                            <td>
                                {{-- <img class="default-image" src="{{ $product->images->first()->img }}"
                                    alt="{{ $product->title }}"> --}}
                                <img src="{{ $value['image'] }}" alt="{{ $value['title'] }}" class="product-image">
                            </td>
                            <td>{{ $value['title'] }}</td>
                            <td>{{ number_format($value['price'], 0, ',', '.') }} VND</td>
                            <td>
                                {{-- <input type="text" name="size" value="{{ $value['size'] }}" id=""> --}}
                                <select name="size" id="" class="quantity-input">
                                    <option value="{{ $value['size'] }}">{{ $value['size'] }}</option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                </select>
                            </td>
                            <td>
                                <input type="number" name="quantity" value="{{ $value['quantity'] }}" min="1"
                                    class="quantity-input">
                            </td>
                            <td>{{ number_format($value['price'] * $value['quantity'], 0, ',', '.') }} VND</td>
                            <td>
                                {{-- <input type="hidden" name="id" id="" value="{{  }}"> --}}
                                <button type="submit" class="update-button">Cập nhật</button>

                                <a onclick="return confirm('Bạn có chắc muốn xóa?')" class="delete-button"
                                    href="{{ route('cart.delete', $value['product_id']) }}"><i
                                        class="fa-solid fa-x"></i></a>

                            </td>
                        </tr>
                    </form>
                    @endforeach

                </tbody>
            </table>
            @if ($cart->getTotalQuantity() > 0 && $cart->getTotalPrice() > 0)
            <div class="total-price">

                <h3>Tổng số lượng: {{ $cart->getTotalQuantity() }} (sản phẩm)</h3>
                <h3>Tổng tiền: {{number_format($cart->getTotalPrice()) }} VND</h3>

                <a href="" class="checkout-button">Thanh toán</a>


                {{-- <h4>Tổng cộng: {{ number_format($total, 0, ',', '.') }} VND</h4>
                <a href="{{ route('checkout.index') }}" class="checkout-button">Thanh toán</a> --}}
            </div>
            @else
            <p style="font-size:23px; text-align: center">Chưa có sản phẩm thêm vào giỏ hàng</p>
            @endif
            {{-- @endif --}}
        </div>
    </div>



    {{--
</div> --}}
@endsection