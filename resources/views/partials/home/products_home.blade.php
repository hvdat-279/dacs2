<div class="products" id="products">
    @foreach($categories as $category)
    <div class="product-row">
        <h3 class="products-title">{{ $category->name }}</h3>
        <div class="product-carousel">
            <button class="prev-products">&lt;</button>
            <div class="product-list">
                @foreach($category->products as $product)
                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf
                    <input hidden name="id" id="" value="{{ $product->id }}">
                    <input hidden name="quantity" id="" value="1">
                    <input hidden name="size" id="" value="M">

                    <div class="product-item">
                        <div class="card">
                            <a href="{{ route('product.details', ['id' => $product->id]) }}" class="product-card-link">
                                <div class="card-image">
                                    <img class="default-image" src="{{ $product->images->first()->img }}"
                                        alt="{{ $product->title }}">
                                    <img class="hover-image" src="{{ $product->images->skip(1)->first()->img }}"
                                        alt="{{ $product->title }} Hover">
                                </div>
                            </a>
                            <div class="card-info">
                                <p>{{ $product->title }}</p>

                                <div class="card-buttons">
                                    {{-- <button class="btn btn-buy">
                                        <i class="fas fa-shopping-bag"></i>
                                        Mua ngay
                                    </button> --}}
                                    <p class="product-price">{{ number_format($product->price, 0, ',', '.') }}₫</p>

                                    <button type="submit" class="btn btn-cart">
                                        <i class="fas fa-cart-plus"></i>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
                @endforeach
            </div>
            <button class="next-products">&gt;</button>
        </div>
    </div>
    @endforeach
</div>