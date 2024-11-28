@extends('layouts.admin')

@section('title')
<title>Chỉnh sửa sản phẩm</title>
@endsection

@section('content')
<div class="content-wrapper">
    @include('partials.admin.content_header', ['name' => 'Sản phẩm', 'key' => 'Chỉnh sửa', 'href' =>
    route('product.index')])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('product.update', ['id' => $product->id]) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="title" name="title"
                                value="{{ old('title', $product->title) }}">
                            @error('title')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">Giá</label>
                            <input type="text" class="form-control" id="price" name="price"
                                value="{{ old('price', $product->price) }}">
                            @error('price')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Mô tả</label>
                            <textarea class="form-control" id="description"
                                name="description">{{ old('description', $product->description) }}</textarea>
                            @error('description')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="stock">Số lượng</label>
                            <input type="number" class="form-control" id="stock" name="stock"
                                value="{{ old('stock', $product->stock) }}">
                            @error('stock')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="images">Hình ảnh sản phẩm</label>

                            <!-- Hiển thị ảnh hiện tại nếu có -->
                            @if ($product->images && count($product->images) > 0)
                            <div class="mb-3">
                                @foreach ($product->images as $image)
                                <img src="{{ asset('storage/product_images/' . $image->img) }}" alt="Product Image"
                                    width="100" style="margin-right: 10px;">
                                @endforeach
                            </div>
                            @endif

                            <!-- Cho phép người dùng chọn ảnh mới -->
                            <input type="file" class="form-control" id="images" name="images[]" multiple>
                            @error('images')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category_id">Danh mục</label>
                            <select class="form-control" id="category_id" name="category_id">
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ?
                                    'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mb-3">Cập nhật sản phẩm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection