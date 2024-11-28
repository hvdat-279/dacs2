@extends('layouts.home')

@section('content')
<div class="profile-container">
    <div class="profile-card">
        <div class="profile-card-header">
            <h3>Thông Tin Người Dùng</h3>
        </div>
        <div class="card-body">
            <!-- Hiển thị thông tin người dùng -->
            <div class="profile-form-group">
                <label for="name">Họ và tên</label>
                <p>{{ $user->name }}</p>
            </div>

            <div class="profile-form-group">
                <label for="email">Email</label>
                <p>{{ $user->email }}</p>
            </div>

            <div class="profile-form-group">
                <label for="phone">Số điện thoại</label>
                <p>{{ $user->phone }}</p>
            </div>

            <div class="profile-form-group">
                <label for="address">Địa chỉ</label>
                <p>{{ $user->address }}</p>
            </div>

            <!-- Thêm nút sửa thông tin người dùng -->
            <a href="{{ route('profile.edit') }}" class="profile-btn">Chỉnh sửa thông tin</a>
        </div>
    </div>
</div>
@endsection