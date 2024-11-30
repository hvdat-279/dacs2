@extends('layouts.home')

@section('content')
<div class="product-container">
    <div class="product_details">
        <!-- Swiper -->
        <div class="swiper mySwiper2">
            <div class="swiper-wrapper">
                @foreach ($productDetail->images as $item)
                <div class="swiper-slide"><img src="{{ $item }}" alt="big">
                </div>
                @endforeach
                {{-- <div class="swiper-slide"><img
                        src="https://bulbal.vn/wp-content/uploads/2024/09/BO-QUAN-AO-BONG-DA-BULBAL-HUNTER-2-TRANG-1-scaled.jpg"
                        alt=""></div>
                <div class="swiper-slide">Slide 2</div>
                <div class="swiper-slide">Slide 3</div>
                <div class="swiper-slide">Slide 4</div>
                <div class="swiper-slide">Slide 5</div> --}}
                <!-- Thêm các slide khác nếu cần -->
            </div>
            <!-- Nút điều hướng -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>

        <!-- Swiper thu nhỏ -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach ($productDetail->images as $item)
                <div class="swiper-slide"><img src="{{ $item }}" alt="small">
                </div>
                @endforeach
                {{-- <div class="swiper-slide"><img
                        src="https://bulbal.vn/wp-content/uploads/2024/09/BO-QUAN-AO-BONG-DA-BULBAL-HUNTER-2-TRANG-1-scaled.jpg"
                        alt=""></div>
                <div class="swiper-slide">Thumb 2</div>
                <div class="swiper-slide">Thumb 3</div>
                <div class="swiper-slide">Thumb 4</div>
                <div class="swiper-slide">Thumb 5</div> --}}
                <!-- Thêm các slide khác nếu cần -->
            </div>
        </div>
    </div>

    <div class="info">
        <div class="product-info">
            <h1 class="product-title">{{ $productDetail->title }}</h1>
            <p class="product-price">{{ number_format($productDetail->price, 0, ',', '.') }}₫</p>
            <p class="product-description">
                {{ $productDetail->description }}
            </p>
            <form class="product-form" method="POST" action="{{ route('cart.add') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $productDetail->id }}">
                <div class="size-selector">
                    <label for="size">Size:</label>
                    <select name="size" id="size" required>
                        <option value="" disabled selected>Chọn một tuỳ chọn</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                    </select>
                </div>
                <div class="quantity-selector">
                    <label for="quantity">Số lượng:</label>
                    <input type="number" name="quantity" id="quantity" value="1" min="1" required>
                </div>
                <button type="submit" class="add-to-cart-btn">Thêm vào giỏ hàng</button>
            </form>
        </div>
    </div>
</div>

<!-- Mô tả dưới -->
<div class="description">
    <h3>Product Description</h3>
    <p>This is the full description of the product. You can add a more detailed explanation about the product features
        and benefits here.</p>
</div>



@endsection