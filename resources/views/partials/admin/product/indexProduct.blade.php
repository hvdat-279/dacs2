@extends('layouts.admin')

@section('title')
<title>Danh sách sản phẩm</title>
@endsection

@section('content')
<div class="content-wrapper">
    @include('partials.admin.content_header', ['name' => 'Sản phẩm', 'key' => 'Danh sách', 'href' =>
    route('product.index')])

    @if (Session::has('success'))
    <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert"
        style="position: fixed; top: 20px; right: 20px; z-index: 9999;">
        {{ Session::get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('product.add') }}" class="btn btn-success float-right m-2">Thêm sản phẩm</a>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Ảnh</th>
                                <th scope="col">Danh mục</th>
                                <th scope="col">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <th scope="row">{{ $product->id }}</th>
                                <td>{{ $product->title }}</td>
                                <td>{{ number_format($product->price, 2) }} đ</td>
                                <td>{{ $product->stock }}</td>
                                <td>
                                    @if ($product->images->isNotEmpty())
                                    @if (Str::startsWith($product->images->first()->img, ['http://', 'https://']))
                                    <img src="{{ $product->images->first()->img }}" alt="{{ $product->title }} - link"
                                        width="70">
                                    @else
                                    <img src="{{ asset('storage/product_images/' . $product->images->first()->img) }}"
                                        alt="{{ $product->title }}" width="100">
                                    @endif
                                    @else
                                    <span>Không có ảnh</span>
                                    @endif
                                </td>
                                <td>{{ $product->category->name ?? 'Không có danh mục' }}</td>

                                <td>
                                    <a href="{{ route('product.edit', ['id' => $product->id]) }}"
                                        class="btn btn-default">Edit</a>
                                    <a href="{{ route('product.delete', ['id' => $product->id]) }}"
                                        class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    {{ $products->links() }}
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