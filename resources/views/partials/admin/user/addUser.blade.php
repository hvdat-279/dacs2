@extends('layouts.admin')

@section('title')
<title>Trang chu</title>
@endsection

@section('content')
<div class="content-wrapper">
    @include('partials.admin.content_header', ['name' => 'Khách hàng', 'key' => 'Thêm mới', 'href' =>
    route('user.index')])


    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('user.create') }}" method="POST">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h3>Thêm Người Dùng</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Họ Tên:</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="{{ old('name') }}">
                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        value="{{ old('email') }}">
                                    @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="phone">Số điện thoại:</label>
                                    <input type="text" name="phone" id="phone" class="form-control"
                                        value="{{ old('phone') }}">
                                    @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="address">Địa chỉ:</label>
                                    <input type="text" name="address" id="address" class="form-control"
                                        value="{{ old('address') }}">
                                    @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Mật khẩu:</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                    @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">Xác nhận mật khẩu:</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        class="form-control">
                                    @error('password_confirmation')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Thêm Người Dùng</button>
                                    <a href="{{ route('user.index') }}" class="btn btn-secondary">Quay lại</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection