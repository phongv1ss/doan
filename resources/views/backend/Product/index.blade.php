

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-1g-8">
        <h2>{{ $config['seo']['sanpham']['title'] }}</h2>

        <ol class="breadcrumb" style="margin-bottom:10px;">
            <li>
                <a href="{{ route('dashboard.index') }}">Dashboard</a>
            </li>
            <li class="active"><strong>{{ config('apps.user.sanpham.title') }}</strong></li>
        </ol>
    </div>
</div>

<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>
            <input type="checkbox" value="" id="checkAll" class="input-checkbox"  >
        </th>
        <th class="text-center">Mã Sản Phẩm</th>
        <th class="text-center">Tên Sản Phẩm</th>
        
        <th class="text-center" >Hình Ảnh</th>
        <th class="text-center">Giá Tiền</th>
        <th class="text-center">Mô tả</th>
        <th class="text-center">Danh Mục</th>
        <th class="text-center">Tình Trạng</th>
        
        <th class="text-center">Thao Tác</th>
        
    </tr>
    <a href="{{ route('Product.createsanpham') }}" class="btn btn-info">
        <i class="fa fa-plus"></i>
    </a>
    </thead>
    
     
    <tbody>
       
        @if(isset($data) && is_object($data))
        @foreach ($data as $datar)
        
                <tr>
                        <td>
                            <input type="checkbox" value=""  class="input-checkbox checkboxItem">
                        </td>
                        <td> 
                            {{$datar->id}}      
                        </td>
                        <td> 
                            {{$datar->name}}  
                        </td>
                        <td class="text-center">
                            <img src="{{ asset('storage/' . $datar->image) }}" alt="Ảnh sản phẩm" style="width: 100px; height: auto;">
                        </td>                        
                        <td> 
                            {{$datar->price}}   
                        </td>   
                        <td> 
                            {!! nl2br($datar->description) !!}  
                        </td>     
                        <td>
                            {{ $datar->category ? $datar->category->name : 'Không có danh mục' }} 
                        </td>     
                        <td> 
                            @if($datar->status == 1)
                            <p>Hiển thị</p>
                        @else
                            <p>Ẩn</p>
                        @endif
                        
                        </td>          
                        <td class="text-center"> 
                            <a href="{{ route('Product.editsanpham', ['id' => $datar->id]) }}" style="display: inline-block;"  class="btn btn-success">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('Product.delete', ['id' => $datar->id]) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">
                                @csrf
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                        
                </tr>
        @endforeach
       @endif
    </tbody>
</table>

{{ $data->links('pagination::bootstrap-4') }}  




<style>
   
    
    .active-bg {
        background-color: #7ed9a7 !important;
    }
    .pagination{
        margin-bottom: 40px;
    }
  
    #checkAll:checked ~ tbody tr {
        background-color: #7ed9a7 !important;
    }
    
    </style> 


