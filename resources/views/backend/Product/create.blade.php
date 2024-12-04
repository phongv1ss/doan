<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-1g-8">
        <h2>{{ $config['seo']['themsanpham']['title'] }}</h2>

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
 $url=($config['method']=='themsanpham')? route('Product.storesanpham') : route('Product.updatesanpham',$user->id);
@endphp

   
<form action="{{ $url }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Tên sản phẩm</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="image">Hình ảnh</label>
                <input type="text" name="image" class="form-control" value="{{ old('image') }}">
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="price">Giá gốc</label>
                <input type="number" name="price" class="form-control" value="{{ old('price') }}" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sale_price">Giá khuyến mãi</label>
                <input type="number" name="sale_price" class="form-control" value="{{ old('sale_price') }}">
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
                    <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Hiển thị</option>
                    <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Ẩn</option>
                </select>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea name="description" class="form-control">{{ old('description') }}</textarea>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12 text-right">
            <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
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