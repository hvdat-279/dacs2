@extends('layouts.login')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px; border-radius: 1rem;">
        <h2 class="text-center mb-4" style="color: #393f81;">Quên Mật Khẩu</h2>
        <p class="text-muted text-center mb-4">
            Nhập email của bạn và chúng tôi sẽ gửi liên kết đặt lại mật khẩu.
        </p>
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <!-- Email -->
            <div class="form-outline mb-4">
                <label for="email" class="form-label" style="font-weight: bold;">Email</label>
                <input type="email" id="email" name="email" class="form-control form-control-lg"
                    placeholder="Nhập email của bạn"
                    style="border-radius: 0.5rem; border: 1px solid #ced4da; padding: 0.75rem;" />
                @error('email')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-lg btn-block w-100"
                style="background-color: #393f81; border: none; border-radius: 0.5rem; padding: 0.75rem; transition: background-color 0.3s ease;">
                Gửi Liên Kết Đặt Lại Mật Khẩu
            </button>
        </form>
        <!-- Link quay lại -->
        <div class="text-center mt-4">
            <a href="{{ route('login') }}" class="custom-link" style="opacity: 0.8; font-size: 0.9rem;">
                <i class="fas fa-arrow-left"></i> Quay lại trang đăng nhập
            </a>
        </div>
    </div>
</div>
@endsection