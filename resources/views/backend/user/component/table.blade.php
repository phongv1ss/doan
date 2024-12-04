<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>
            <input type="checkbox" value="" id="checkAll" class="input-checkbox"  >
        </th>
        <th>Họ Tên Thành Viên</th>
        <th>Email</th>
        <th>Số Điện Thoại</th>
        <th>Địa Chỉ</th>
        <th class="text-center">Tình Trạng</th>
        <th class="text-center">Thao Tác</th>
        
    </tr>
    </thead>
     
    <tbody>
       
        @if(isset($users) && is_object($users))
        @foreach ($users as $user)
        
                <tr>
                        <td>
                            <input type="checkbox" value=""  class="input-checkbox checkboxItem">
                        </td>
                        <td> 
                            {{$user ->name}}                            
                          
                          
                        </td>
                        <td> 
                            {{$user ->email}}                     
                         
                         
                        </td>
                        <td> 
                            {{$user->phone}}                          
                           
                           
                        </td>
                        <td> 
                           {{$user->address}}                       
                           
                         
                        </td>                
                        <td class="text-center"> 
                            <input type="checkbox" value="{{ $user->publish}}" class="js-switch status" data-field="publish" data-model="User" data-modelId="{{$user->id}}" {{($user->publish == 1) ? 'checked':'' }}/>
                        </td>
                        <td class="text-center"> 
                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                            <a href="{{ route('user.delete',$user->id) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                </tr>
             @endforeach
        @endif
    </tbody>
       
</table>

{{ $users->links('pagination::bootstrap-4') }} 

<style>
/* CSS cho dòng được chọn */
.active-bg {
    background-color: #7ed9a7 !important; /* Sử dụng !important để chắc chắn không bị ghi đè */
}

/* Khi checkbox "Chọn tất cả" được kích hoạt, sẽ thêm màu nền cho tất cả các dòng */
#checkAll:checked ~ tbody tr {
    background-color: #7ed9a7 !important;
}

</style> 