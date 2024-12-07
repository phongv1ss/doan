<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-1g-8">
        <h2>{{ $config['seo']['suasanpham']['title'] }}</h2>

        <ol class="breadcrumb" style="margin-bottom:10px;">
            <li>
                <a href="{{ route('dashboard.index') }}">Dashboard</a>
            </li>
            <li class="active"><strong>{{ config('apps.user.sanpham.title') }}</strong></li>
        </ol>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@php
    $url = ($config['method'] == 'suasanpham') ? route('Product.updatesanpham', $product->id) : route('Product.storesanpham');
@endphp

<form action="{{ $url }}" method="POST">
    @csrf
    @if ($config['method'] == 'suasanpham')
        @method('PUT')
    @endif
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Tên sản phẩm</label>
                <input type="text" name="name" class="form-control" value="{{ $product->name ?? old('name') }}" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="image">Hình ảnh</label>
                <!-- Input File -->
                <input type="file" name="image" class="form-control" accept="image/*">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="price">Giá gốc</label>
                <input type="number" name="price" class="form-control" value="{{ $product->price ?? old('price') }}" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sale_price">Giá khuyến mãi</label>
                <input type="number" name="sale_price" class="form-control" value="{{ $product->sale_price ?? old('sale_price') }}">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="category_id">Chọn danh mục</label>
                <select name="category_id" id="category_id" class="form-control" required>
                    <option value="">-- Chọn danh mục --</option>
                    @foreach($categories as $category)
                        <option value={{ $category->category_id }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>            
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="status">Trạng thái</label>
                <select name="status" class="form-control">
                    <option value="1" {{ (old('status', $product->status ?? 1) == 1) ? 'selected' : '' }}>Hiển thị</option>
                    <option value="0" {{ (old('status', $product->status ?? 1) == 0) ? 'selected' : '' }}>Ẩn</option>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea name="description" class="form-control">{{ $product->description ?? old('description') }}</textarea>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 text-right">
            <button type="submit" class="btn btn-primary">{{ $config['method'] == 'sua' ? 'Cập nhật' : 'Thêm sản phẩm' }}</button>
        </div>
    </div>
</form>

<style>
    .form-group {
        margin-bottom: 10px;
    }

    input, select, textarea {
        padding: 5px;
        font-size: 14px;
    }
</style>
<script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description', {
        height: 100
    });
</script>

