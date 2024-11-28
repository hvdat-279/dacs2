@extends('layouts.admin')

@section('title')
<title>Thêm sản phẩm</title>
@endsection

@section('content')
<div class="content-wrapper">
    @include('partials.admin.content_header', ['name' => 'Sản phẩm', 'key' => 'Thêm mới', 'href' =>
    route('product.index')])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('product.create') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                            @error('title')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">Giá</label>
                            <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}">
                            @error('price')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Mô tả</label>
                            <textarea class="form-control" id="description"
                                name="description">{{ old('description') }}</textarea>
                            @error('description')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="stock">Số lượng</label>
                            <input type="number" class="form-control" id="stock" name="stock"
                                value="{{ old('stock') }}">
                            @error('stock')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="images">Hình ảnh sản phẩm</label>
                            <input type="file" class="form-control" id="images" name="images[]" multiple>
                            @error('images')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="category_id">Danh mục</label>
                            <select class="form-control" id="category_id" name="category_id">
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id')==$category->id ? 'selected' :
                                    '' }}>
                                    {{ $category->name }}
                                </option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection