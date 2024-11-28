@extends('layouts.login')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-lg p-4" style="width: 100%; max-width: 500px; border-radius: 1rem;">
        <h2 class="text-center mb-3" style="color: #393f81;">Đặt Lại Mật Khẩu</h2>
        <p class="text-muted text-center mb-3" style="font-size: 0.9rem;">
            Nhập mật khẩu mới và xác nhận mật khẩu của bạn.
        </p>
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <!-- Token ẩn -->
            <input type="hidden" name="token" value="{{ $token }}">

            <!-- Email -->
            <div class="form-outline mb-3">
                <label for="email" class="form-label" style="font-weight: bold;">Email</label>
                <input type="email" id="email" name="email" class="form-control form-control-lg"
                    value="{{ old('email') }}" placeholder="Nhập email của bạn"
                    style="border-radius: 0.5rem; border: 1px solid #ced4da; padding: 0.75rem;" />
                @error('email')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- New Password -->
            <div class="form-outline mb-3">
                <label for="password" class="form-label" style="font-weight: bold;">Mật Khẩu Mới</label>
                <input type="password" id="password" name="password" class="form-control form-control-lg"
                    placeholder="Nhập mật khẩu mới"
                    style="border-radius: 0.5rem; border: 1px solid #ced4da; padding: 0.75rem;" />
                @error('password')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="form-outline mb-3">
                <label for="password_confirmation" class="form-label" style="font-weight: bold;">Xác Nhận Mật
                    Khẩu</label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                    class="form-control form-control-lg" placeholder="Xác nhận mật khẩu"
                    style="border-radius: 0.5rem; border: 1px solid #ced4da; padding: 0.75rem;" />
                @error('password_confirmation')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <button type="submit" class="btn btn-primary btn-lg btn-block w-100"
                style="background-color: #393f81; border: none; border-radius: 0.5rem; padding: 0.75rem; transition: background-color 0.3s ease;">
                Đặt Lại Mật Khẩu
            </button>
        </form>

        <div class="text-center mt-3">
            <a href="{{ route('login') }}" class="custom-link" style="opacity: 0.8; font-size: 0.9rem;">
                <i class="fas fa-arrow-left"></i> Quay lại trang đăng nhập
            </a>
        </div>
    </div>
</div>
@endsection