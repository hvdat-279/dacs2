@extends('layouts.login')

@section('content')
{{-- <div class="container py-5">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="card shadow" style="border-radius: 10px;">
                <div class="card-body">
                    <h2 class="text-center mb-4">Register</h2>
                    <form method="POST" action="">
                        @csrf
                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" name="name"
                                class="form-control @error('name') is-invalid @enderror" placeholder="Enter your name"
                                value="{{ old('name') }}">
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email"
                                class="form-control @error('email') is-invalid @enderror" placeholder="Enter your email"
                                value="{{ old('email') }}">
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Enter your password">
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="form-control" placeholder="Confirm your password">
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </form>
                    <p class="text-center mt-3">Already have an account?
                        <a href="{{ route('login') }}" class="text-decoration-none">Login here</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-8 col-md-11 col-lg-8">
            <div class="card shadow-lg"
                style="border-radius: 1rem; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); transition: box-shadow 0.3s ease;">
                <div class="row g-0">
                    <!-- Hình ảnh minh họa -->
                    <div class="col-md-5 d-none d-md-block">
                        <img src="{{ asset('/image/register1.jpg') }}" alt="register form" class="img-fluid"
                            style="border-radius: 1rem 0 0 1rem; height: 100%; object-fit: cover;" />
                    </div>
                    <!-- Form đăng ký -->
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
                            @endif

                            <h5 class="fw-bold mb-3 text-center fs-3" style="letter-spacing: 1px; color: #393f81;">Đăng
                                ký</h5>
                            <form method="POST" action="">
                                @csrf
                                <!-- Name -->
                                <div class="form-outline mb-4">
                                    <input type="text" id="name" name="name" class="form-control form-control-lg"
                                        placeholder="Họ và tên" value="{{ old('name') }}" required
                                        style="border-radius: 0.5rem;" />
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div class="form-outline mb-4">
                                    <input type="email" id="email" name="email" class="form-control form-control-lg"
                                        placeholder="Email" value="{{ old('email') }}" required
                                        style="border-radius: 0.5rem;" />
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Password -->
                                <div class="form-outline mb-4">
                                    <input type="password" id="password" name="password"
                                        class="form-control form-control-lg" placeholder="Mật khẩu" required
                                        style="border-radius: 0.5rem;" />
                                    @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Confirm Password -->
                                <div class="form-outline mb-4">
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                        class="form-control form-control-lg" placeholder="Xác nhận mật khẩu" required
                                        style="border-radius: 0.5rem;" />
                                </div>

                                <!-- Submit Button -->
                                <div class="pt-1 mb-3">
                                    <button class="btn btn-primary btn-lg btn-block w-100" type="submit"
                                        style="border-radius: 0.5rem; background-color: #393f81; transition: background-color 0.3s ease;">Đăng
                                        ký</button>
                                </div>

                                <!-- Liên kết -->
                                <p class="mt-3" style="color: #393f81;">
                                    Bạn đã có tài khoản?
                                    <a href="{{ route('login') }}" class="custom-link"
                                        style="color: #393f81; font-weight: bold;">Đăng nhập
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