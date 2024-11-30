<nav>
    <header class="header">
        <i class="fa-solid fa-bars siderbarOpen"></i>
        <span class="logo"><a href="{{ route('home') }}"><img src="{{ asset('/image/logo.png') }}" alt=""></a></span>

        <div class="menu">
            <div class="logo-toggle">
                <span class="logo"><a href="{{ route('home') }}"><img src="{{ asset('/image/logo.png') }}"
                            alt=""></a></span>
                <i class="fa-solid fa-xmark siderbarClose"></i>
            </div>
            <ul class="nav-links">
                <li><a href="{{ route('home') }}"><i class="fa-solid fa-house"></i> Trang chủ</a></li>
                <li>
                    <a href="#products">
                        <i class="fa-solid fa-server"></i> Sản phẩm <i class="fa-solid fa-angle-down angle-icon"></i>
                    </a>
                    <div class="sub-menu">
                        <ul>
                            <li><a href="{{ route('products', ['id' => 1]) }}">Quần áo bóng đá</a></li>
                            <li><a href="{{ route('products', ['id' => 2]) }}">Quần áo bóng rổ</a></li>
                            <li><a href="{{ route('products', ['id' => 3]) }}">Quần áo bóng chuyền</a></li>
                            <li><a href="{{ route('products', ['id' => 4]) }}">Quần áo cầu lông</a></li>
                            <li><a href="{{ route('products', ['id' => 5]) }}">Thời trang thể thao</a></li>
                        </ul>
                    </div>
                </li>
                <li><a href=""><i class="fa-solid fa-phone"></i> Liên hệ</a></li>
            </ul>

        </div>
        <div class="searchBox-login">
            <div class="searchBox">
                <input type="search" name="" id="" class="inputSearch">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
            <button class="shoppingCart">
                <a href="{{ route('cart') }}"><i class="fa-solid fa-cart-shopping"></i>
                    <span>{{ $cart->getTotalQuantity() }}</span>
                </a>
            </button>
            @if (Auth::check())
            <div class="dropdown">
                <button class="dropdown-toggle">{{ Auth::user()->name }}</button>
                <div class="dropdown-menu">
                    <a href="{{ route('profile') }}">Thông tin cá nhân</a>
                    <a href="{{ route('home.logout') }}">Đăng xuất</a>
                </div>
            </div>
            @else
            <button class="btnLogin"><a href="{{ route('login') }}">Đăng nhập</a> </button>
            @endif
        </div>


    </header>
</nav>