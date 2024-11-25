@include('backend.user.component.breadcrumb',['title'=>$config['seo']['create']['title']])



@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
@php
 $url=($config['method']=='create')? route('user.store') : route('user.update',$user->id);



@endphp



<form action="{{ $url }}" method="POST" class="box">
    @csrf
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-5">
                <div class="pannel-head">
                    <div class="pannel-title" style="
                    font-size: 20px;
                    margin-bottom: 15px;
                    font-weight: 700;
                    color: #1a1a1a;
                     ">Thông Tin Chung</div>
                    <div class="pannel-description" style="
                    font-size: 15px;" 
                    >Thông Tin Người Sử Dụng</div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Thông Tin Chung</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label">Email
                                        <span class="text-danger">(*)</span>
                                        <input
                                            type="text"
                                            name="email"
                                            value="{{ old('email', ($user->email) ?? '') }}"
                                            class="form-control"
                                            placeholder=""
                                            autocomplete="off"
                                        >
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label">Họ Tên
                                        <span class="text-danger">(*)</span>
                                        <input
                                            type="text"
                                            name="name"
                                            value="{{ old('name', ($user->name) ?? '')}}"
                                            class="form-control"
                                            placeholder=""
                                            autocomplete="off"                                        
                                        >
                                    </label>
                                </div>
                            </div>
                        </div>
                        @php
                        $userCatalogue=[
                            'Chọn Vai Trò',
                            'Quản Trị Viên',
                            'Cộng Tác Viên'
                        ];
                        @endphp
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label">Vai Trò
                                        <span class="text-danger">(*)</span>
                                        <select name="user_catalogue_id" id="" class="form-control" style="height: 38px;width: 320px; setupSelect2">
                                           @foreach ($userCatalogue as $key => $item)
                                            <option {{$key == old('user_catalogue_id',(isset($user->user_catalogue_id)) ?
                                            $user->user_catalogue_id : '') ? 'selected': ''}}
                                            
                                            value="{{$key}}">{{$item}}</option>
                                            @endforeach
                                        </select>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label">Ngày Sinh                                       
                                        <input
                                            type="date"
                                            name="birthday"
                                            value="{{ old('birthday', (isset($user->birthday)) ? date('Y-m-d',strtotime($user->birthday)): '')}}"
                                            class="form-control"
                                            placeholder=""
                                            autocomplete="off"
                                        >
                                    </label>
                                </div>
                            </div>
                        </div>
                        @if($config['method']=='create')
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label">Mật Khẩu
                                        <span class="text-danger">(*)</span>
                                        <input
                                            type="password"
                                            name="password"
                                            value=""
                                            class="form-control"
                                            placeholder=""
                                            autocomplete="off"
                                        >
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label">Nhập Lại Mật Khẩu
                                        <span class="text-danger">(*)</span>
                                        <input
                                            type="password"
                                            name="re_password"
                                            value=""
                                            class="form-control"
                                            placeholder=""
                                            autocomplete="off"                                        
                                        >
                                    </label>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-5">
                <div class="pannel-head">
                    <div class="pannel-title" style="
                    font-size: 20px;
                    margin-bottom: 15px;
                    font-weight: 700;
                    color: #1a1a1a;
                    "
                    >Thông Tin Liên Hệ</div>
                    <div class="pannel-description" style="
                    font-size: 15px;"
                    >Thông Tin Liên Hệ Người Sử Dụng</div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Thông Tin Chung</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label">Thành Phố
                                       <select name="provice_id" class="form-control setupSelect2 province location" data-target="districts">
                                        <option value="0">Chọn Thành Phố</option>
                                        @if(isset($provinces))
                                            @foreach($provinces as $province)
                                            <option @if(old('provice_id')==$province->code) selected @endif
                                             value="{{$province->code}}">{{$province->name}}</option>
                                            @endforeach
                                        @endif
                                       </select>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label">Quận
                                        <select name="district_id" class="form-control setupSelect2 districts location" data-target="wards">
                                            <option  value="0">Chọn Quận/Huyện</option>
                                        </select>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label">Phường
                                        <select name="ward_id" class="form-control setupSelect2 wards ">
                                            <option value="0">Chọn Phường/Xã</option>
                                           
                                        </select>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label">Địa Chỉ                                      
                                        <input
                                            type="text"
                                            name="address"
                                            value="{{ old('address', ($user->address) ?? '')}}"
                                            class="form-control"
                                            placeholder=""
                                            autocomplete="off"
                                        >
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label">Số Điện Thoại
                                        <span class="text-danger">(*)</span>
                                        <input
                                            type="text"
                                            name="phone"
                                            value="{{ old('phone', ($user->phone) ?? '')}}"
                                            class="form-control"
                                            placeholder=""
                                            autocomplete="off"
                                        >
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>                                      
                </div>
            </div>
        </div>
        <div class="text-right" style="margin-bottom: 20px">
            <button class="btn btn-primary" type="submit" name="send" value="send">Lưu Thông Tin</button>
        </div>
    </div>
</form>









<style>
    .ibox-content .form-row {
    display: flex;
    flex-direction: column;
    margin-bottom: 15px;
}

.form-row label {
    font-weight: bold;
    margin-bottom: 5px;
}

.form-control, .select2-container .select2-selection--single {
    height: 38px; 
    padding: 6px 12px;
    border: 1px solid #ced4da;
    border-radius: 4px;
    background-color: #fff;
    box-sizing: border-box;
}

.select2-container {
    width: 100% !important;
}
.form-control, .select2-container .select2-selection--single {
    height: 38px !important;
    padding: 6px 12px !important;
    border: 1px solid #ced4da !important;
}

</style>



<script>
    $(document).ready(function() {
        $('.setupSelect2').select2();
    });

    var province_id='{{ (isset($user->provice_id)) ? $user->provice_id :old('province_id') }}'
    var district_id='{{ (isset($user->district_id)) ? $user->district_id :old('district_id') }}'
    var ward_id='{{ (isset($user->ward_id)) ? $user->ward_id :old('ward_id') }}'

   
</script>