@foreach($categories as $category)
<div class="product-row">
    <h3 class="products-title">{{ $category->name }}</h3>
    <div class="product-carousel">
        <button class="prev-products">&lt;</button>
        <div class="product-list">
            @foreach($category->products as $product)
            <div class="product-item">
                <div class="card">
                    <div class="card-image">
                        <img class="default-image" src="{{ $product->images->first()->img }}"
                            alt="{{ $product->title }}">
                        <img class="hover-image" src="{{ $product->images->skip(1)->first()->img }}"
                            alt="{{ $product->title }} Hover">
                    </div>
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
            @endforeach
        </div>
        <button class="next-products">&gt;</button>
    </div>
</div>
@endforeach