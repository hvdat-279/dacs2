@extends('layouts.home')

@section('content')
{{-- <div class="product-wrapper"> --}}

    <div class="profile-container">
        <div class="profile-card">
            <div class="profile-card-header">
                <h3>Thông Tin Người Dùng</h3>
            </div>
            <div class="profile-card-picture">
                @if(auth()->user()->img)
                <img src="{{ asset('storage/' . auth()->user()->img) }}" alt="Profile Picture">
                @else
                <img src="{{ asset('image/picture_info.jpg') }}" alt="Default Picture">
                @endif
            </div>
            <div class="profile-card-body">
                <!-- Hiển thị thông tin người dùng -->
                <div class="card-body-left">
                    <div class="profile-form-group">
                        <label for="name">Họ và tên</label>
                        <p>{{ $user->name }}</p>
                    </div>

                    <div class="profile-form-group">
                        <label for="email">Email</label>
                        <p>{{ $user->email }}</p>
                    </div>
                </div>
                <div class="card-body-right">
                    <div class="profile-form-group">
                        <label for="phone">Số điện thoại</label>
                        <p>{{ $user->phone }}</p>
                    </div>

                    <div class="profile-form-group">
                        <label for="address">Địa chỉ</label>
                        <p>{{ $user->address }}</p>
                    </div>
                </div>

            </div>
            <!-- Thêm nút sửa thông tin người dùng -->
            <a href="{{ route('profile.edit') }}" class="profile-btn">Chỉnh sửa thông tin</a>
        </div>

    </div>

    {{--
</div> --}}



@endsection