@extends('layouts.admin')

@section('title')
<title>Trang chu</title>
@endsection

@section('content')

<div class="content-wrapper">
    @include('partials.admin.content_header', ['name' => 'Danh mục sản phẩm', 'key' => 'Thêm', 'href' =>
    route('categories.index') ])

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('categories.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="form-label">Tên danh mục</label>
                            <input type="text" name="name" class="form-control" placeholder="Nhập tên danh mục">
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection