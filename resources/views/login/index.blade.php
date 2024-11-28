@extends("layouts.login")

@section('content')

<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-8 col-md-11 col-lg-8">
            <div class="card shadow-lg"
                style="border-radius: 1rem; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); transition: box-shadow 0.3s ease;">
                <div class="row g-0">
                    <div class="col-md-5 d-none d-md-block">
                        <img src="{{ asset('/image/login.jpg') }}" alt="login form" class="img-fluid"
                            style="border-radius: 1rem 0 0 1rem; height: 100%; object-fit: cover;" />
                    </div>

                    <!-- Form -->
                    <div class="col-md-7 d-flex align-items-center">
                        <div class="card-body p-4 p-lg-5 text-black">
                            <!-- Thông báo -->
                            @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                            @elseif(session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                            @elseif (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                            @endif

                            <h5 class="fw-bold mb-3 text-center fs-3" style="letter-spacing: 1px; color: #393f81;">Đăng
                                nhập</h5>
                            <form method="post" action="">
                                @csrf
                                <!-- Email -->
                                <div class="form-outline mb-4">
                                    <input type="email" id="email" name="email" class="form-control form-control-lg"
                                        placeholder="Email" style="border-radius: 0.5rem;" />
                                    @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- Password -->
                                <div class="form-outline mb-4">
                                    <input type="password" id="password" name="password"
                                        class="form-control form-control-lg" placeholder="Mật khẩu"
                                        style="border-radius: 0.5rem;" />
                                    @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- Nút đăng nhập -->
                                <div class="pt-1 mb-3">
                                    <button class="btn btn-primary btn-lg btn-block w-100" type="submit"
                                        style="border-radius: 0.5rem; background-color: #393f81; transition: background-color 0.3s ease;">Đăng
                                        nhập</button>
                                </div>
                                <!-- Liên kết -->
                                <a href="{{ route('forgot.password') }}" class="custom-link small text-muted">Quên mật
                                    khẩu?</a>
                                <p class="mt-3" style="color: #393f81;">
                                    Bạn chưa có tài khoản?
                                    <a href="{{ route('register') }}" class="custom-link"
                                        style="color: #393f81; font-weight: bold;">Đăng ký
                                        ngay</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection