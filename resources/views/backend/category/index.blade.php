
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-1g-8">
        <h2>{{ $config['seo']['quanlydanhmuc']['title'] }}</h2>

        <ol class="breadcrumb" style="margin-bottom:10px;">
            <li>
                <a href="{{ route('dashboard.index') }}">Dashboard</a>
            </li>
            <li class="active"><strong>{{ config('apps.user.quanlydanhmuc.title') }}</strong></li>
        </ol>
    </div>
</div>
@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="container">
    <h2>Danh sách danh mục</h2>
    <a href="{{ route('Category.create') }}" class="btn btn-primary">Thêm danh mục</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên danh mục</th>
                <th>Trạng thái</th>
                <th>Số sản phẩm</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->category_id ?? 'Không có ID' }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->status ? 'Hiển thị' : 'Ẩn' }}</td>
                <td>{{ $category->products_count ?? 0 }}</td>
                <td>
                    @if(isset($category->category_id))
                        <a href="{{ route('Category.edit', $category->category_id) }}" class="btn btn-sm btn-warning">Sửa</a>
                        
                        @if($category->products_count == 0)
                            <form action="{{ route('Category.destroy', $category->category_id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                            </form>
                        @else
                        <span class="text-muted">Không thể xóa</span>
                        @endif
                
                    @else
                        <span class="text-danger">ID không tồn tại</span>
                    @endif
                </td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
    
</div>

