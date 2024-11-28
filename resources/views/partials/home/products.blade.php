@extends('layouts.home')

@section('content')
<div class="product-wrapper">
    <!-- Filter sidebar -->
    <aside class="filter-sidebar">
        <h3>Bộ lọc sản phẩm</h3>

        <!-- Lọc theo giá -->
        <div class="filter-section">
            <h4>Khoảng giá</h4>
            <div class="price-range-container">
                <input type="range" min="0" max="2000000" step="100000" class="price-range" id="priceRange">
                <div class="price-inputs">
                    <input type="number" id="minPrice" placeholder="Từ" min="0">
                    <span>-</span>
                    <input type="number" id="maxPrice" placeholder="Đến" max="2000000">
                </div>
            </div>
        </div>




        <!-- Lọc theo danh mục -->
        <div class="filter-section">
            <h4>Danh mục</h4>
            <div class="category-options">
                <label class="category-option">
                    <input type="checkbox" value="ao">
                    <span>Áo bóng đá</span>
                </label>
                <label class="category-option">
                    <input type="checkbox" value="quan">
                    <span>Quần bóng đá</span>
                </label>
                <label class="category-option">
                    <input type="checkbox" value="giay">
                    <span>Giày bóng đá</span>
                </label>
                <label class="category-option">
                    <input type="checkbox" value="phukien">
                    <span>Phụ kiện</span>
                </label>
            </div>
        </div>

        <!-- Nút áp dụng bộ lọc -->
        <button class="apply-filters-btn">Áp dụng bộ lọc</button>
    </aside>

    <!-- Product container -->
    <main class="products-container">
        <div class="products-header">
            <h1>{{ $category->name }}</h1>
            <div class="products-controls">
                <div class="sort-options">
                    <select id="sortSelect">
                        <option value="default">Sắp xếp theo</option>
                        <option value="price-asc">Giá tăng dần</option>
                        <option value="price-desc">Giá giảm dần</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="products-main">
            @forelse ($products as $product)
            <div class="product-item">
                <div class="card">
                    <a href="{{ route('product.details', ['id' => $product->id]) }}" class="product-card-link">
                        <div class="card-image">
                            <!-- Kiểm tra xem sản phẩm có ảnh hay không trước khi hiển thị -->
                            @if($product->images->isNotEmpty())
                            <img class="default-image" src="{{ $product->images->first()->img }}"
                                alt="{{ $product->title }}">

                            @if($product->images->count() > 1)
                            <img class="hover-image" src="{{ $product->images->skip(1)->first()->img }}"
                                alt="{{ $product->title }} Hover">
                            @else
                            <img class="hover-image" src="{{ $product->images->first()->img }}"
                                alt="{{ $product->title }} Hover">
                            @endif
                            @else
                            <img class="default-image" src="default-image.jpg" alt="Ảnh sản phẩm không có sẵn">
                            @endif
                        </div>
                    </a>
                    <div class="card-info">
                        <p class="product-price">{{ number_format($product->price, 0, ',', '.') }}₫</p>
                        <div class="card-buttons">
                            <button class="btn btn-buy">
                                <i class="fas fa-shopping-bag"></i>
                                Mua ngay
                            </button>
                            <button class="btn btn-cart">
                                <i class="fas fa-cart-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
            @empty
            <p>Không có sản phẩm nào trong danh mục này.</p>
            @endforelse
        </div>
        <div class="pagination">
            {{ $products->links() }}
        </div>


    </main>
</div>

@endsection