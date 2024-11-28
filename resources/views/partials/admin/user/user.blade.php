@extends('layouts.admin')

@section('title')
<title>Trang chủ</title>
@endsection

@section('content')
<div class="content-wrapper">
    @include('partials.admin.content_header', ['name' => 'khách hàng', 'key' => 'Danh sách', 'href' =>
    route('user.index')])

    <!-- Hiển thị thông báo thành công -->
    @if (Session::has('success'))
    <div id="success-alert" class="alert alert-success p-3"
        style="position: fixed; top: 20px; right: 20px; z-index: 9999; display: block; opacity: 0; animation: fadeIn 1s ease-out forwards;">
        {{ Session::get('success') }}
    </div>
    @endif


    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('user.add') }}" class="btn btn-success float-right m-2">Thêm khách hàng</a>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Họ Tên</th>
                                <th scope="col">Email</th>
                                <th scope="col">Mật khẩu</th>
                                <th scope="col">SDT</th>
                                <th scope="col">Địa chỉ</th>
                                <th scope="col">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->password }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->address }}</td>
                                <td>
                                    <a href="{{ route('user.edit',['id'=>$user->id]) }}"
                                        class="btn btn-default">Edit</a>
                                    <a href="{{ route('user.delete',['id'=>$user->id]) }}"
                                        class="btn btn-danger">Delete</a>
                                </td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')
<script>
    // Kiểm tra nếu có thông báo thành công
        @if (Session::has('success'))
            setTimeout(function() {
                document.getElementById('success-alert').style.animation = 'fadeOut 1s forwards';
            }, 2000); 
        @endif
</script>
@endsection

@section('styles')
<style>
    @keyframes fadeIn {
        0% {
            opacity: 0;
            transform: translateY(-20px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }


    @keyframes fadeOut {
        0% {
            opacity: 1;
            transform: translateY(0);
        }

        100% {
            opacity: 0;
            transform: translateY(-20px);
        }
    }
</style>
@endsection