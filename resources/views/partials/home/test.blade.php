@extends('layouts.home')

@section('content')
{{-- <div class="product-wrapper">
    <!-- Filter sidebar -->
    <aside class="filter-sidebar">

        <h3>Filter</h3>

        <!-- Price Range Filter -->
        <div class="filter-section">
            <h4>Price</h4>
            <input type="range" min="10" max="600" step="10" class="price-range">
        </div>

        <!-- Colors Filter -->
        <div class="filter-section">
            <h4>Colors</h4>
            <div class="color-options">
                <span class="color-swatch" style="background-color: red;"></span>
                <span class="color-swatch" style="background-color: blue;"></span>
                <span class="color-swatch" style="background-color: green;"></span>
                <span class="color-swatch" style="background-color: orange;"></span>
                <!-- Add more colors -->
            </div>
        </div>

        <!-- Size Filter -->
        <div class="filter-section">
            <h4>Size</h4>
            <ul class="size-options">
                <li><button class="size-btn">XS</button></li>
                <li><button class="size-btn">S</button></li>
                <li><button class="size-btn">M</button></li>
                <li><button class="size-btn">L</button></li>
                <li><button class="size-btn">XL</button></li>
            </ul>
        </div>


    </aside>


    <!-- Product container -->
    <main class="products-container">
        <div class="product-item">
            <div class="card">
                <div class="card-image">
                    <img class="default-image"
                        src="https://bulbal.vn/wp-content/uploads/2024/09/BO-QUAN-AO-BONG-DA-BULBAL-HUNTER-2-TRANG-1-scaled.jpg"
                        alt="Product 1">
                    <img class="hover-image"
                        src="https://bulbal.vn/wp-content/uploads/2024/09/BO-QUAN-AO-BONG-DA-BULBAL-HUNTER-2-TRANG-2-scaled.jpg"
                        alt="Product 1 Hover">
                </div>
                <div class="card-info">
                    <p class="product-price">199.000₫</p>
                    <div class="card-buttons">
                        <button class="btn btn-buy">
                            <i class="fas fa-shopping-bag"></i>
                            Mua ngay 1
                        </button>
                        <button class="btn btn-cart">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="product-item">
            <div class="card">
                <div class="card-image">
                    <img class="default-image"
                        src="https://bulbal.vn/wp-content/uploads/2024/09/BO-QUAN-AO-BONG-DA-BULBAL-HUNTER-2-TRANG-1-scaled.jpg"
                        alt="Product 1">
                    <img class="hover-image"
                        src="https://bulbal.vn/wp-content/uploads/2024/09/BO-QUAN-AO-BONG-DA-BULBAL-HUNTER-2-TRANG-2-scaled.jpg"
                        alt="Product 1 Hover">
                </div>
                <div class="card-info">
                    <p class="product-price">199.000₫</p>
                    <div class="card-buttons">
                        <button class="btn btn-buy">
                            <i class="fas fa-shopping-bag"></i>
                            Mua ngay 1
                        </button>
                        <button class="btn btn-cart">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-item">
            <div class="card">
                <div class="card-image">
                    <img class="default-image"
                        src="https://bulbal.vn/wp-content/uploads/2024/09/BO-QUAN-AO-BONG-DA-BULBAL-HUNTER-2-TRANG-1-scaled.jpg"
                        alt="Product 1">
                    <img class="hover-image"
                        src="https://bulbal.vn/wp-content/uploads/2024/09/BO-QUAN-AO-BONG-DA-BULBAL-HUNTER-2-TRANG-2-scaled.jpg"
                        alt="Product 1 Hover">
                </div>
                <div class="card-info">
                    <p class="product-price">199.000₫</p>
                    <div class="card-buttons">
                        <button class="btn btn-buy">
                            <i class="fas fa-shopping-bag"></i>
                            Mua ngay 1
                        </button>
                        <button class="btn btn-cart">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-item">
            <div class="card">
                <div class="card-image">
                    <img class="default-image"
                        src="https://bulbal.vn/wp-content/uploads/2024/09/BO-QUAN-AO-BONG-DA-BULBAL-HUNTER-2-TRANG-1-scaled.jpg"
                        alt="Product 1">
                    <img class="hover-image"
                        src="https://bulbal.vn/wp-content/uploads/2024/09/BO-QUAN-AO-BONG-DA-BULBAL-HUNTER-2-TRANG-2-scaled.jpg"
                        alt="Product 1 Hover">
                </div>
                <div class="card-info">
                    <p class="product-price">199.000₫</p>
                    <div class="card-buttons">
                        <button class="btn btn-buy">
                            <i class="fas fa-shopping-bag"></i>
                            Mua ngay 1
                        </button>
                        <button class="btn btn-cart">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-item">
            <div class="card">
                <div class="card-image">
                    <img class="default-image"
                        src="https://bulbal.vn/wp-content/uploads/2024/09/BO-QUAN-AO-BONG-DA-BULBAL-HUNTER-2-TRANG-1-scaled.jpg"
                        alt="Product 1">
                    <img class="hover-image"
                        src="https://bulbal.vn/wp-content/uploads/2024/09/BO-QUAN-AO-BONG-DA-BULBAL-HUNTER-2-TRANG-2-scaled.jpg"
                        alt="Product 1 Hover">
                </div>
                <div class="card-info">
                    <p class="product-price">199.000₫</p>
                    <div class="card-buttons">
                        <button class="btn btn-buy">
                            <i class="fas fa-shopping-bag"></i>
                            Mua ngay 1
                        </button>
                        <button class="btn btn-cart">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-item">
            <div class="card">
                <div class="card-image">
                    <img class="default-image"
                        src="https://bulbal.vn/wp-content/uploads/2024/09/BO-QUAN-AO-BONG-DA-BULBAL-HUNTER-2-TRANG-1-scaled.jpg"
                        alt="Product 1">
                    <img class="hover-image"
                        src="https://bulbal.vn/wp-content/uploads/2024/09/BO-QUAN-AO-BONG-DA-BULBAL-HUNTER-2-TRANG-2-scaled.jpg"
                        alt="Product 1 Hover">
                </div>
                <div class="card-info">
                    <p class="product-price">199.000₫</p>
                    <div class="card-buttons">
                        <button class="btn btn-buy">
                            <i class="fas fa-shopping-bag"></i>
                            Mua ngay 1
                        </button>
                        <button class="btn btn-cart">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>


    </main>
</div> --}}
<div class="product-wrapper">
    <!-- Thanh lọc bên trái -->
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

        <!-- Lọc theo màu sắc -->
        <div class="filter-section">
            <h4>Màu sắc</h4>
            <div class="color-options">
                <label class="color-option">
                    <input type="checkbox" value="red">
                    <span class="color-swatch" style="background-color: red;" title="Đỏ"></span>
                </label>
                <label class="color-option">
                    <input type="checkbox" value="blue">
                    <span class="color-swatch" style="background-color: blue;" title="Xanh dương"></span>
                </label>
                <label class="color-option">
                    <input type="checkbox" value="green">
                    <span class="color-swatch" style="background-color: green;" title="Xanh lá"></span>
                </label>
                <label class="color-option">
                    <input type="checkbox" value="black">
                    <span class="color-swatch" style="background-color: black;" title="Đen"></span>
                </label>
                <label class="color-option">
                    <input type="checkbox" value="white">
                    <span class="color-swatch" style="background-color: white;" title="Trắng"></span>
                </label>
            </div>
        </div>

        <!-- Lọc theo kích thước -->
        <div class="filter-section">
            <h4>Kích thước</h4>
            <div class="size-options">
                <label class="size-option">
                    <input type="checkbox" value="XS">
                    <span class="size-btn">XS</span>
                </label>
                <label class="size-option">
                    <input type="checkbox" value="S">
                    <span class="size-btn">S</span>
                </label>
                <label class="size-option">
                    <input type="checkbox" value="M">
                    <span class="size-btn">M</span>
                </label>
                <label class="size-option">
                    <input type="checkbox" value="L">
                    <span class="size-btn">L</span>
                </label>
                <label class="size-option">
                    <input type="checkbox" value="XL">
                    <span class="size-btn">XL</span>
                </label>
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

    <!-- Container sản phẩm -->
    <main class="products-container">
        <div class="products-header">
            <h2>Sản phẩm bóng đá</h2>
            <div class="products-controls">
                <div class="sort-options">
                    <select id="sortSelect">
                        <option value="default">Sắp xếp theo</option>
                        <option value="price-asc">Giá tăng dần</option>
                        <option value="price-desc">Giá giảm dần</option>
                        <option value="name-asc">Tên A-Z</option>
                        <option value="name-desc">Tên Z-A</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="products-grid" id="productsGrid">

        </div>


    </main>


</div>

<!-- Thông báo -->
<div class="notification" id="notification">
    <div class="notification-content">
        <i class="notification-icon"></i>
        <span class="notification-message"></span>
    </div>
    <div class="notification-progress"></div>
</div>
@endsection