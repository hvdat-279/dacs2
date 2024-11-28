@extends('layouts.home')

@section('content')
<div class="profile-container">
    <div class="profile-card">
        <div class="profile-card-header">
            <h3>Chỉnh sửa thông tin người dùng</h3>
        </div>
        <div class="profile-card-body">
            <!-- Hiển thị thông báo thành công -->
            @if(session('status'))
            <div class="profile-alert-success">
                {{ session('status') }}
            </div>
            @endif

            <form method="POST" action="{{ route('profile.update') }}">
                @csrf

                <!-- Họ và tên -->
                <div class="profile-form-group">
                    <label for="name">Họ và tên</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="profile-form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                    @error('email')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Số điện thoại -->
                <div class="profile-form-group">
                    <label for="phone">Số điện thoại</label>
                    <input type="text" id="phone" name="phone" value="{{ old('phone', $user->phone) }}" required>
                    @error('phone')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Địa chỉ -->
                <div class="profile-form-group">
                    <label for="address">Địa chỉ</label>
                    <input type="text" id="address" name="address" value="{{ old('address', $user->address) }}"
                        required>
                    @error('address')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Mật khẩu mới -->
                <div class="profile-form-group">
                    <label for="password">Mật khẩu mới (Nếu muốn thay đổi)</label>
                    <input type="password" id="password" name="password">
                    @error('password')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Xác nhận mật khẩu -->
                <div class="profile-form-group">
                    <label for="password_confirmation">Xác nhận mật khẩu</label>
                    <input type="password" id="password_confirmation" name="password_confirmation">
                    @error('password_confirmation')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Nút cập nhật -->
                <button type="submit" class="profile-submit-btn">Cập nhật thông tin</button>
                <a href="{{ route('profile') }}" class="profile-back-btn">Quay lại trang thông tin</a>
            </form>
        </div>
    </div>
</div>
@endsection